<template>
<NavBar />
<Header><h1 class="headertitle">{{ useProduct().Product.product_name }} </h1></Header>
<div class="container">
    <ShowItem  />
</div>
</template>

<script setup>
import ShowItem from '../components/ShowItem.vue'
import NavBar from '../components/NavBar.vue'
import Header from '../components/Header.vue'
import { onMounted } from 'vue'

import {useProduct} from '@/store/ProductStore.js'

onMounted(useProduct().getProduct);

</script>
<style scoped>
.container{
    width: 100%;
    height: 100%;
    margin-top: 5%;
}
</style>