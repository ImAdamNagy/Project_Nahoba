import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs';
import { useRoute } from 'vue-router'
import { useAuth } from './AuthStore.js';
export const useProduct = defineStore('product-store',{
    state(){
        return{
            enableProducts: [],
            disabledProducts: [],
            OwnProducts: [],
            obj: {},
            filters: {
                search: null,
                typesFilter: 0,
                carTypesFilter: 0,
                priceMinFilter: null,
                priceMaxFilter: null
            },
            Product: [],
            productIsLoading: true,
            UserProducts: [],
            userProductsIsLoading: true,
            otherUserProductsIsLoading: true,
            disabledProductsIsLoading: true,
            enableProductsIsLoading: true
        }
    },
    actions:{
        getImage(image){
            return `${import.meta.env.VITE_LARAVEL_HOST}/images/${image}`;
        },
        async createProduct(newproduct){
            const formdata = new FormData();
            for(const item in newproduct)
            {
                formdata.append(item, newproduct[item]);
            }
            formdata.append('img', newproduct.product_img);
            const response = await http.post('/products', formdata,{
                        headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
                });
            alert("Your post had been sent to the admin for validation.");
        },
        async deleteProduct(sellerId){
            const response = await http.delete("/products/" + sellerId,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
        },
        async deleteUsersProducts(userid){
            const response = await http.delete("/products/deleteAll/" + userid,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
        },
        async updateProduct(updatedproduct) {
            updatedproduct.product_enable = 0;
            this.userProductsIsLoading = true;
            const response = await http.patch('/products/' + updatedproduct.id, updatedproduct, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.getOwnProducts();
        },
        async GetDisabledProducts() {
            this.disabledProductsIsLoading = true;
            const response = await http.get("/products/disable", {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.disabledProducts = response.data.data;
            this.disabledProductsIsLoading = false;
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

        async getEnabledProducts() {
            this.enableProductsIsLoading = true;
            const response = await http.get('/products/enable');
            this.enableProducts = response.data.data;
            this.enableProductsIsLoading = false;
        },
        async getOwnProducts(){
            const response = await http.get('/products/userproducts/' + useAuth().userid,{
                        headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
                });
            this.OwnProducts = response.data.data;
            this.userProductsIsLoading = false;
        },
        filterByType(product){
            if (this.filters.typesFilter == 0) {
                return true;
            }
            return product.type.id == this.filters.typesFilter;
        },
        filterByCarType(product){
            if (this.filters.carTypesFilter == 0) {
                return true;
            }
            return product.car_type.id == this.filters.carTypesFilter;
        },
        filterByMinPrice(product){
            if (this.filters.priceMinFilter == null) {
                return true;
            }
            if (this.filters.priceMinFilter == "") {
                return true;
            }
            return product.product_price >= parseInt(this.filters.priceMinFilter);
        },
        filterByMaxPrice(product) {
            if (this.filters.priceMaxFilter == null) {
                return true;
            }
            if (this.filters.priceMaxFilter == "") {
                return true;
            }
            return product.product_price <= parseInt(this.filters.priceMaxFilter);
        },
        filterByName(product){
            if (this.filters.search == null) {
                return true;
            }
            if (this.filters.search == "") {
                return true;
            }
            return product.product_name.toLowerCase().includes(this.filters.search.toLowerCase());
        },
        async getProduct(){
            this.productIsLoading = true;
            const response = await http.get("/products/" + useRoute().params.id);
            this.Product = response.data.data;
            this.productIsLoading = false;
        },
        async getUserProducts(){
            const response = await http.get('/products/userproducts/' + useRoute().params.id,{
                        headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
                });
            this.UserProducts = response.data.data;
            this.otherUserProductsIsLoading = false
        },
    },
    getters:{
        FilteredProducts() {
            if (this.filters.search === null && this.filters.typesFilter === null && this.filters.carTypesFilter === null && this.filters.priceMinFilter === null && this.filters.priceMaxFilter === null) {
                return this.enableProducts.reverse();
            }
            return this.enableProducts.filter(this.filterByType).filter(this.filterByMinPrice).filter(this.filterByMaxPrice).filter(this.filterByName).filter(this.filterByCarType).reverse();
        }
    }
})