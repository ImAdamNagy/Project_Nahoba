import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'

export const useUser = defineStore('user-store',{
    state(){
        return{
            seller: []
        }
    },
    actions:{
        async getSeller(){
            const response = await http.get("/users/" + datas.data.seller.userid);
            this.seller = response.data.data;
        },
    }
})

