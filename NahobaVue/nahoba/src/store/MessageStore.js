import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { router } from '@/router/index.js';

export const useMsg = defineStore('msg-store',
{
    state(){
        return{
            messages: []
        }
    },
    actions:{
        async getMessages(chatId){
            const response = await http.get('/messages/' + chatId,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            console.log(response.data.data);
        }
    }
})