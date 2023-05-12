<script setup>
import UserProfile from '../components/UserProfile.vue'
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
</script>

<template>
    <NavBar />
    <Header>
        <div class="headerdiv">
        <h1 class="headertitle">{{t('Settings.YourProfile')}}</h1>
        </div>
    </Header>
    <div class="container">
            <UserProfile  />
    </div>
</template>