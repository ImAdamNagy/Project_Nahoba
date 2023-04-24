<script setup>
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import { http } from '../utils/http.mjs'
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { onMounted } from 'vue';
import * as yup from 'yup';
import {useUser} from '@/store/UserStore.js'

const schema = yup.object(
    {
        email: yup.string().email().required(),
        firstname: yup.string().min(1).required(),
        lastname: yup.string().min(1).required(),
        tel: yup.number().required().test("length", "not valid", value => value.toString().length >= 6 && value.toString().length <= 18),
        username: yup.string().min(4).max(15).required(),
    });

onMounted(useUser().getUserDetails)
</script>

<template>
    <NavBar />
    <Header><h1 class="headertitle">Settings</h1></Header>
    <div class="container">
        <div class="row">
            <div class="col" v-if="!useUser().UserDataisLoading">
                <div class="bg-white mt-3 p-5 py-3 rounded rounded-3">
                    <h3>User information</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 50%;">Username:</td>
                                <td>{{ useUser().data.username }}</td>
                            </tr>
                            <tr>
                                <td>Name:</td>
                                <td>{{ useUser().data.firstname }} {{ useUser().data.lastname }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ useUser().data.email }}</td>
                            </tr>
                            <tr>
                                <td>Tel:</td>
                                <td>{{ useUser().data.tel }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Change data
                    </button>

                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">Edit your profile</h1>
                                    <button type="button" class="btn-close"  data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <VForm class="form-group" @submit="useUser().update" 
                                    :validation-schema="schema">
                                    <div class="modal-body">
                                        <Field type="email" name="email" id="email" :value="`${useUser().data.email}`"
                                        placeholder="Email:" class="form-control my-1" />
                                        <ErrorMessage name="email" as="div" class="alert alert-danger m-1" />
                                        <div id="name" class="d-flex flex-sm-row flex-column my-1">
                                            <Field type="text" name="firstname" id="firstname"
                                                :value="`${useUser().data.firstname}`" class="form-control me-2" placeholder="Fistname:"/>
                                            <ErrorMessage name="firstname" as="div" class="alert alert-danger m-1" />
                                            <Field type="text" name="lastname" id="lastname" :value="`${useUser().data.lastname}`"
                                                class="form-control" placeholder="Lastname:"/>
                                            <ErrorMessage name="lastname" as="div" class="alert alert-danger m-1" />
                                        </div>

                                        <Field type="tel" name="tel" id="tel" :value="`${useUser().data.tel}`"
                                            class="form-control my-1" placeholder="Tel:"/>
                                        <ErrorMessage name="tel" as="div" class="alert alert-danger m-1" />

                                        <Field type="text" name="username" id="username" :value="`${useUser().data.username}`"
                                            class="form-control my-1" placeholder="Username:"/>
                                        <ErrorMessage name="username" as="div" class="alert alert-danger m-1" />
                                    </div>
                                    <div class="modal-footer">
                                        <button data-bs-dismiss="modal" type="submit" class="btn btn-primary" >Save changes</button>
                                    </div>
                                </VForm>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3" v-else>
                <h3 class="loadingmsg">Just a moment, your settings is loading</h3>
            </div>
        </div>
    </div>
</template>