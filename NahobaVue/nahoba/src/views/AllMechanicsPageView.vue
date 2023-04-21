<template>
    <NavBar />
    <Header><h1 class="headertitle">Mechanics</h1></Header>
    <div class="container-fluid">
        <Filters @filter="values => filters = values" />
        <MechanicsOnly  />
    </div>
</template>

<script >
import Filters from '../components/Filters.vue'
import MechanicsOnly from '@/components/MechanicsOnly.vue'
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import { http } from '../utils/http.mjs';
import { router } from '../router/index.js'

export default {
    components: {
        Filters,
        MechanicsOnly,
        Header,
        NavBar
    }
}
</script>