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
<div class="container-fluid">
    <CreateItem :data="types.data" @createProduct='createProduct'/>
</div>

</template>
<script setup>
import NavBar from '@/components/NavBar.vue';
import {reactive} from 'vue';
import {http} from '../utils/http.mjs';
import {useAuth} from '@/store/AuthStore.js'
import CreateItem from '../components/CreateItem.vue'
import {router} from '@/router/index.js';

const types = reactive({
    data: {}
});

async function allTypes(){
        const response = await http.get('types');
        types.data = response.data.data;
}
allTypes();

async function createProduct(newproduct){
    newproduct.product_img = newproduct.image.name;
    const response = await http.post('createproduct', newproduct,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
    console.log(newproduct);
    router.push({name: "MainPage"});
    
}

</script>
<style scoped>
.container{
    width: 700px;
}
form{
    text-align: center;
    border: solid black 2px;
    border-radius: 5px;
    margin-top: 20px;
}
button{
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>