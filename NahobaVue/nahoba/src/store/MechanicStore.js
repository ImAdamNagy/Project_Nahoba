import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs'
import {useAuth} from '../store/AuthStore.js'   

export const useMechanic = defineStore('mechanic-store',{
    state(){
        return{
            currentMechanic: null,
            currentMechanicIsLoading: true
        }
    },
    actions:{
        async getCurrentMechanic(){
            const response = await http.get('/mechanics/current', {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.currentMechanic = response.data.data;
            console.log(response);
            this.currentMechanicIsLoading = false;
        },
        async update(updatedMec) {
            updatedMec.id = this.currentMechanic.id;
            this.currentMechanicIsLoading = true;
            console.log(updatedMec);
            const response = await http.patch('/mechanics/' + this.currentMechanic.id, updatedMec, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.getCurrentMechanic();
        }
    }
})