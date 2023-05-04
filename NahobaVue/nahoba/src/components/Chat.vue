<template>
    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 p-3">
        <div class="chatbox" >
            <div class="chatboxtitle">
                <div class="title_lines mt-1">Your Chats</div>
            </div>
            <div class="chats">
                <div v-for="item in useChat().chats" :key="item.id">
                <button class="btn btn-warning" @click="swap(item.id, item.to.username)"
                    v-if="item.from.username == useUser().data.username">
                    <b>{{ item.to.username }}</b>
                </button>
                <button class="btn btn-warning" @click="swap(item.id, item.from.username)" v-else>
                    <b>{{ item.from.username }}</b>
                </button>
            </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { useUser } from '@/store/UserStore.js'
import { useChat } from '@/store/ChatStore.js'
import { useMsg } from '@/store/MessageStore.js'

async function swap(id, from){
    useMsg().partnerName = from;
    useMsg().currentChatId = id;
    useMsg().getMsgLoading = true;
    useMsg().messages = [];
    console.log(useMsg().messages);
    if(useMsg().reload !== '')
    {
        await clearInterval(useMsg().reload);
    }
    useMsg().interval();
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
</style>