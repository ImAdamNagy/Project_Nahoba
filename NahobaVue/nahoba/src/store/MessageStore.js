import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'

export const useMsg = defineStore('msg-store',
{
    state(){
        return{
            messages: [],
            getMsgLoading: true
        }
    },
    actions:{
        async getMessages(chatId){
            const response = await http.get('/messages/' + chatId,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            this.messages = response.data.data;
            console.log(this.messages);
            this.getMsgLoading = false;
        }
    }
})