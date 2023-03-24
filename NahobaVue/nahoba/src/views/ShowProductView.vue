<template>

<NavBar />
<div class="container">
    <ShowItem />
</div>


</template>

<script setup>
import ShowItem from '../components/layouts/ShowItem.vue'
import NavBar from '../components/layouts/NavBar.vue'


</script>
<style scoped>
.container{
    width: 100%;
    height: 100%;
    margin-top: 5%;
}
</style>