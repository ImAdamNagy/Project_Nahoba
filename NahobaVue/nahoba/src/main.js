import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { router } from './router/index.js'

import App from '@/App.vue'
import BSAlert from '@/components/bootstrap/BSAlert.vue'

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@/assets/app.scss'


import AllRules from '@vee-validate/rules'
import { defineRule } from 'vee-validate';
Object.keys(AllRules).forEach(rule => defineRule(rule,AllRules[rule]))



const app = createApp(App)

app.component('Alert', BSAlert)

app.use(createPinia())
app.use(router)

app.mount('#app')
