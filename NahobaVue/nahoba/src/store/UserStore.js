import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { useRoute } from 'vue-router'

export const useUser = defineStore('user-store',{
    state(){
        return{
            data: [],
            isLoading: true,
            OtherUserDetails: []
        }
    },
    actions:{
        async getUserDetails() {
            const response = await http.get('/users/' + localStorage.getItem("userid"));
            this.data = response.data.data;
            this.isLoading = false;
        },
        async getOtherUser() {
            const response = await http.get('/users/' + useRoute().params.id);
            this.OtherUserDetails = response.data.data;
        }
    }
})

