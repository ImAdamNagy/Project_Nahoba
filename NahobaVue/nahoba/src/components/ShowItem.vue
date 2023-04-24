<script setup>
import { onMounted } from 'vue'
import {useProduct} from '@/store/ProductStore.js'

onMounted(useProduct().getProduct);


</script>
<template>
    <div class="grid-container" v-if="useProduct().getProduct.length > 0">
        <img :src="`http://localhost:8881/images/${useProduct().Product.product_img}`" alt="" class="image img-fluid" >
        <h1 class="grid-title">{{ useProduct().Product.product_name }}</h1>
        <div class="price">
            <p><b>Price: </b>{{ useProduct().Product.product_price}}</p>
        </div>
        <div class="seller">
            <p><b>Seller name: </b>{{ useProduct().Product.seller?.firstname}} {{ useProduct().Product.seller?.lastname}}</p>
            <Router-link :to="`/OtherUserProducts/` + useProduct().Product.seller?.userid"><b>Seller Products</b></Router-link>
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
    <div class="row" v-else>
                <h3 class="loadingmsg">Just a moment, the mainpage is loading</h3>
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