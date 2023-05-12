<template>
        <NavBar />
        <Header>
            <div class="headerdiv">
            <h1 class="headertitle">{{t('HeaderTitle.ProductsPageTitle')}}</h1>
            </div>
        </Header>
        <div class="container">
            <Filters />
            <ProductsOnly @details="details" />
        </div>
</template>

<script setup>
import Filters from '../components/Filters.vue'
import ProductsOnly from '../components/ProductsOnly.vue'
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import { useRouter } from 'vue-router';
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
const router = useRouter();

function details(id) {
    router.push({ name: "ProductDetails", params: { id } });
}
</script>