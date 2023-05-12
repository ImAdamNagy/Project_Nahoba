<template>
    <NavBar />
        <Header>
            <div class="headerdiv">
            <h1 class="headertitle">{{t('Admin.Header')}}</h1>
            <h2 class="headersubtitle">{{t('Admin.Users')}}</h2>
            </div>
        </Header>
    <div class="container">
        <AdminActionsVue />
        <UsersTable />
    </div>
</template>
<script setup>
import Header from '../components/Header.vue';
import UsersTable from '../components/UsersTable.vue';
import NavBar from '../components/NavBar.vue';
import AdminActionsVue from '@/components/AdminActions.vue'
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
</script>