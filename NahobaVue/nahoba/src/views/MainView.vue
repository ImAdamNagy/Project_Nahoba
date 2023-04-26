<template>
    <NavBar />
    <Header><h1 class="headertitle">Welcome to Nahoba Parts</h1></Header>
    <div class="container">
        <div class="row" v-if="useProduct().EnableProducts.length > 0">
            <Mechanics  @details="details" />
            <Products @details="details" />
        </div>
        <div class="row mt-5" v-else>
                <p class="loadingmsg">Just a moment, the mainpage is loading</p>
        </div>
    </div>
</template>

<script setup>
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import Products from '@/components/Products.vue'
import Mechanics from '@/components/Mechanics.vue'
import { router } from '../router/index.js'
import { useProduct } from '../store/ProductStore.js';
import { onMounted } from 'vue';

function details(id) {
    router.push({ name: "ProductDetails",params:{id}});
}

onMounted(useProduct().getEnabledProducts);
</script>
