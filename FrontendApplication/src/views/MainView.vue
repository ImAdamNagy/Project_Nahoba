<template>
    <NavBar />
    <Header>
        <div class="headerdiv">
        <h1 class="headertitle">{{ t("HeaderTitle.MainPageTitle") }}</h1>
        </div>
    </Header>
    <div class="container">
        <div class="row" v-if="useProduct().enableProductsIsLoading == false && useMechanic().mechanicsIsLoading == false">
            <Mechanics @mechDetails="mechDetails"/>
            <Products @details="details" />
        </div>
        <div class="loader" v-else>
            <svg class="car" width="102" height="40" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(2 1)" stroke="white" fill="none" fill-rule="evenodd" stroke-linecap="round"
                stroke-linejoin="round">
                <path class="car__body"
                    d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01"
                    stroke-width="3" />
                <ellipse class="car__wheel--left" stroke-width="3.2" fill="#FFF" cx="83.493" cy="30.25" rx="6.922"
                    ry="6.808" />
                <ellipse class="car__wheel--right" stroke-width="3.2" fill="#FFF" cx="46.511" cy="30.25" rx="6.922"
                    ry="6.808" />
                <path class="car__line car__line--top" d="M22.5 16.5H2.475" stroke-width="3" />
                <path class="car__line car__line--middle" d="M20.5 23.5H.4755" stroke-width="3" />
                <path class="car__line car__line--bottom" d="M25.5 9.5h-19" stroke-width="3" />
            </g>
        </svg>
        </div>
    </div>
</template>

<script setup>
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import Products from '@/components/Products.vue'
import Mechanics from '@/components/Mechanics.vue'
import { useProduct } from '../store/ProductStore.js';
import { onMounted } from 'vue';
import { useMechanic } from '../store/MechanicStore'
import { useRouter } from 'vue-router';
import {useI18n} from 'vue-i18n'


const { t } = useI18n()

const router = useRouter();

function details(id) {
    router.push({ name: "ProductDetails",params:{id}});
}
function mechDetails(id) {
    router.push({ name: "MechDetails", params: { id } });
}
onMounted(async function (){
    useProduct().getEnabledProducts();
    useMechanic().getMechanics();
});

</script>
<style scoped>
.loader{
  height: 400px;
}
</style>
