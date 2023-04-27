import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { useRoute } from 'vue-router'
import { useAuth } from './AuthStore.js';



export const useUser = defineStore('user-store',{
    state(){
        return{
            data: [],
            userDataIsLoading: true,
            OtherUserDetails: [],
            Users: [],
            usersIsLoading: true
        }
    },
    actions:{
        async getUserDetails() {
            const response = await http.get('/users/' + useAuth().userid);
            this.data = response.data.data;
            this.userDataIsLoading = false;
            console.log(this.data)
        },
        async getUsers() {
            const response = await http.get('/users', {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.Users = response.data.data;
            this.usersIsLoading = false;
        },
        async deleteUser(userid){
            const response = await http.delete("/users/" + userid,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
        const index = this.Users.findIndex(item=>item.id === userid);
        this.Users.splice(index,1);
        },
        async getOtherUser() {
            const response = await http.get('/users/' + useRoute().params.id);
            this.OtherUserDetails = response.data.data;
        },
        async update(updatedUser) {
            updatedUser.id = useAuth().userid;
            this.userDataIsLoading = true;
            const response = await http.patch('/users/' + useAuth().userid, updatedUser, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.getUserDetails();
        }
    }
})

