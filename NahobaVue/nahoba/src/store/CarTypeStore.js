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
        },
        async addCarType(carTypeData){
            const response = await http.post("/cartypes/", carTypeData,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
        alert("Upload was successful!");
        }
    }
})