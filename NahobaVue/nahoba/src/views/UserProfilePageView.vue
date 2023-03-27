<script setup>
import UserProfile from '../components/layouts/UserProfile.vue'
import NavBar from '../components/layouts/NavBar.vue';
import Header from '../components/layouts/Header.vue';
</script>

<template>
    <NavBar />
    <Header><h1>Your Profile</h1></Header>
    <div class="container-fluid">
        <UserProfile />
    </div>
</template>
<style scoped>
h1{
    color:white;
    margin-left: 5%;
    font-size: 300%;
}
</style>