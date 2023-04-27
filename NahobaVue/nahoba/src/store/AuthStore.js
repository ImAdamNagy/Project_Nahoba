import { defineStore } from 'pinia';
import { http } from '../utils/http.mjs'
import { router } from '@/router/index.js';


export const useAuth = defineStore('auth-store',
    {
        state() {
            return {
                token: localStorage.getItem('token') ?? '',
                userid: '',
                isAdmin: false,
                currentUserDetails: null
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
                isAdmin = false;
                alert("Logout was succesfull");
                router.push({ name: 'MainPage' });
            },
            async getCurrentUserDetails(){
                const response = await http.get('/users/current', {
                    headers: { Authorization: `Bearer ${this.token}` }
                });
                this.currentUserDetails = response.data.data;
            }
        },
        getters: {
            loggedIn() {
                return this.token !== '';
            }
        }
    })