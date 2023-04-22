<script setup>
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import { onMounted } from 'vue';
import { useProduct } from '../store/ProductStore.js';
import { useUser } from '../store/UserStore.js';

onMounted(useProduct().getUserProducts);
onMounted(useUser().getOtherUser);

</script>
<template>
    <NavBar />
    <Header><h1 class="headertitle">{{useUser().OtherUserDetails.username}}'s products</h1></Header>
    <div class="container">
        <div class="row mt-3 mx-auto mt-5 py-4 rounded rounded-5 px-3">
            <div class="col col-lg-4 col-md-4 col-sm-6 col-xs-12" v-for="item in useProduct().UserProducts">
            <div class="product h-100">
                <img :src="`http://localhost:8881/images/${item.product_img}`" alt="" class="img-fluid">
                <div class="row data">
                    <div class="col-12 ">
                        <h5 class="title">{{ item.product_name }}</h5>
                        <p class="price">{{ item.product_price }} Ft</p>
                        <Router-link :to="`/details/` +  item.id" class="btn btn-warning">More</Router-link>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>
<style scoped>
img {
    width: 100%;
    border-radius: 20px 0px 20px 0px;
}
.row {
    background-color: #ffffff;
}
.data {
    background-color: white;
}
.product {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: white;
    padding: 12px;
    font-weight: bold;
    border-radius: 20px 0px 20px 0px;
    border: 2px red solid;
}
.col {
    margin-top: 10px;
}
</style>   
    
