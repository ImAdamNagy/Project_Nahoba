<script setup>
import {ref} from 'vue';
import {useAuth} from '@/store/AuthStore.js'
import {useRouter} from "vue-router";
import {Form as VForm, Field, ErrorMessage} from "vee-validate";
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
const router = useRouter();

const error = ref(null);

async function login(userData){
    try {
        await useAuth().login(userData);
        await useAuth().getCurrentUserDetails();
        useAuth().userid = useAuth().currentUserDetails.userid;
        await useAuth().currentUserHasMechanic();
        if (useAuth().currentUserDetails.role.role_name == "admin") {
                useAuth().isAdmin = true;
        }
        let name;
        switch(useAuth().currentUserDetails.role.role_name){
            case "admin": name = 'AdminMain';
            break;
            case "seller": name = 'MainPage';
            break;
            case "mechanic":
            if (useAuth().currentUserHasMec == '') {
                    name = 'MechanicFormView'
                 }
                 else
                 {
                    name = 'MainPage';
                 }    
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
        <div class="col-xl-4 ms-md-auto " id="left">
            <h1>{{t('Auth.WelcomeBack')}}</h1>
        </div> 
        <div class="col-xl-3 me-md-auto mx-xs-auto text-center" id="right">
            <div id="formdiv">
                <h1 id="title">{{t('NavBar.NavLogin')}}</h1>
                <VForm @submit="login">
                    <label for="username" class="form-label text-center">{{t('Auth.Username')}}</label>
                    <Field type="text" name="username" id="username" :placeholder="t('Auth.Username')" class="form-control" rules="required|min:4"/>
                    <ErrorMessage name="username" as="div" class="alert alert-danger m-1" />
                    <label for="password" class="form-label text-center">{{t('Auth.Password')}}</label>
                    <Field type="password" name="password" id="password" :placeholder="t('Auth.Password')" class="form-control" rules="required"/>
                    <ErrorMessage name="password" as="div" class="alert alert-danger m-1" />
                    <div class="d-flex flex-column flex-xl-row justify-content-center">
                        <button class="btn btn-secondary w-100 my-md-3 my-2 rounded-pill" type="submit">{{t('NavBar.NavLogin')}}</button>
                    </div>
                    <div class="d-flex flex-column flex-sm-row justify-content-between">
                        <Router-link class="btn w-40 btn-secondary my-md-3 my-2 rounded-pill" id="back" to="/">{{t('Auth.Back')}}</Router-link>
                        <Router-link class="btn w-40 btn-secondary my-md-3 my-2 rounded-pill" id="register" to="/register">{{t('Auth.GoToRegister')}}</Router-link>
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
        background-image: url(/img/bg.jpg);
        background-color: #444;
        background-blend-mode: multiply;
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