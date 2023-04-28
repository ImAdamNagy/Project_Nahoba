import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { useUser } from '@/store/UserStore.js';
import { useAuth } from './AuthStore.js';

export const useMsg = defineStore('msg-store',
{
    state(){
        return{
            messages: [],
            getMsgLoading: true,
            partnerName: "",
            newmessage: {
                message: "",
                sender_id: null,
                chat_id: null
            },
            adminNotification: {
                message: "",
                sender_id: null,
                chat_id: null
            },
            currentChatId: null
        }
    },
    actions:{
        async getMessages(chatId, partner, currentChatId){
            const response = await http.get('/messages/' + chatId,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            this.partnerName = partner;
            this.messages = response.data.data;
            this.getMsgLoading = false;
            this.currentChatId = currentChatId;
            console.log(this.messages)
        },
        async sendMessage(message){
            this.newmessage.message = message.message;
            this.newmessage.sender_id = useUser().data.userid;
            this.newmessage.chat_id = this.currentChatId;
            console.log(this.newmessage);
            const response = await http.post('/messages/', this.newmessage,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            alert("Message sent, reload the chat!");
        },
        async AdminNotificationMessage(message){
            this.adminNotification.message = message;
            this.adminNotification.sender_id = useAuth().currentUserDetails.userid;
            const response = await http.post('/messages/', this.adminNotification,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            alert("Message sent!");
        }
    }
})