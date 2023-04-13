import { createApp } from 'vue'
import { createPinia } from 'pinia'
import { router } from './router/index.js'

import App from '@/App.vue'
import BSAlert from '@/components/bootstrap/BSAlert.vue'

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@/assets/app.scss'

import {defineRule} from 'vee-validate';
defineRule('required',(value)=>{
    if(!value || value === ''){
        return 'A mező kitöltése kötelező!';
    }
    return true;
})

const app = createApp(App)

app.component('Alert', BSAlert)

app.use(createPinia())
app.use(router)

app.mount('#app')
