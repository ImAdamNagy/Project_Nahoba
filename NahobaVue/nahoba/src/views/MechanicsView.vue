<template>
    <NavBar />
    <Header><h1 class="headertitle">{{ t('MechInfo.MechanicPageTitle') }}</h1></Header>
    <div class="container">
        <MechanicsOnly @mechDetails="mechDetails" />
    </div>
</template>

<script setup>
import MechanicsOnly from '../components/MechanicsOnly.vue'
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import { useRouter } from 'vue-router';
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
const router = useRouter();

function mechDetails(id) {
    router.push({ name: "MechDetails", params: { id } });
}

</script>