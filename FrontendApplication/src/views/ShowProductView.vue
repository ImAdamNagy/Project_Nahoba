<template>
<NavBar />
<Header>
    <div class="headerdiv">
    <h1 class="headertitle">{{t('HeaderTitle.ProductsShowTitle')}}</h1>
    </div>
</Header>
<div class="container">
    <ShowItem  />
</div>
</template>

<script setup>
import ShowItem from '../components/ShowItem.vue'
import NavBar from '../components/NavBar.vue'
import Header from '../components/Header.vue'
import { onMounted } from 'vue'

import {useProduct} from '@/store/ProductStore.js'
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
onMounted(useProduct().getProduct);

</script>
<style scoped>
.container{
    width: 100%;
    height: 100%;
    margin-top: 5%;
}
</style>