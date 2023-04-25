import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { useRoute } from 'vue-router'
import { useProduct } from './ProductStore.js';



export const useUser = defineStore('user-store',{
    state(){
        return{
            data: [],
            UserDataisLoading: true,
            OtherUserDetails: [],
            allUsers: []
        }
    },
    actions:{
        async getUserDetails() {
            const response = await http.get('/users/' + localStorage.getItem("userid"));
            this.data = response.data.data;
            this.UserDataisLoading = false;
        },
        async getAllUsers() {
            const response = await http.get('/users', {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.allUsers = response.data.data;
            console.log(this.allUsers)
        },
        async deleteUser(userid){
            const response = await http.delete("/users/" + userid,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
        const index = this.allUsers.findIndex(item=>item.id === userid);
        this.allUsers.splice(index,1);
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

