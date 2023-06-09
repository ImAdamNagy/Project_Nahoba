import { defineStore } from 'pinia';
import { http } from '../utils/http.mjs'
import {useMsg} from '@/store/MessageStore.js'
export const useAuth = defineStore('auth-store',
    {
        state() {
            return {
                token: localStorage.getItem('token') ?? '',
                userid: '',
                isAdmin: false,
                currentUserDetails: null,
                currentUserHasMec: '',
                currentUserDetailsIsLoading: true
            }
        },
        actions: {
            async login(userData) {
                try {
                    const response = await http.post('/login', userData);
                    localStorage.setItem('token', response.data.data.token);
                    this.token = response.data.data.token;
                } catch (error) {
                    throw error;
                }
            },
            async logout() {
                const response = await http.get('/logout', {
                    headers: { Authorization: `Bearer ${this.token}` }
                });
                localStorage.clear();
                this.token = '';
                this.userid = '';
                this.isAdmin = false;
                useMsg().currentChatId = null;
                useMsg().partnerName = null;
                alert("Logout was successfull!");
            },
            async getCurrentUserDetails(){
                this.currentUserDetailsIsLoading = true;
                const response = await http.get('/users/current', {
                    headers: { Authorization: `Bearer ${this.token}` }
                });
                this.currentUserDetails = response.data.data;
                this.currentUserDetailsIsLoading = false;
            },
            async userDetails(){
                return await http.get('/users/current', {
                    headers: { Authorization: `Bearer ${this.token}` }
                });
            },
            async currentUserHasMechanic(){
                const response = await http.get("/mechanics/hasmec", {
                    headers: { Authorization: `Bearer ${this.token}` }
                });
                this.currentUserHasMec = response.data;
            }
        },
        getters: {
            loggedIn() {
                return this.token !== '';
            }
        }
    })