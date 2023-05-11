import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { router } from '@/router/index.js';
import { useAuth } from './AuthStore.js';
import { useMsg } from './MessageStore.js';
export const useChat = defineStore('chat-store',
{
    state(){
        return{
            chatData: {
                from: '',
                to: ''
            },
            AdminchatData: {
                from: '',
                to: ''
            },
            chats: [],
            msgLoading: true,
            newchat: []
        }
    },
    actions:{
        async createNewChat(to){
            this.chatData.from = useAuth().userid;
            this.chatData.to = to;
            const response = await http.post('/chats/', this.chatData,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            alert("Alerts.MsgCheck");
        },
        async CreateAdminNotificationChat(to){
            this.AdminchatData.from = useAuth().userid;
            this.AdminchatData.to = to;
            const response = await http.post('/chats/', this.AdminchatData,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            this.newchat = response.data.data;
            useMsg().adminNotification.chat_id = this.newchat.id;
        },
        async getChats(){
            const response = await http.get('/chats/',{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            this.chats = response.data.data;
            this.msgLoading = false;
        },
        async deleteChats(userid){
            try {
                const response = await http.delete('/chats/' + userid,{
                    headers: { Authorization: `Bearer ${localStorage.getItem('token')}`},
                    signal: useMsg().abortController.signal
                });
            } catch (error) {
                
            }
        }
    }
})