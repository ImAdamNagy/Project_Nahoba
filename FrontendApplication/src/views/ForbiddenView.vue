<template>
    <div class="container errorcontainer">
        <p class="errornumber">403</p>
        <p class="errormessage">Forbidden</p>
        <Router-link to="/" class="btn btn-light" id="backtomainF" ><b>{{t('Auth.GoBackToMainPage')}}</b></Router-link>
    </div>
</template>
<script setup>
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
</script>

