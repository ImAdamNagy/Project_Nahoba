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
              <li><Router-link class="dropdown-item" to="/myproducts">My products</Router-link></li>
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
<div class="container-fluid">
<MyProducts :data="own.data"/>
</div>

</template>
<script setup>
import NavBar from '../components/layouts/NavBar.vue';
import {useAuth} from '@/store/AuthStore.js'
import MyProducts from "@/components/layouts/MyProducts.vue";
import {http} from '@/utils/http.mjs';
import {reactive} from 'vue';

const own = reactive({
    data: {}
});

async function getOwnProducts(){
    const response = await http.get('/ownproducts/' + localStorage.getItem("userid"));
    own.data = response.data.data;
    console.log(own.data);
}
getOwnProducts();


</script>