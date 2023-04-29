<template>
    <NavBar />
    <Header><h1 class="headertitle">Mechanics</h1></Header>
    <div class="container">
        <MechanicsOnly @mechDetails="mechDetails" />
    </div>
</template>

<script setup>
import MechanicsOnly from '../components/MechanicsOnly.vue'
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import { router } from '@/router/index.js'

function mechDetails(id) {
    router.push({ name: "MechDetails", params: { id } });
}

</script>