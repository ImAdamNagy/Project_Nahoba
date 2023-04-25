import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'

export const useType = defineStore('type-store',{
    state(){
        return{
            types: []
        }
    },
    actions:{
        async allTypes(){
            const response = await http.get('types');
            this.types = response.data.data;
        },
        async createType(typeData){
            const response = await http.post("/types/", typeData,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
        },
        async deleteType(typeData){
            const response = await http.delete("/types/" + typeData.type,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
        }
    }
})