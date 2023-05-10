import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'

export const useRole = defineStore('role-store',{
    state(){
        return{
            roles: []
        }
    },
    actions:{
        async getRoles(){
            const response = await http.get("/roles");
            this.roles = response.data.data;
        }
    }
})

