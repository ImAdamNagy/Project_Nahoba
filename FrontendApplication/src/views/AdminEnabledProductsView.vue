<template>
    <NavBar />
        <Header>
            <div class="headerdiv">
                <h1 class="headertitle">{{t('Admin.Header')}}</h1>
                <h2 class="headersubtitle">{{t('Admin.AvailableProducts')}}</h2>
            </div>
        </Header>
    <div class="container">
        <AdminActionsVue />
        <EnabledProductsTable />
    </div>
</template>
<script setup>
import Header from '@/components/Header.vue';
import EnabledProductsTable from '@/components/EnabledProductsTable.vue';
import NavBar from '@/components/NavBar.vue';
import AdminActionsVue from '@/components/AdminActions.vue'
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
</script>