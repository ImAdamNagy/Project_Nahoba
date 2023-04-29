<template>
    <NavBar />
    <Header>
        <h1 class="headertitle">Mechanic details</h1>
    </Header>
    <div class="container">
        <ShowMech  />
    </div>
    </template>
    
    <script setup>
    import ShowMech from '../components/ShowMech.vue'
    import NavBar from '../components/NavBar.vue'
    import Header from '../components/Header.vue'
    import { onMounted } from 'vue'
    
    import {useMechanic} from '@/store/MechanicStore.js'
    
    onMounted(useMechanic().getMech);
    
    </script>
    <style scoped>
    .container{
        width: 100%;
        height: 100%;
        margin-top: 5%;
    }
    </style>