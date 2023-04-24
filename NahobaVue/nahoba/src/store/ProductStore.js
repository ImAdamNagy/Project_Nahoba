import {defineStore} from 'pinia';
import {http} from '../utils/http.mjs';
import { useRoute } from 'vue-router'
import { router } from '@/router/index.js';

export const useProduct = defineStore('product-store',{
    state(){
        return{
            EnableProducts: [],
            disabledProducts: [],
            OwnProducts: [],
            obj: {},
            filters: {
                search: null,
                typesFilter: 0,
                priceMinFilter: null,
                priceMaxFilter: null
            },
            Product: [],
            UserProducts: [],
            UserProductsisLoading: true
        }
    },
    actions:{
        async createProduct(newproduct){
            console.log(newproduct);
            const formdata = new FormData();
            for(const item in newproduct)
            {
                formdata.append(item, newproduct[item]);
            }
            formdata.append('img', newproduct.product_img);
            const response = await http.post('/products', formdata,{
                        headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
                });
            alert("Upload was successfull");
            router.push({name: "MainPage"});
        },
        async updateProduct(updatedproduct) {
            updatedproduct.product_enable = 0;
            this.UserProductsisLoading = true;
            const response = await http.patch('/products/' + updatedproduct.id, updatedproduct, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.getOwnProducts();
        },
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
            this.UserProductsisLoading = false;
        },
        filterByType(product){
            if (this.filters.typesFilter == 0) {
                return true;
            }
            return product.type.id == this.filters.typesFilter;
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
            const response = await http.get("/products/" + useRoute().params.id);
            this.Product = response.data.data;
            console.log(this.Product);
        },
        async getUserProducts(){
            const response = await http.get('/products/userproducts/' + useRoute().params.id,{
                        headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
                });
            this.UserProducts = response.data.data;
        },
    },
    getters:{
        FilteredProducts() {
            if (this.filters.search === null && this.filters.typesFilter === null && this.filters.priceMinFilter === null && this.filters.priceMaxFilter === null) {
                return this.EnableProducts;
            }
            return this.EnableProducts.filter(this.filterByType).filter(this.filterByMinPrice).filter(this.filterByMaxPrice).filter(this.filterByName);
        }
    }
})