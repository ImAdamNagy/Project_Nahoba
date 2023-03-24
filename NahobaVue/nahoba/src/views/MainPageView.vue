<template>
<NavBar />
<Sales />
<div class="container-fluid itemsArea">
<Filters />
<Items @details="details" :id="id"/>
</div>

</template>

<script setup>
import Sales from '../components/layouts/Sales.vue'
import Filters from '../components/layouts/Filters.vue'
import Items from '../components/layouts/Items.vue'
import NavBar from '../components/layouts/NavBar.vue'

</script>
<style scoped>
.itemsArea{
    text-align: center;
    height: 100%;
}
</style>