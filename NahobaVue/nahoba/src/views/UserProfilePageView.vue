<script setup>
import UserProfile from '../components/UserProfile.vue'
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import {http} from '@/utils/http.mjs';
import {reactive} from 'vue';
import { useRouter } from 'vue-router';

const own = reactive({
    data: {},
    helper: ""
});
const types = reactive({
    data: {}
});
async function getOwnProducts(){
    const response = await http.get('/ownproducts/' + localStorage.getItem("userid"),{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
    own.data = response.data.data;
}
getOwnProducts();

async function allTypes(){
        const response = await http.get('types');
        types.data = response.data.data;
}
allTypes();
</script>

<template>
    <NavBar />
    <Header><h1>Your Profile</h1></Header>
    <div class="container-fluid">
            <UserProfile :data="own.data" :types="types.data"/>
    </div>
</template>
<style scoped>
h1{
    color:white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
</style>