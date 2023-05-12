<template>
    <NavBar />
        <Header>
            <div class="headerdiv">
            <h1 class="headertitle">{{t('Admin.Header')}}</h1>
            <h2 class="headersubtitle">{{t('Admin.WaitingList')}}</h2>
            </div>
        </Header>
    <div class="container">
        <AdminActionsVue />
        <DisableProductsTable />
    </div>
</template>
<script setup>
import Header from '../components/Header.vue';
import DisableProductsTable from '../components/DisableProductsTable.vue';
import NavBar from '../components/NavBar.vue';
import AdminActionsVue from '@/components/AdminActions.vue'
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
</script>