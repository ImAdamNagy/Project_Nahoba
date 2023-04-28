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
            console.log(this.chatData.from)
            console.log(this.chatData.to)
            const response = await http.post('/chats/', this.chatData,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            if(response.data.data == null)
            {
                router.push({name: "MessagesPage"});
                alert("You already have a chat with this person, check your messages!");
            }
            else{
                alert("Chat created, check your messages!");
                router.push({name: "MessagesPage"});
            }
        },
        async CreateAdminNotificationChat(to){
            this.AdminchatData.from = useAuth().userid;
            this.AdminchatData.to = to;
            const response = await http.post('/chats/', this.AdminchatData,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            this.newchat = response.data.data;
            useMsg().adminNotification.chat_id = this.newchat.id;
            console.log(useMsg().adminNotification)
        },
        async getChats(){
            const response = await http.get('/chats/',{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
            this.msgLoading = false;
            this.chats = response.data.data;
        }
    }
})