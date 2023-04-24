<template>
    <NavBar />
        <Header><h1 class="headertitle">Admin Mainpage</h1></Header>
    <div class="container">
        <DisableProductsTable />
    </div>
</template>
<script setup>
import Header from '../components/Header.vue';
import DisableProductsTable from '../components/DisableProductsTable.vue';
import NavBar from '../components/NavBar.vue';
</script>
