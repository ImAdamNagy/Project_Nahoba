<template>

<div class="container">
    <div class="row">
        <div class="col">
            
                <form class="form" @submit.prevent="createProduct()">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="p_name" id="name" class="form-control" v-model="newData.productName">
                
                    <label for="price" class="form-label">Product Price</label>
                    <input type="text" name="price" id="price" class="form-control" v-model="newData.productPrice">

                    <label for="type" class="form-label">Product Type</label>
                    <select name="type" class="form-select" id="type" v-model="newData.productType">
                        <option  v-for="item in types.data" :value="item.id">
                        {{ item.type }}
                        </option>
                    </select>

                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" id="desc" rows="5" v-model="newData.desc"></textarea>

                    <label for="loc" class="form-label">Location</label>
                    <textarea class="form-control" id="loc" rows="5" v-model="newData.loc"></textarea>

                    <br>
                    <label for="img" class="form-label">Upload image</label>
                    <br>
                    <input type="file"  ref="file" style="display: none"/>
                    <input type="text" name="" id="img" v-model="newData.img">
                    <button @click="$refs.file.click()">Choose an image..</button>

                    <button class="btn-warning btn form-control" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
    

</template>
<script setup>
import {reactive} from 'vue';
import {http} from '../utils/http.mjs';
import {router} from '../router/index.js';

const types = reactive({
    data: {}
});

async function allTypes(){
        const response = await http.get('types');
        types.data = response.data.data;
        console.log(types.data);
}
allTypes();

const newData = reactive({
    productName: '',
    productPrice: '',
    productType: '',
    img: '',
    desc: '',
    loc: ''
});

const newproduct = reactive({
    product_name: '',
    product_price: '',
    types_id: '',
    product_img: '',
    product_description: '',
    product_location: ''
});

async function createProduct(){
    this.newproduct.product_name = this.newData.productName;
    this.newproduct.product_price = this.newData.productPrice;
    this.newproduct.types_id = this.newData.productType;
    this.newproduct.product_img = this.newData.img;
    this.newproduct.product_description = this.newData.desc;
    this.newproduct.product_location = this.newData.loc;

    console.log(this.newproduct);
    const response = await http.post('createproduct', newproduct);
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