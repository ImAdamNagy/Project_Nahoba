import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { useRoute } from 'vue-router'



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
            const response = await http.get('/users/' + localStorage.getItem("userid"));
            this.data = response.data.data;
            this.UserDataisLoading = false;
        },
        async getOtherUser() {
            const response = await http.get('/users/' + useRoute().params.id);
            this.OtherUserDetails = response.data.data;
        },
        async update(updatedUser) {
            updatedUser.id = localStorage.getItem("userid");
            this.UserDataisLoading = true;
            const response = await http.patch('/users/' + localStorage.getItem("userid"), updatedUser, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.getUserDetails();
        }
    }
})

