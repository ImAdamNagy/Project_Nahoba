<template>
        <NavBar />
        <Header>
            <h1 class="headertitle">All Products</h1>
        </Header>
        <div class="container">
            <Filters />
            <ProductsOnly @details="details" />
        </div>
</template>

<script setup>
import Filters from '../components/Filters.vue'
import ProductsOnly from '../components/ProductsOnly.vue'
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import { useRouter } from 'vue-router';

const router = useRouter();

function details(id) {
    router.push({ name: "ProductDetails", params: { id } });
}
</script>