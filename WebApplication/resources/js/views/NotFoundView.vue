<template>
    <div class="container errorcontainer">
        <p class="errornumber">404</p>
        <p class="errormessage">{{('Errors.NotFound')}}</p>
        <Router-link to="/" class="btn btn-light" ><b>{{('Auth.GoBackToMainPage')}}</b></Router-link>
    </div>
</template>
<script>
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
</script>