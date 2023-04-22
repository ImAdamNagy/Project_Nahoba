<template>
    <NavBar />
    <Header><h1 class="headertitle">Welcome to Nahoba Parts</h1></Header>
    <div class="container">
        <div class="row">
            <Mechanics  @details="details" />
            <Products @details="details" />
        </div>
        <div class="row mx-auto py-4 rounded rounded-5 px-3">
      </div>
    </div>
</template>

<script >
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import Products from '@/components/Products.vue'
import Mechanics from '@/components/Mechanics.vue'
import { router } from '../router/index.js'

export default {
    components: {
        Header,
        NavBar,
        Products,
        Mechanics
    },
    methods: {
        details(id) {
            router.push({ name: "ProductDetails",params:{id}});
        }
    }
}
</script>
