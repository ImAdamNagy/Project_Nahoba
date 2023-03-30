<template>
<NavBar>
    <div class="nav-item space" v-if="useAuth().loggedIn">
        <div class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle end" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              My profile
            </a>
            <ul class="dropdown-menu" id="drop">
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><Router-link class="dropdown-item" to="/user">Profile</Router-link></li>
              <li><a class="dropdown-item" href="#">My products</a></li>
              <li><a class="dropdown-item" href="#">Messages</a></li>
              <div class="dropdown-divider"></div>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
    <div class="nav-item space mx-3" v-else>
        <li class="nav-item">
          <Router-link class="nav-link active text-light" to="/login">Login</Router-link>
        </li>
    </div>
</NavBar>
<Header><h1>{{ datas.data.product_name }} </h1></Header>
<div class="container">
    <ShowItem :data="datas.data" :seller="datas.seller" />
</div>

</template>

<script setup>
import {useAuth} from '@/store/AuthStore.js'
import ShowItem from '../components/layouts/ShowItem.vue'
import NavBar from '../components/layouts/NavBar.vue'
import {http} from '../utils/http.mjs'
import Header from '../components/layouts/Header.vue'
import { reactive } from 'vue'

const datas = reactive({
        data: {},
        seller: {}
})
            
async function getSeller(){
    const response = await http.get("user/" + datas.data.seller_id);
    datas.seller = response.data.data;
}
async function getItem(){
        const response = await http.get("product/" + localStorage.getItem("id"));
        datas.data = response.data.data;
        getSeller();
}
getItem();

</script>
<style scoped>
.container{
    width: 100%;
    height: 100%;
    margin-top: 5%;
}
h1{
    color:white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
li{
    list-style: none;
}
</style>