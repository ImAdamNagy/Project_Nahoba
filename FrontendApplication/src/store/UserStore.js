import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { useRoute } from 'vue-router'
import { useAuth } from './AuthStore.js';

export const useUser = defineStore('user-store',{
    state(){
        return{
            OtherUserDetails: [],
            users: [],
            usersIsLoading: true
        }
    },
    actions:{
        async getUsers() {
            this.usersIsLoading = true;
            const response = await http.get('/users', {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.users = response.data.data;
            this.usersIsLoading = false;
        },
        async deleteUser(userid){
            const response = await http.delete("/users/" + userid,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
        
        },
        async getOtherUser() {
            const response = await http.get('/users/' + useRoute().params.id);
            this.OtherUserDetails = response.data.data;
        },
        async update(updatedUser) {
            updatedUser.id = useAuth().userid;
            const response = await http.patch('/users/' + useAuth().userid, updatedUser, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            useAuth().getCurrentUserDetails();
            alert("Your profile had been updated.");
        }
    }
})

