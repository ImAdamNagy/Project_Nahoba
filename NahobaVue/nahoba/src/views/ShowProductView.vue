<template>
<NavBar />
<Header><h1>{{ datas.data.product_name }} </h1></Header>
<div class="container">
    <ShowItem :data="datas.data" :seller="datas.seller" />
</div>
</template>

<script setup>
import ShowItem from '../components/ShowItem.vue'
import NavBar from '../components/NavBar.vue'
import {http} from '../utils/http.mjs'
import Header from '../components/Header.vue'
import { reactive, onMounted } from 'vue'

const datas = reactive({
        data: {},
        seller: {}
})
            
async function getSeller(){
    const response = await http.get("/user/" + datas.data.seller.userid);
    datas.seller = response.data.data;
}
async function getItem(){
        const response = await http.get("/products/" + localStorage.getItem("productId"));
        datas.data = response.data.data;
        console.log(datas.data)
        getSeller();
}
onMounted(getItem);

</script>
<style scoped>
.container{
    width: 100%;
    height: 100%;
    margin-top: 5%;
}
h1{
    color:white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
</style>