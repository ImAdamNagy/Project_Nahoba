<script setup>
import { onMounted } from 'vue'
import {useMechanic} from '@/store/MechanicStore.js'
import {useChat} from '@/store/ChatStore.js'
import { useRouter } from 'vue-router';
import { useAuth } from '@/store/AuthStore';

const router = useRouter();

onMounted(useMechanic().getMech);

async function message(){
    await useChat().createNewChat(useMechanic().Mech.user?.userid)
    router.push({name: "MessagesPage"});
}

</script>
<template>
    <div class="grid-mech" v-if="useMechanic().mechanicsIsLoading == false">
        <div class="mechgridimg">
            <img data-bs-toggle="modal" data-bs-target="#profilepic" :src="useMechanic().getImage(useMechanic().Mech.profile_pic)" :alt="`${useMechanic().Mech.profile_pic}`"
            class="mechimage img-fluid">
        </div>
        <h1 class="mechgrid-title">{{ useMechanic().Mech.user?.lastname }} {{ useMechanic().Mech.user?.firstname }}</h1>
        <div class="profession">
            <p><b>Profession: </b>{{ useMechanic().Mech.profession }}</p>
        </div>
        <div class="introduction">
            <p><b>Introduction: </b>{{ useMechanic().Mech.introduction }}
            </p>
        </div>
        <div class="mechlocation">
            <p><b>Location: </b> {{ useMechanic().Mech.city }}, {{ useMechanic().Mech.country }}, {{ useMechanic().Mech.address }} {{ useMechanic().Mech.postal_code }}</p>
        </div>
        <div class="mechmsg" v-if="useAuth().loggedIn">
            <div class="btn btn-warning" @click="message">Send message
            </div>
        </div>
        <div class="msg" v-else>
            <Router-link to="/login" class="btn btn-warning">Send message
            </Router-link>
        </div>
        <div class="modal fade" id="profilepic" tabindex="-1" aria-labelledby="profilepicLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <img class="img-fluid" :src="useMechanic().getImage(useMechanic().Mech.profile_pic)" :alt="`${useMechanic().Mech.profile_pic}`">
                </div>
            </div>
        </div>
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
.loader {
    height: 400px;
}

.msg {
    padding: 3px;
    text-align: center;
    margin: auto;
    height: 50%;
}
</style>