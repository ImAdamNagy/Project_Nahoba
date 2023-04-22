<template>
    <NavBar />
<div class="container-fluid">
    <CreateItem  @createProduct='createProduct' @onChange="onChange" />
</div>

</template>
<script setup>
import NavBar from '@/components/NavBar.vue';
import {http} from '../utils/http.mjs';
import CreateItem from '../components/CreateItem.vue'
import { useRouter } from 'vue-router';
import { reactive } from 'vue';

const router = useRouter();

const file = reactive({
    image: null
});

async function createProduct(newproduct){
    console.log(newproduct);
    const formdata = new FormData();
    for(const item in newproduct)
    {
        formdata.append(item, newproduct[item]);
    }
    formdata.append('img', newproduct.product_img);
    const response = await http.post('/products', formdata,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
    alert("Upload was successfull");
    router.push({name: "MainPage"});
}

async function onChange(item){
            console.log("selected file", item);
            file.image = item.target.files[0];
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