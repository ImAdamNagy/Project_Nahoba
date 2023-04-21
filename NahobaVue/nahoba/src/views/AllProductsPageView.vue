<template>
    <NavBar />
    <Header>
        <h1>Products</h1>
    </Header>
    <div class="container-fluid">
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
        Filters,
        ProductsOnly,
        Header,
        NavBar
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
                if (this.filters.typesFilter == (null || '' || undefined || 0)) {
                    return true;
                }
                return product.type.id == this.filters.typesFilter;
            }
            const filterByMinPrice = (product) => {
                if (this.filters.priceMinFilter == (null || '' || undefined)) {
                    return true;
                }
                return product.product_price >= parseInt(this.filters.priceMinFilter);
            }
            const filterByMaxPrice = (product) => {
                if (this.filters.priceMaxFilter == (null || '' || undefined)) {
                    return true;
                }
                return product.product_price <= parseInt(this.filters.priceMaxFilter);
            }
            const filterByName = (product) => {
                if (this.filters.search == (null || '' || undefined)) {
                    return true;
                }
                return product.product_name.toLowerCase().includes(this.filters.search.toLowerCase());
            }
            return this.allProducts.filter(filterByType).filter(filterByMinPrice).filter(filterByMaxPrice).filter(filterByName);
        }
    },
    methods: {
        async products() {
            const response = await http.get('products/enable');
            this.allProducts = response.data.data;
        },
        details(id) {
            router.push({ name: "ProductDetails" });
        }
    },
    mounted() {
        this.products();
    }
}
</script>
<style scoped>
h1 {
    color: white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
</style>