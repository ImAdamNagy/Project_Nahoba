<template>
    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 p-3">
        <div class="selectbox" v-if="useChat().chats.length == 0">
            <div class="info">
                <p>You don't have any messages yet!</p>
            </div>
        </div>
        <div class="msgbox" v-else-if="useMsg().currentChatId == undefined && useChat().chats.length > 0">
            <div class="msgBoxTitle">
                Select your chat partner
            </div>
        </div>
        <div class="msgbox" v-else-if="useMsg().getMsgLoading == false && useMsg().messages.length > 0">
            <div class="msgBoxTitle">
                <p>Messages with: {{ useMsg().partnerName }}</p>
                <button @click="Delete(useMsg().partnerid)" class="btn btn-danger">Delete chat</button>
            </div>
            <div class="messages">
                <div class="row" v-for="item in useMsg().messages" :key="item.id">
                    <div v-if="item.sender_id == useUser().data.userid">
                        <p class="right">
                            {{ item.message }}
                        </p>
                    </div>
                    <div v-else>
                        <p class="left">
                            {{ item.message }}
                        </p>
                    </div>
                </div>
            </div>
            <VForm @submit="useMsg().sendMessage">
                <div class="input">
                    <div class="row">
                    <div class="col-8">
                        <Field class="form-control" type="text" name="message" id="message" placeholder="Send message" />
                    </div>
                    <div class="col-4">
                        <input class="btn-warning btn form-control" type="submit" value="Send"/>
                    </div>
                </div>
                </div>
            </VForm>
        </div>
        <div class="msgbox" v-else-if="useMsg().messages.length == 0 && useMsg().getMsgLoading == false">
            <div class="msgBoxTitle">
                Messages with: {{ useMsg().partnerName }}
                <button @click="Delete(useMsg().partnerid)" class="btn btn-danger">Delete chat</button>
            </div>
            <div class="messages info">
                <p>You have no messages with {{ useMsg().partnerName }} yet.</p>
            </div>
            <VForm @submit="useMsg().sendMessage">
                <div class="input">
                    <div class="row">
                    <div class="col-8">
                        <Field class="form-control" type="text" name="message" id="message" placeholder="Send message" />
                    </div>
                    <div class="col-4">
                        <input class="btn-warning btn form-control" type="submit" value="Send" />
                    </div>
                </div>
                </div>
            </VForm>
        </div>
        <div class="selectbox" v-else-if="useChat().msgLoading == false">
            <div class="info">
                <p>Messages loading!</p>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { useMsg } from '@/store/MessageStore.js'
import { useUser } from "../store/UserStore.js";
import { useChat } from "@/store/ChatStore.js"
import { onBeforeRouteLeave } from "vue-router";
console.log(useChat().currentChatId)

onBeforeRouteLeave((to, from) => {
    useMsg().abortController.abort()
})


async function Delete(userid) {
    if(confirm("Are sure you want to delete this chat?")  == true)
    {
    await useMsg().deleteUserMessages(userid)
    await useChat().deleteChats(userid)
    const index = useChat().chats.findIndex(item => item.to.userid === userid || item.from.userid === userid);
    useChat().chats.splice(index, 1);

    clearInterval(useMsg().reload);
    useMsg().abortController.abort();
    useMsg().abortController = new AbortController();
    
    alert("Chat deleted")
    useMsg().getMsgLoading = true
    }
}
</script>
<style scoped>
.info {
    text-align: center;
    margin: auto;
    font-size: 30px;
}
.right {
    float: right;
    border: 1px solid darkred;
    border-radius: 20px;
    padding: 10px;
    word-break: break-all;
    max-width: 40%;
}
.selectbox{
    display: flex;
    align-items: center;
  justify-content: center;
  background-color: white;
  border-radius: 20px;
  height: 500px;
}
.left {
    float: left;
    border: 1px solid darkred;
    border-radius: 20px;
    padding: 10px;
    background: darkred;
    color: white;
    word-break: break-all;
    max-width: 40%;
}
</style>