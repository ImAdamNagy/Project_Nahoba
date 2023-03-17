<template>
<Sales />
<div class="container-fluid itemsArea">
<Filters />
<Items />
</div>

</template>

<script>
import Sales from '../components/layouts/Sales.vue'
import Filters from '../components/layouts/Filters.vue'
import Items from '../components/layouts/Items.vue'

export default{
    components:{
        Sales,
        Filters,
        Items
    },
}
</script>
<style scoped>
.itemsArea{
    background: linear-gradient(180deg, rgb(8, 6, 20) 0%, rgb(150, 27, 27) 100%);
    text-align: center;
}
</style>