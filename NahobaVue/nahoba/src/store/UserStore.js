import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { useRoute } from 'vue-router'
import { useAuth } from './AuthStore.js';



export const useUser = defineStore('user-store',{
    state(){
        return{
            data: [],
            UserDataisLoading: true,
            OtherUserDetails: [],
        }
    },
    actions:{
        async getUserDetails() {
            const response = await http.get('/users/' + useAuth().userid);
            this.data = response.data.data;
            this.UserDataisLoading = false;
        },
        async getOtherUser() {
            const response = await http.get('/users/' + useRoute().params.id);
            this.OtherUserDetails = response.data.data;
        },
        async update(updatedUser) {
            updatedUser.id = useAuth().userid;
            this.UserDataisLoading = true;
            const response = await http.patch('/users/' + useAuth().userid, updatedUser, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.getUserDetails();
        }
    }
})

