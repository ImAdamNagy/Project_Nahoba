<script setup>
import {reactive,ref} from 'vue';
import {http} from '../../utils/http.mjs'
import {useRouter} from "vue-router";

const router = useRouter();

const userData = reactive({
    username: '',
    password: ''
});

const error = ref(null);


async function login(){
    const response = await http.post('login', userData);
    if(response.status !== 200){
        error.value = response.statusText
    }else{
        console.log(response.data);
        localStorage.setItem('token',response.data.data.token);
        localStorage.setItem('userid',response.data.data.userid);
        router.push({name:'MainPage'});
    }
}
</script>

<template>
    <div class="row py-5 mx-auto">
        <div class="col-sm-3 ms-sm-auto bg-warning" id="left">
            <h1>Welcome Back!</h1>
        </div> 
        <div class="col-sm-2 me-sm-auto mx-xs-auto text-center" id="right">
            <div id="formdiv">
                <h1 id="title">Login</h1>
                <form @submit.prevent="login">
                    <label for="username" class="form-label text-center">Username:</label>
                    <input type="text" name="username" id="username" placeholder="username" class="form-control" v-model="userData.username">
                    <label for="password" class="form-label text-center">Password:</label>
                    <input type="password" name="password" id="password" placeholder="password" class="form-control" v-model="userData.password">
                    <button class="btn btn-secondary my-3 float-end  rounded-pill" type="submit">Login</button>
                    <Router-link class="btn btn-secondary my-3 float-start rounded-pill" to="/register">Sign up</Router-link> 
                </form>
            </div>
        </div>  
    </div>
</template>

<style scoped>
    .row{
        position: relative;
        top: 35%;
    }
    @media screen and (max-width: 576px) {
        .row{
        top: 3%;
    }
}
    input{
        margin-top: 7px;
    }
    #formdiv{
        padding: 10px;
    }
    #right{
        box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
        background-color: #D9D9D9;
        border-end-end-radius: 30px;
    }
    #left{
        box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
        background-image: url(../img/porsche.jpg);
        background-position: center;
        background-size: cover;
        padding-top: 15%;
        border-start-start-radius: 30px;

    }
    h1,p{
        color: white;
        text-align: center;
    }
    #title{
        color:black;
    }
</style>