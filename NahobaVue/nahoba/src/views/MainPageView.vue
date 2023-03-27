<template>
<Header />
<div class="container-fluid itemsArea">
<Filters />
<Items @details="details" :id="id"/>
</div>

</template>

<script setup>
import Filters from '../components/layouts/Filters.vue'
import Items from '../components/layouts/Items.vue'
import Header from '../components/layouts/Header.vue'

</script>
<style scoped>
.itemsArea{
    text-align: center;
    height: 100%;
}
</style>