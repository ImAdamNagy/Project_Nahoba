<template>
    <NavBar />
    <Header><h1 class="headertitle">All Products</h1></Header>
    <div class="container">
        <Filters @filter="values => filters = values" />
        <ProductsOnly @details="details" :allProducts="FilteredProducts" />
    </div>
</template>

<script >
import Filters from '../components/Filters.vue'
import ProductsOnly from '../components/ProductsOnly.vue'
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import { http } from '../utils/http.mjs';
import { router } from '../router/index.js'

export default {
    components: {
        NavBar,
        Filters,
        ProductsOnly,
        Header
    },
    data() {
        return {
            allProducts: [],
            filters: null
        }
    },
    computed: {
        FilteredProducts() {
            if (this.filters === null) {
                return this.allProducts;
            }
            const filterByType = (product) => {
                if (this.filters.typesFilter == undefined)  {
                    return true;
                }
                if (this.filters.typesFilter == '') {
                    return true;
                }
                if (this.filters.typesFilter == null) {
                    return true;
                }
                if (this.filters.typesFilter == 0) {
                    return true;
                }
                return product.type.id == this.filters.typesFilter;
            }
            const filterByMinPrice = (product) => {
                if (this.filters.priceMinFilter == undefined) {
                    return true;
                }
                if (this.filters.priceMinFilter == '') {
                    return true;
                }
                if (this.filters.priceMinFilter == null) {
                    return true;
                }
                return product.product_price >= parseInt(this.filters.priceMinFilter);
            }
            const filterByMaxPrice = (product) => {
                if (this.filters.priceMaxFilter == '') {
                    return true;
                }
                if (this.filters.priceMaxFilter ==  undefined) {
                    return true;
                }
                if (this.filters.priceMaxFilter == null) {
                    return true;
                }
                return product.product_price <= parseInt(this.filters.priceMaxFilter);
            }
            const filterByName = (product) => {
                if (this.filters.search == null) {
                    return true;
                }
                if (this.filters.search == undefined) {
                    return true;
                }
                if (this.filters.search == '') {
                    return true;
                }
                return product.product_name.toLowerCase().includes(this.filters.search.toLowerCase());
            }
            return this.allProducts.filter(filterByType).filter(filterByMinPrice).filter(filterByMaxPrice).filter(filterByName);
        }
    },
    methods: {
        async products() {
            const response = await http.get('/products/enable');
            this.allProducts = response.data.data;
        },
        details(id) {
            localStorage.setItem("productId",id);
            router.push({ name: "ProductDetails" });
        }
    },
    mounted() {
        this.products();
    }
}
</script>