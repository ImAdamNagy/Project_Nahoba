import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { useRoute } from 'vue-router'
import { useAuth } from './AuthStore.js';
import {useI18n} from 'vue-i18n'

const { t } = useI18n()

export const useUser = defineStore('user-store',{
    state(){
        return{
            data: [],
            userDataIsLoading: true,
            OtherUserDetails: [],
            users: [],
            usersIsLoading: true
        }
    },
    actions:{
        async getUserDetails() {
            const response = await http.get('/users/' + useAuth().userid);
            this.data = response.data.data;
            this.userDataIsLoading = false;
        },
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
            this.userDataIsLoading = true;
            const response = await http.patch('/users/' + useAuth().userid, updatedUser, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.getUserDetails();
            alert(t("Alerts.ProfileUpdate"));
        }
    }
})

