<script setup>
import { onMounted } from 'vue'
import {useProduct} from '@/store/ProductStore.js'

onMounted(useProduct().getProduct);

</script>
<template>
    <div class="grid-container">
        <img :src="`/img/${useProduct().Product.product_img}`" alt="" class="image img-fluid">
        <h1 class="grid-title">{{ useProduct().Product.product_name }}</h1>
        <div class="price">
            <p><b>Price: </b>{{ useProduct().Product.product_price}}</p>
        </div>
        <div class="seller">
            <p><b>Seller name: </b>{{ useProduct().Product.seller?.firstname}} {{ useProduct().Product.seller?.lastname}}</p>
            <router-link to="/"><b>Seller Products</b></router-link>
        </div>
        <div class="location">
            <p><b>Location: </b>{{ useProduct().Product.product_location }}</p>
        </div>
        <div class="desc">
            <p><b>Description: </b>{{ useProduct().Product.product_description}}</p>
        </div>
        <div class="msg">
            <div class="btn btn-warning">Send message</div>
        </div>
    </div>
</template>
<style scoped>
.msg{
    padding: 3px;
    text-align: center;
    margin: auto;
    height: 50%;
}
</style>