<template>
    <component :is="layout">
        <Header>
            <h1 class="headertitle">All Products</h1>
        </Header>
        <div class="container">
            <Filters />
            <ProductsOnly @details="details" />
        </div>
    </component>
</template>

<script setup>
import Filters from '../components/Filters.vue'
import ProductsOnly from '../components/ProductsOnly.vue'
import Header from '../components/Header.vue'
import { router } from '../router/index.js'

function details(id) {
    router.push({ name: "ProductDetails", params: { id } });
}
</script>