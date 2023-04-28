<template>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 p-3">
        <div class="box" v-if="useChat().msgLoading == false">
            <div class="title_lines">Your Chats</div>
            <div class="" v-for="item in useChat().chats" :key="item.id">
                <button class="btn btn-warning" @click="useMsg().getMessages(item.id, item.to.username, item.id)" v-if="item.from.username == useUser().data.username">
                    <b>{{ item.to.username }}</b>
                </button>
                <button class="btn btn-warning" @click="useMsg().getMessages(item.id, item.from.username, item.id)" v-else>
                    <b>{{ item.from.username }}</b>
                </button>
            </div>
        </div>
        <div class="loader" v-else>
            <svg class="car" width="102" height="40" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(2 1)" stroke="white" fill="none" fill-rule="evenodd" stroke-linecap="round"
                stroke-linejoin="round">
                <path class="car__body"
                    d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01"
                    stroke-width="3" />
                <ellipse class="car__wheel--left" stroke-width="3.2" fill="#FFF" cx="83.493" cy="30.25" rx="6.922"
                    ry="6.808" />
                <ellipse class="car__wheel--right" stroke-width="3.2" fill="#FFF" cx="46.511" cy="30.25" rx="6.922"
                    ry="6.808" />
                <path class="car__line car__line--top" d="M22.5 16.5H2.475" stroke-width="3" />
                <path class="car__line car__line--middle" d="M20.5 23.5H.4755" stroke-width="3" />
                <path class="car__line car__line--bottom" d="M25.5 9.5h-19" stroke-width="3" />
            </g>
        </svg>
        </div>
    </div>
</template>
<script setup>
import {useUser} from '@/store/UserStore.js'
import {useChat} from '@/store/ChatStore.js'
import { onMounted } from 'vue';
import {useMsg} from '@/store/MessageStore.js'

onMounted(useChat().getChats);
onMounted(useUser().getUserDetails);
</script>
<style scoped>
.loader{
  height: 400px;
}
button{
    border: 1px solid black;
    margin-top: 5px;
    margin-bottom: 5px;
    width: 100%;
}
button:hover{
    padding: 10px;
    border: 1px solid black;
}
</style>