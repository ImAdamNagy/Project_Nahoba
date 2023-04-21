<template>
    <NavBar />
<div class="container-fluid">
    <CreateItem  @createProduct='createProduct'/>
</div>

</template>
<script setup>
import NavBar from '@/components/NavBar.vue';
import {http} from '../utils/http.mjs';
import CreateItem from '../components/CreateItem.vue'
import {router} from '@/router/index.js';

async function createProduct(newproduct){
    newproduct.product_img = newproduct.image.name;
    const response = await http.post('/products', newproduct,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
    router.push({name: "MainPage"});
}

</script>
<style scoped>
.container{
    width: 700px;
}
form{
    text-align: center;
    border: solid black 2px;
    border-radius: 5px;
    margin-top: 20px;
}
button{
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>