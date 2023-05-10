import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { router } from './router/index.js'

import App from '@/App.vue'
import {createI18n} from 'vue-i18n'
import BSAlert from '@/components/bootstrap/BSAlert.vue'
import AllRules from '@vee-validate/rules'
import { defineRule } from 'vee-validate';
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@/assets/app.scss'

import hu from '@/lang/hu.mjs'
import en from '@/lang/en.mjs'

const messages = {
    hu,
    en
}
const i18n = createI18n({
    legacy: false, 
    locale: 'en', 
    fallbackLocale: 'en',
    messages
  })

Object.keys(AllRules).forEach(rule => defineRule(rule,AllRules[rule]))

const app = createApp(App)

app.component('Alert', BSAlert)

app.use(i18n)
app.use(createPinia())
app.use(router)

app.mount('#app')
