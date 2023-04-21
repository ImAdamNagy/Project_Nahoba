import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'

export const useType = defineStore('type-store',{
    state(){
        return{
            types: {}
        }
    },
    actions:{
        async allTypes(){
            const response = await http.get('types');
            this.types = response.data.data;
        }
    }
})

