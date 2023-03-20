<template>

    <div class="container">
        <div class="row">

    <form class="form" @submit.prevent="createProduct()">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" name="p_name" id="name" class="form-control" v-model="newData.productName">

        <label for="price" class="form-label">Product Price</label>
        <input type="text" name="price" id="price" class="form-control" v-model="newData.productPrice">

        <label for="type" class="form-label">Product Type</label>
        <input type="text" name="type" id="type" class="form-control" v-model="newData.productType">

        <button class="btn-warning btn form-control" type="submit">Create</button>
    </form>
        </div>
    </div>
    

</template>
<script setup>
import {reactive} from 'vue';
import {http} from '../utils/http.mjs';

const newData = reactive({
    productName: '',
    productPrice: '',
    productType: ''
});

const newproduct = reactive({
    product_name: '',
    product_price: '',
    product_type: ''
});

async function createProduct(){
    this.newproduct.product_name = this.newData.productName;
    this.newproduct.product_price = this.newData.productPrice;
    this.newproduct.product_type = this.newData.productType;

    const response = http.post('createproduct', newproduct);
    console.log(this.newproduct);
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