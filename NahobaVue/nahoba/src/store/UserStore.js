import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'

export const useUser = defineStore('user-store',{
    state(){
        return{
            mechanicers: []
        }
    },
    actions:{
        async getMechanicers(){
            const response = await http.get('users');
            this.mechanicers = response.data.data;
        }
    }
})

