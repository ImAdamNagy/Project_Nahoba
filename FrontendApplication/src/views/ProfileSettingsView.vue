<script setup>
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import MechanicSettings from '../components/MechanicSettings.vue';
import ProfileSettings from '../components/ProfileSettings.vue';
import { useUser } from '@/store/UserStore.js';
import { onMounted } from 'vue';
import { useMechanic } from '@/store/MechanicStore.js';
import {useI18n} from 'vue-i18n'

const { t } = useI18n()

onMounted(async function (){
    useUser().getUserDetails();
    if (useUser().data.role?.id == 3) {
        useMechanic().getCurrentMechanic();
    }
});

</script>

<template>
    <NavBar />
    <Header>
        <h1 class="headertitle">{{t('Settings.Settings')}}</h1>
    </Header>
    <div class="container" v-if="useUser().userDataIsLoading == false && useUser().data.role?.id == 3 && useMechanic().currentMechanicIsLoading == false">
        <ProfileSettings />
        <MechanicSettings />
    </div>
    <div class="container" v-else-if="useUser().userDataIsLoading == false && useUser().data.role?.id != 3">
        <ProfileSettings />
    </div>
    <div class="loader" v-else>
            <svg class="car" width="102" height="40" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(2 1)" stroke="white" fill="none" fill-rule="evenodd" stroke-linecap="round"
                stroke-linejoin="round">
                <path class="car__body"
                    d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01"
                    stroke-width="3" />
                <ellipse class="car__wheel--left" stroke-width="3.2" fill="#FFF" cx="83.493" cy="30.25" rx="6.922"
                    ry="6.808" />
                <ellipse class="car__wheel--right" stroke-width="3.2" fill="#FFF" cx="46.511" cy="30.25" rx="6.922"
                    ry="6.808" />
                <path class="car__line car__line--top" d="M22.5 16.5H2.475" stroke-width="3" />
                <path class="car__line car__line--middle" d="M20.5 23.5H.4755" stroke-width="3" />
                <path class="car__line car__line--bottom" d="M25.5 9.5h-19" stroke-width="3" />
            </g>
        </svg>
        </div>
</template>
<style scoped>
.loader{
  height: 400px;
}
.settingtitle {
    position: relative;
    font-size: 30px;
    z-index: 1;
    overflow: hidden;
    text-align: center;
    color: black;
}

.settingtitle:before,
.settingtitle:after {
    position: absolute;
    top: 52%;
    overflow: hidden;
    width: 48%;
    height: 2px;
    content: '\a0';
    background-color: red;
    margin-left: 2%;
}

.settingtitle:before {
    margin-left: -50%;
    text-align: right;
}
</style>