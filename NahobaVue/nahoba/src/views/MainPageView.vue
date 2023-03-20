<template>
<NavBar />
<Sales />
<div class="container-fluid itemsArea">
<Filters />
<Items />
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
    background: linear-gradient(180deg, rgb(8, 6, 20) 0%, rgb(150, 27, 27) 100%);
    text-align: center;
}
</style>