<script setup>
import UserProfile from '../components/UserProfile.vue'
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
</script>

<template>
    <NavBar />
    <Header><h1 class="headertitle">Your Profile</h1></Header>
    <div class="container">
            <UserProfile  />
    </div>
</template>