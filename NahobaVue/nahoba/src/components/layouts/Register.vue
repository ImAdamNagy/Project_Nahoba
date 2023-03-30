<script setup>
import {Form as VForm, Field, ErrorMessage} from "vee-validate";
import * as yup from 'yup';

const schema = yup.object(
    {
        email: yup.string().email().required(),
        firstname: yup.string().min(1).required(),
        lastname: yup.string().min(1).required(),
        tel: yup.number().min(11).max(11).required(),
        username: yup.string().min(4).max(15).required(),
        password: yup.string().min(5).matches().required(),
        password_confirmation: yup.string().oneOf([yup.ref("password")]).required()
    }
)

</script>

<template>
    <div class="row py-5 mx-auto">
        <div class="col-sm-5 ms-sm-auto bg-warning" id="piccol">
            <h1>Register now!</h1>
            <p>Start your journey at nahoba parts</p>
        </div> 
        <div class="col-sm-4 me-sm-auto mx-xs-auto" id="formcol">
            <div id="formdiv">
                <VForm @submit="onsubmit" class="form-group" :validation-schema="schema">
                    <Field type="email" name="email" id="email" placeholder="email" class="form-control"/>
                    <ErrorMessage name="email" as="div" class="alert alert-danger m-1" />
                    <div id="name" class="d-flex flex-sm-row flex-column">
                        <Field type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control me-2" />
                        <ErrorMessage name="firstname" as="div" class="alert alert-danger m-1" />
                        <Field type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control"  />
                        <ErrorMessage name="lastname" as="div" class="alert alert-danger m-1" />
                    </div>
                    <Field type="tel" name="tel" id="tel" placeholder="tel" class="form-control"  />
                    <ErrorMessage name="tel" as="div" class="alert alert-danger m-1" />
                    <Field type="text" name="username" id="username" placeholder="username" class="form-control" />
                    <ErrorMessage name="username" as="div" class="alert alert-danger m-1" />
                    <Field type="password" name="password" id="password" placeholder="password" class="form-control" />
                    <ErrorMessage name="password" as="div" class="alert alert-danger m-1" />
                    <Field type="password" name="password_confirmation" id="password_confirmation" placeholder="confirm password" class="form-control"/>
                    <ErrorMessage name="password_confirmation" as="alert" class="alert alert-danger m-1" />
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <button class="btn btn-secondary my-md-3 my-2 rounded-pill" type="submit">Register</button>
                        <Router-link class="btn btn-secondary my-md-3 my-1 rounded-pill" to="/login">Go to Login</Router-link>
                    </div>
                </VForm>
            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-12">
            
        </div>
    </div>
</template>

<style scoped>
    .row{
        position: relative;
        top: 35%;
    }
    @media screen and (max-width: 575px) {
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
    #formcol{
        box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
        background-color: #D9D9D9;
        border-end-end-radius: 30px;
    }
    #piccol{
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

</style>