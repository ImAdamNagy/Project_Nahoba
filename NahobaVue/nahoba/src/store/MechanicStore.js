import { defineStore } from 'pinia';
import { http } from '../utils/http.mjs'

export const useMechanic = defineStore('mechanic-store', {
    state() {
        return {
            currentMechanic: null,
            currentMechanicIsLoading: true,
            mechanicsIsLoading: true,
            mechanics: []
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
        }
    }
})