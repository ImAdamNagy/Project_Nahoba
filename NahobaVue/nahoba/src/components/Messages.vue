<template>
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 p-3">
        <div class="box row" v-if="useMsg().getMsgLoading == false && useMsg().messages.length > 0">
            <div class="row msgBoxTitle">
                Messages with: {{ useMsg().partnerName }}
            </div>
                <div v-for="item in useMsg().messages" :key="item.id">
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
                <VForm @submit="useMsg().sendMessage">
                    <div class="row">
                        <div class="col-8">
                            <Field class="form-control" type="text" name="message" id="message" placeholder="Send message" />
                        </div>
                        <div class="col-4">
                            <input class="btn-warning btn form-control" type="submit" value="Send" />
                        </div>
                    </div>
                </VForm>
        </div>
        <div class="box row" v-else-if="useMsg().messages.length == 0 && useMsg().getMsgLoading == false">
            <div class="msgBoxTitle">
                You have no messages with {{useMsg().partnerName}} yet.
            </div>
            <VForm @submit="useMsg().sendMessage">
                <div class="row">
                        <div class="col-8">
                            <Field class="form-control" type="text" name="message" id="message" placeholder="Send message" />
                        </div>
                        <div class="col-4">
                            <input class="btn-warning btn form-control" type="submit" value="Send" />
                        </div>
                    </div>
            </VForm>
        </div>
        <div class="box" v-else-if="useChat().msgLoading == false">
            <div class="info">
                Select your message partner
            </div>
        </div>
    </div>
</template>
<script setup>
import {Form as VForm, Field, ErrorMessage} from "vee-validate";
import {useMsg} from '@/store/MessageStore.js'
import { useUser } from "../store/UserStore.js";
import {useChat} from "@/store/ChatStore.js"

</script>
<style scoped>

.info{
    text-align: center;
    margin: auto;
    font-size: 30px;

}
.right{
    float: right;
    border: 1px solid red;
    border-radius: 20px;
    padding: 10px;
}
.left{
    float: left;
    border: 1px solid red;
    border-radius: 20px;
    padding: 10px;
    background: red;
    color: white;
}
</style>