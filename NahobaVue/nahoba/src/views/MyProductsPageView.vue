<template>
    <NavBar />
    <Header><h1>My Products</h1></Header>
<div class="container-fluid">
<MyProducts :data="own.data"/>
</div>

</template>
<script setup>
import NavBar from '../components/NavBar.vue';
import MyProducts from "@/components/MyProducts.vue";
import Header from '../components/Header.vue';
import {http} from '@/utils/http.mjs';
import {reactive} from 'vue';

const own = reactive({
    data: {}
});

async function getOwnProducts(){
    const response = await http.get('/ownproducts/' + localStorage.getItem("userid"),{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
    own.data = response.data.data;
    console.log(own.data);
}
getOwnProducts();
</script>
<style scoped>
h1{
    color:white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
</style>