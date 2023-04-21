<script setup>
import UserProfile from '../components/UserProfile.vue'
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import {http} from '@/utils/http.mjs';
import {reactive, onMounted} from 'vue';

const own = reactive({
    data: {},
    helper: ""
});
const types = reactive({
    data: {}
});
async function getOwnProducts(){
    const response = await http.get('/products/userproducts/' + localStorage.getItem("userid"),{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
    own.data = response.data.data;
}
onMounted(getOwnProducts);

</script>

<template>
    <NavBar />
    <Header><h1 class="headertitle">Your Profile</h1></Header>
    <div class="container-fluid">
            <UserProfile :data="own.data"/>
    </div>
</template>