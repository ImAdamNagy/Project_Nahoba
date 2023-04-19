<template>
    <AdminNavBar />
    <Header><h1>Admin Mainpage</h1></Header>
    <DisableProductsTable />
</template>
<script setup>
import Header from '../components/Header.vue';
import AdminNavBar from '../components/AdminNavBar.vue';
import AdminNavigationBar from '../components/AdminNavigationBar.vue';
import DisableProductsTable from '../components/DisableProductsTable.vue';
</script>
<style scoped>
h1{
    color:white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
</style>