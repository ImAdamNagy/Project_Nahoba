import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'

export const useAuth = defineStore('auth-store',{
    state(){
        return{
            token: localStorage.getItem('token') ?? '',
            userid: localStorage.getItem('userid') ?? ''
        }
    },
    actions:{
        async login(userData){
            try {
                const response = await http.post('login', userData);
                localStorage.setItem('token',response.data.data.token);
                localStorage.setItem('userid',response.data.data.userid);
                this.token = response.data.data.token;
                this.userid = response.data.data.userid;
            } catch (error) {
                throw error;
            }
        }
    },
    getters:{
        loggedIn(){
            return this.token !== ''
        }
    }
})