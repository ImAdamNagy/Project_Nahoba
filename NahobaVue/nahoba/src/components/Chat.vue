<template>
    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 p-3">
        <div class="chatbox" >
            <div class="chatboxtitle">
                <div class="title_lines mt-1">Your Chats</div>
            </div>
            <div class="chats row">
                <div v-for="item in useChat().chats" :key="item.id">
                    <div v-if="item.from.username == useUser().data.username">
                        <button class="btn btn-warning" @click="swap(item.id, item.to.username)">
                            <b>{{ item.to.username }}</b>
                        </button>
                        <img :src="useProduct().getImage('xmark.png')" @click="Delete(item.to.userid)" alt="close" id="closeImg" class="img-fluid" />
                    </div>
                    <div v-else>
                        <button class="btn btn-warning" @click="swap(item.id, item.from.username)">
                            <b>{{ item.from.username }}</b>
                        </button>
                        <img :src="useProduct().getImage('xmark.png')" @click="Delete(item.from.userid)" alt="close" id="closeImg" class="img-fluid" />
                    </div>
            </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { useUser } from '@/store/UserStore.js'
import { useChat } from '@/store/ChatStore.js'
import { useMsg } from '@/store/MessageStore.js'
import { useProduct } from '@/store/ProductStore.js'

async function swap(id, from){
    useMsg().partnerName = from;
    useMsg().currentChatId = id;
    useMsg().getMsgLoading = true;
    useMsg().messages = [];
    console.log(useMsg().messages);
    clearInterval(useMsg().reload);

    useMsg().abortController.abort();
    useMsg().abortController = new AbortController();
    
    useMsg().interval(id);
}

async function Delete(userid){
    await useMsg().deleteUserMessages(userid)
    await useChat().deleteChats(userid)
    const index = useChat().chats.findIndex(item=>item.to.userid === userid || item.from.userid === userid);
    useChat().chats.splice(index,1);
    alert("Chat deleted")
}

</script>
<style scoped>
button {
    border: 1px solid black;
    margin-top: 5px;
    margin-bottom: 5px;
    width: 100%;
}

button:hover {
    padding: 10px;
    border: 1px solid black;
}
#closeImg{
    height: 20px;
    width: 20px;
}
</style>