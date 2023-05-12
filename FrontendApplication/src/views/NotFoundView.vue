<template>
    <div class="container errorcontainer">
        <p class="errornumber">404</p>
        <p class="errormessage">{{t('Errors.NotFound')}}</p>
        <Router-link to="/" class="btn btn-light" id="backtomainN"><b>{{t('Auth.GoBackToMainPage')}}</b></Router-link>
    </div>
</template>
<script setup>
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
</script>