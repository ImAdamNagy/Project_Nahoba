<template>
    <NavBar />
        <Header><h1 class="headertitle">Avaliable products</h1></Header>
    <div class="container">
        <AdminActionsVue />
        <EnabledProductsTable />
    </div>
</template>
<script setup>
import Header from '@/components/Header.vue';
import EnabledProductsTable from '@/components/EnabledProductsTable.vue';
import NavBar from '@/components/NavBar.vue';
import AdminActionsVue from '@/components/AdminActions.vue'
</script>