<template>
<NavBar />
<Header><h1>All Products</h1></Header>
<div class="container-fluid itemsArea">
<Filters />
<Items @details="details" :id="id"/>
</div>
</template>

<script setup>
import Filters from '../components/Filters.vue'
import Items from '../components/Items.vue'
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue';
</script>
<style scoped>

h1{
    color:white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
</style>