<template>
    <NavBar />
    <Header>
        <h1>Welcome to Nahoba Parts</h1>
    </Header>
    <div class="container-fluid">
        <div class="row" v-if="allProducts.length > 0">

            <Mechanics  @details="details" :allProducts="allProducts"/>
            <Products @details="details" :allProducts="allProducts" />
    
        </div>
        <div class="row mx-auto py-4 rounded rounded-5 px-3" v-else>
        <div class="col-12">
                <h3 id="msg">Just a moment, the main page is loading</h3>
            </div>
      </div>
    </div>
</template>

<script >
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import Products from '@/components/Products.vue'
import Mechanics from '@/components/Mechanics.vue'
import { http } from '../utils/http.mjs';
import { router } from '../router/index.js'


export default {
    components: {
        Header,
        NavBar,
        Products,
        Mechanics
    },
    data() {
        return {
            allProducts: [],
            filters: null
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
#msg{
        text-align: center;
        color: white;
    }
</style>