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
        localStorage.setItem('token',response.data.data.token);
        localStorage.setItem('userid',response.data.data.userid);
        router.push({name:'MainPage'});
    }
}
</script>

<template>
    <div class="row py-5 mx-auto">
        <div class="col-md-3 ms-md-auto bg-warning" id="left">
            <h1>Welcome Back!</h1>
        </div> 
        <div class="col-md-2 me-md-auto mx-xs-auto text-center" id="right">
            <div id="formdiv">
                <h1 id="title">Login</h1>
                <form @submit.prevent="login">
                    <label for="username" class="form-label text-center">Username:</label>
                    <input type="text" name="username" id="username" placeholder="username" class="form-control" v-model="userData.username">
                    <label for="password" class="form-label text-center">Password:</label>
                    <input type="password" name="password" id="password" placeholder="password" class="form-control" v-model="userData.password">
                    <div class="d-flex flex-column flex-xl-row justify-content-between">
                        <input type="submit" value="Login" class="btn btn-secondary my-md-3 my-2 rounded-pill">
                        <Router-link class="btn btn-secondary my-md-3 my-1 rounded-pill" to="/register">Go to Register</Router-link>
                    </div>
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
    @media screen and (max-width: 768px) {
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