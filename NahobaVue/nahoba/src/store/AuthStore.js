import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import { router } from '@/router/index.js';


export const useAuth = defineStore('auth-store',
{
    state(){
        return{
            token: localStorage.getItem('token') ?? '',
            userid: localStorage.getItem('userid') ?? '',
            
        }
    },
    actions:{
        async login(userData){
            try {
                const response = await http.post('/login', userData);
                localStorage.setItem('token',response.data.data.token);
                localStorage.setItem('userid',response.data.data.userid);
                this.token = response.data.data.token;
                this.userid = response.data.data.userid;
            } catch (error) {
                throw error;
            }
        },
        async logout(){
            const response = await http.get('/logout',{
                headers: { Authorization: `Bearer ${this.token}`}
        });
            localStorage.clear();
            this.token = '';
            this.userid = '';
            alert("Logout was succesfull");
            router.push({name:'MainPage'});
        },
        async getRole(){
            return (await http.get("/users/" + this.userid,{
                headers: { Authorization: `Bearer ${this.token}`}
        })).data.data.role.role_name;
        }
    },
    getters:{
        loggedIn(){
            return this.token !== '';
        }
    }
})