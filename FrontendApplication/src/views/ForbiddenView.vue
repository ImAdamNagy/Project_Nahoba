<template>
    <div class="container errorcontainer">
        <p class="errornumber">403</p>
        <p class="errormessage">Forbidden</p>
        <Router-link to="/" class="btn btn-light" ><b>{{t('Auth.GoBackToMainPage')}}</b></Router-link>
    </div>
</template>
<script>
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
</script>
