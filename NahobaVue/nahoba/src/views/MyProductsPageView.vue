<template>
    <NavBar />
<div class="container-fluid">
<MyProducts :data="own.data"/>
</div>

</template>
<script setup>
import NavBar from '../components/NavBar.vue';
import MyProducts from "@/components/MyProducts.vue";
import {http} from '@/utils/http.mjs';
import {reactive} from 'vue';

const own = reactive({
    data: {}
});

async function getOwnProducts(){
    const response = await http.get('/ownproducts/' + localStorage.getItem("userid"));
    own.data = response.data.data;
    console.log(own.data);
}
getOwnProducts();


</script>