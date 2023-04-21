<script setup>
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import { http } from '../utils/http.mjs'
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { reactive } from 'vue';

const own = reactive({
    data: {}
});

async function getUserDetails() {
    const response = await http.get('/user/' + localStorage.getItem("userid"), {
        headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
    });
    own.data = response.data.data;
    console.log(own.data);
}
getUserDetails();
console.log(own.data.email);
</script>

<template>
    <NavBar />
    <Header>
        <h1>Settings</h1>
    </Header>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <VForm class="form-group" >
                    <Field type="email" name="email" id="email" :value="`${own.data.email}`" class="form-control" />
                    <ErrorMessage name="email" as="div" class="alert alert-danger m-1" />
                    <div id="name" class="d-flex flex-sm-row flex-column">
                        <Field type="text" name="firstname" id="firstname" placeholder="First Name"
                            class="form-control me-2" />
                        <ErrorMessage name="firstname" as="div" class="alert alert-danger m-1" />
                        <Field type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control" />
                        <ErrorMessage name="lastname" as="div" class="alert alert-danger m-1" />
                    </div>

                    <Field type="tel" name="tel" id="tel" placeholder="tel" class="form-control" />
                    <ErrorMessage name="tel" as="div" class="alert alert-danger m-1" />

                    <Field type="text" name="username" id="username" placeholder="username" class="form-control" />
                    <ErrorMessage name="username" as="div" class="alert alert-danger m-1" />

                    <Field type="password" name="password" id="password" placeholder="password" class="form-control" />
                    <ErrorMessage name="password" as="div" class="alert alert-danger m-1" />
                </VForm>
            </div>
        </div>
    </div>
</template>

<style scoped>
h1 {
    color: white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
</style>