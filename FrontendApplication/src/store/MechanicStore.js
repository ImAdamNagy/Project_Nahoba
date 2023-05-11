import { defineStore } from 'pinia';
import { http } from '../utils/http.mjs'
import { useRoute } from 'vue-router'

export const useMechanic = defineStore('mechanic-store', {
    state() {
        return {
            currentMechanic: null,
            currentMechanicIsLoading: true,
            mechanicsIsLoading: true,
            mechanics: [],
            Mech: []
        }
    },
    actions: {
        async getCurrentMechanic() {
            const response = await http.get('/mechanics/current', {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.currentMechanic = response.data.data;
            this.currentMechanicIsLoading = false;
        },
        async update(updatedMec) {
            updatedMec.id = this.currentMechanic.id;
            this.currentMechanicIsLoading = true;
            const response = await http.patch('/mechanics/' + this.currentMechanic.id, updatedMec, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.getCurrentMechanic();
        },
        async getMechanics() {
            this.mechanicsIsLoading = true;
            const response = await http.get('/mechanics/');
            this.mechanics = response.data.data;
            this.mechanicsIsLoading = false;
        },
        async getMech(){
            this.mechanicsIsLoading = true;
            const response = await http.get("/mechanics/" + useRoute().params.id);
            this.Mech = response.data.data;
            this.mechanicsIsLoading = false;
        },
        getImage(image){
            return `${import.meta.env.VITE_LARAVEL_HOST}/images/${image}`;
        },
        async deleteMechanic(id){
            const response = await http.delete('/mechanics/' + id,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
            });
        }
    }
})