<template>
<NavBar />
<Header><h1>All Products</h1></Header>
<div class="container-fluid itemsArea">
<Filters />
<Items @details="details" :id="id"/>
</div>
</template>

<script setup>
import Filters from '../components/layouts/Filters.vue'
import Items from '../components/layouts/Items.vue'
import Header from '../components/layouts/Header.vue'
import NavBar from '../components/layouts/NavBar.vue';
</script>
<style scoped>

h1{
    color:white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
</style>