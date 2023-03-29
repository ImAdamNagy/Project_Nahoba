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
<Header><h1>All Products</h1></Header>
<div class="container-fluid itemsArea">
<Filters />
<Items @details="details" :id="id"/>
</div>
</template>

<script setup>
import {useAuth} from '@/store/AuthStore.js'
import Filters from '../components/layouts/Filters.vue'
import Items from '../components/layouts/Items.vue'
import Header from '../components/layouts/Header.vue'
import NavBar from '../components/layouts/NavBar.vue';
</script>
<style scoped>

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