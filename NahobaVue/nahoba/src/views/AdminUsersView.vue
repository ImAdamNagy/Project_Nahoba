<template>
    <NavBar />
        <Header><h1 class="headertitle">Admin Mainpage</h1></Header>
    <div class="container">
        <AdminActionsVue />
        <UsersTable />
    </div>
</template>
<script setup>
import Header from '../components/Header.vue';
import UsersTable from '../components/UsersTable.vue';
import NavBar from '../components/NavBar.vue';
import AdminActionsVue from '@/components/AdminActions.vue'
</script>