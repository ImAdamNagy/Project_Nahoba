<script setup>
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { onMounted } from 'vue';
import * as yup from 'yup';
import { useUser } from '@/store/UserStore.js';
import { useMechanic } from '@/store/MechanicStore.js';
import MechanicSettings from '../components/MechanicSettings.vue';
import ProfileSettings from '../components/ProfileSettings.vue';

const schema = yup.object(
    {
        email: yup.string().email().required(),
        firstname: yup.string().min(1).required(),
        lastname: yup.string().min(1).required(),
        tel: yup.number().required().test("length", "not valid", value => value.toString().length >= 6 && value.toString().length <= 18),
        username: yup.string().min(4).max(15).required(),
    });

onMounted(useUser().getUserDetails)
onMounted(useMechanic().getCurrentMechanic)
console.log(useMechanic().currentMechanic)
</script>

<template>
    <NavBar />
    <Header>
        <h1 class="headertitle">Settings</h1>
    </Header>
    <div class="container">
        <ProfileSettings />
        <MechanicSettings />
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