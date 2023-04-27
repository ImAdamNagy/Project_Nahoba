
<template>
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 p-3">
        <div class="box" v-if="useChat().msgLoading == false">
            <div class="" v-for="item in useChat().chats">
                <button v-if="item.from.username == useUser().data.username">
                    From: {{ item.to.username }}
                </button>
                <button v-else>
                    From: {{ item.from.username }}
                </button>
            </div>
        </div>
        <div class="" v-else>
            loading chats
        </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 p-3">
        <div class="box">
            
        </div>
    </div>
</template>
<script setup>
import {useUser} from '@/store/UserStore.js'
import {useChat} from '@/store/ChatStore.js'
import {useMsg} from '@/store/MessageStore.js'
import { onMounted } from 'vue';

onMounted(useChat().getChats);
onMounted(useUser().getUserDetails);
</script>
<style scoped>
button{
    border: 1px solid black;
    margin: 3px;
}
</style>