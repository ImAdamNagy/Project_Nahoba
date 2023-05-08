import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { useUser } from '@/store/UserStore.js';
import { useAuth } from './AuthStore.js';

export const useMsg = defineStore('msg-store',
{
    state(){
        return{
            messages: [],
            username: "",
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
            currentChatId: null,
            reload: '',
            abortController: new AbortController()
        }
    },
    actions:{
        async getMessages(chatId){
            try {
                const response = await http.get('/messages/' + chatId,{
                    headers: { Authorization: `Bearer ${localStorage.getItem('token')}`},
                    signal: this.abortController.signal
                });
                this.messages = response.data.data;
                this.getMsgLoading = false;
                console.log(this.messages)
            } catch (error) {
                
            }
        },
        async interval(id){
            this.reload = setInterval(async function(id) {
                await useMsg().getMessages(id);
            }, 5000, id)
        },



        async sendMessage(message){
            this.newmessage.message = message.message;
            this.newmessage.sender_id = useUser().data.userid;
            this.newmessage.chat_id = this.currentChatId;
            const response = await http.post('/messages/', this.newmessage,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            this.getMessages(this.currentChatId, this.username);
        },
        async AdminNotificationMessage(message){
            this.adminNotification.message = message;
            this.adminNotification.sender_id = useAuth().currentUserDetails.userid;
            const response = await http.post('/messages/', this.adminNotification,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            alert("Message sent!");
        },
        async deleteUserMessages(userid){
            try {
                const response = await http.delete('/messages/' + userid,{
                    headers: { Authorization: `Bearer ${localStorage.getItem('token')}`},
                    signal: this.abortController.signal
                });
            } catch (error) {
                
            }
        }
    }
})