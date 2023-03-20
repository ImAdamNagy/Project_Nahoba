<template>

    <div class="container">
        <div class="row">

    <form class="form" @submit.prevent="createProduct()">
        <label for="sellerid" class="form-label">Seller Id</label>
        <input type="text" name="s_id" id="sellerid" class="form-control" v-model="newData.sellerId">

        <label for="name" class="form-label">Product Name</label>
        <input type="text" name="p_name" id="name" class="form-control" v-model="newData.productName">

        <label for="price" class="form-label">Product Price</label>
        <input type="text" name="price" id="price" class="form-control" v-model="newData.productPrice">

        <label for="type" class="form-label">Product Type</label>
        <input type="text" name="type" id="type" class="form-control" v-model="newData.productPrice">

        <button class="btn-warning btn form-control" type="submit">Create</button>
    </form>
        </div>
    </div>
    

</template>
<script setup>
import {reactive} from 'vue';

const newData = reactive({
    sellerId: '',
    productName: '',
    productPrice: '',
    productType: ''
});

const newproduct = reactive({
    seller_id: '',
    product_name: '',
    product_price: '',
    product_tpye: ''
});

async function createProduct(){
    this.newproduct.seller_id = this.newData.sellerId;
    this.newproduct.product_name = this.newData.productName;
    this.newproduct.product_price = this.newData.productPrice;
    this.newproduct.product_tpye = this.newData.productType;
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