import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'

export const useCarType = defineStore('carType-store',{
    state(){
        return{
            cartypes: []
        }
    },
    actions:{
        async allCarTypes(){
            const response = await http.get('cartypes');
            this.cartypes = response.data.data;
        }
    }
})