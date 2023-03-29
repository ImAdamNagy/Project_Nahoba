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
<Header><h1>{{ data.product_name }} </h1></Header>
<div class="container">
    <ShowItem :data="data" :seller="seller" />
</div>

</template>

<script>
import {useAuth} from '@/store/AuthStore.js'
import ShowItem from '../components/layouts/ShowItem.vue'
import NavBar from '../components/layouts/NavBar.vue'
import {http} from '../utils/http.mjs'
import Header from '../components/layouts/Header.vue'

export default{
    data(){
        return{
            data: {},
            seller: {}
        }
    },
    components:{
        NavBar,
        Header,
        ShowItem
    },
    methods:{
        async getItem(){
                const response = await http.get("product/" + localStorage.getItem("id"));
                this.data = response.data.data;
                this.getSeller();
            },
        async getSeller(){
            const response = await http.get("user/" + this.data.seller_id);
            this.seller = response.data.data;
            console.log(this.seller);
        }
    },
    mounted(){
        this.getItem();
    }
}
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
</style>