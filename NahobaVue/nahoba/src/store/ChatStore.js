import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { router } from '@/router/index.js';
import { useAuth } from './AuthStore.js';

export const useChat = defineStore('chat-store',
{
    state(){
        return{
            chatData: {
                from: '',
                to: ''
            }
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
            router.push({name: "MessagesPage"});
        }
    }
})