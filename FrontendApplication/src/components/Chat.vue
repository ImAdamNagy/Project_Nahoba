<template>
    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 p-3">
        <div class="chatbox">
            <div class="chatboxtitle">
                <div class="title_lines mt-1">{{t("Chats.YourChats")}}</div>
            </div>
            <div class="chats">
                <div v-for="item in useChat().chats" :key="item.id">
                    <div v-if="item.from.username == useAuth().currentUserDetails?.username">
                        <button class="btn btn-warning" @click="swap(item.id, item.to)">
                            <b>{{ item.to.firstname }} {{ item.to.lastname }}</b>
                        </button>
                    </div>
                    <div v-else>
                        <button class="btn btn-warning" @click="swap(item.id, item.from)">
                            <b>{{ item.from.firstname }} {{ item.from.lastname }}</b>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import {useAuth} from '@/store/AuthStore.js';
import { useChat } from '@/store/ChatStore.js'
import { useMsg } from '@/store/MessageStore.js'
import {useI18n} from 'vue-i18n'

const { t } = useI18n()

async function swap(id, from) {
    useMsg().partnerName = from.firstname + " " + from.lastname;
    useMsg().currentChatId = id;
    useMsg().partnerid = from.userid;
    useMsg().getMsgLoading = true;
    useMsg().messages = [];
    clearInterval(useMsg().reload);
    useMsg().abortController.abort();
    useMsg().abortController = new AbortController();
    useMsg().interval(id);
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