<template>
    <NavBar />
    <Header>
        <div class="headerdiv">
        <h1 class="headertitle">{{t('MechInfo.MechanicShowTitle')}}</h1>
        </div>
    </Header>
    <div class="container">
        <ShowMech  />
    </div>
    </template>
    
    <script setup>
    import ShowMech from '../components/ShowMech.vue'
    import NavBar from '../components/NavBar.vue'
    import Header from '../components/Header.vue'
    import { onMounted } from 'vue'
    import {useMechanic} from '@/store/MechanicStore.js'
    import {useI18n} from 'vue-i18n'

const { t } = useI18n()
    onMounted(useMechanic().getMech);
    
    </script>
    <style scoped>
    .container{
        width: 100%;
        height: 100%;
        margin-top: 5%;
    }
    </style>