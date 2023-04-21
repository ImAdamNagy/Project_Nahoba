<script setup>
import {ref} from 'vue';
import {useAuth} from '@/store/AuthStore.js'
import {useRouter} from "vue-router";
import {Form as VForm, Field, ErrorMessage} from "vee-validate";


const router = useRouter();

const error = ref(null);

async function login(userData){
    try {
        await useAuth().login(userData);
        let name;
        switch(await useAuth().getRole(localStorage.userid)){
            case "admin": name = 'AdminMainPage';
            break;
            case "seller": name = 'MainPage';
            break;
            case "mechanic": name = 'MainPage';
            break;
        }
        router.push({name:name});
    } catch (e) {
        if(e.response.status == 401)
        {
            error.value = "Wrong username or password!"
        }
    }
}
</script>
<template>
    <div class="container-fluid">
        <div class="row py-5 mx-auto">
        <div class="col-xl-3 ms-md-auto bg-warning" id="left">
            <h1>Welcome Back!</h1>
        </div> 
        <div class="col-xl-2 me-md-auto mx-xs-auto text-center" id="right">
            <div id="formdiv">
                <h1 id="title">Login</h1>
                <VForm @submit="login">
                    <label for="username" class="form-label text-center">Username:</label>
                    <Field type="text" name="username" id="username" placeholder="username" class="form-control" rules="required|min:4"/>
                    <ErrorMessage name="username" as="div" class="alert alert-danger m-1" />
                    <label for="password" class="form-label text-center">Password:</label>
                    <Field type="password" name="password" id="password" placeholder="password" class="form-control" rules="required"/>
                    <ErrorMessage name="password" as="div" class="alert alert-danger m-1" />
                    <div class="d-flex flex-column flex-xl-row justify-content-between">
                        <button type="submit" class="btn btn-secondary my-md-3 my-2 rounded-pill">Login</button>
                        <Router-link class="btn btn-secondary my-md-3 my-1 rounded-pill" to="/register">Go to Register</Router-link>
                    </div>
                    <Alert v-if="error" alert-type="danger" >
                        {{error}}
                    </Alert>
                </VForm>
            </div>
        </div>  
    </div>
    </div>
</template>
<style scoped>
 .row{
        position: relative;
        top: 35%;
    }
    @media screen and (max-width: 1000px) {
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