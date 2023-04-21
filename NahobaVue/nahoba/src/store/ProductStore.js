import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs';

export const useProduct = defineStore('product-store',{
    state(){
        return{
            EnableProducts: [],
            disabledProducts: [],
            OwnProducts: [],
            obj: {}
        }
    },
    actions:{
        async GetDisabledProducts() {
            const response = await http.get("/products/disable", {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.disabledProducts = response.data.data;
        },
        async BeEnable(id){
            this.obj = {
                product_enable: true
            }
            const response = await http.patch("products/enable/" + id, this.obj, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            const index = this.disabledProducts.findIndex(item=>item.id === id);
            this.disabledProducts.splice(index,1);
        },
        async getProducts() {
            const response = await http.get('/products/enable');
            this.EnableProducts = response.data.data;
        },
        async getOwnProducts(){
            const response = await http.get('/products/userproducts/' + localStorage.getItem("userid"),{
                        headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
                });
            this.OwnProducts = response.data.data;
        }
    }
})