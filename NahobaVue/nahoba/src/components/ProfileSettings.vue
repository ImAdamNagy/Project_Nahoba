<script setup>
import { onMounted } from 'vue';
import * as yup from 'yup';
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { useUser } from '@/store/UserStore.js'

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
    <div class="row settingrow">
        <div class="col" v-if="useUser().userDataIsLoading == false">
            <div class="settinggrid bg-white mt-3 px-3 py-4 rounded rounded-3">
                <h2 class="settingtitle">User information</h2>
                <div class="settingusername">
                    <p><b>Username: </b>{{ useUser().data.username }}</p>
                </div>
                <div class="settingname">
                    <p><b>Name: </b>{{ useUser().data.firstname }} {{ useUser().data.lastname }}</p>
                </div>
                <div class="settingemail">
                    <p><b>Email: </b>{{ useUser().data.email }}</p>
                </div>
                <div class="settingtel">
                    <p><b>Phone number: </b>{{ useUser().data.tel }}</p>
                </div>
                <div class="settingchange">
                    <button type="button" class="stgbutton btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Change data
                    </button>
                </div>
                <div class="settingdelete">
                    <button class="stgbutton btn btn-danger">Account delete </button>
                </div>


                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">Edit your profile</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <VForm class="form-group" @submit="useUser().update" :validation-schema="schema">
                                <div class="modal-body">
                                    <Field type="email" name="email" id="email" :value="`${useUser().data.email}`"
                                        placeholder="Email:" class="form-control my-1" />
                                    <ErrorMessage name="email" as="div" class="alert alert-danger m-1" />
                                    <div id="name" class="d-flex flex-sm-row flex-column my-1">
                                        <Field type="text" name="firstname" id="firstname"
                                            :value="`${useUser().data.firstname}`" class="form-control me-2"
                                            placeholder="Fistname:" />
                                        <ErrorMessage name="firstname" as="div" class="alert alert-danger m-1" />
                                        <Field type="text" name="lastname" id="lastname"
                                            :value="`${useUser().data.lastname}`" class="form-control"
                                            placeholder="Lastname:" />
                                        <ErrorMessage name="lastname" as="div" class="alert alert-danger m-1" />
                                    </div>

                                    <Field type="tel" name="tel" id="tel" :value="`${useUser().data.tel}`"
                                        class="form-control my-1" placeholder="Tel:" />
                                    <ErrorMessage name="tel" as="div" class="alert alert-danger m-1" />

                                    <Field type="text" name="username" id="username" :value="`${useUser().data.username}`"
                                        class="form-control my-1" placeholder="Username:" />
                                    <ErrorMessage name="username" as="div" class="alert alert-danger m-1" />
                                </div>
                                <div class="modal-footer">
                                    <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </VForm>
                        </div>
                    </div>
                </div>
            </div>
        </div><div class="loader" v-else>
            <svg class="car" width="102" height="40" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(2 1)" stroke="white" fill="none" fill-rule="evenodd" stroke-linecap="round"
                stroke-linejoin="round">
                <path class="car__body"
                    d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01"
                    stroke-width="3" />
                <ellipse class="car__wheel--left" stroke-width="3.2" fill="#FFF" cx="83.493" cy="30.25" rx="6.922"
                    ry="6.808" />
                <ellipse class="car__wheel--right" stroke-width="3.2" fill="#FFF" cx="46.511" cy="30.25" rx="6.922"
                    ry="6.808" />
                <path class="car__line car__line--top" d="M22.5 16.5H2.475" stroke-width="3" />
                <path class="car__line car__line--middle" d="M20.5 23.5H.4755" stroke-width="3" />
                <path class="car__line car__line--bottom" d="M25.5 9.5h-19" stroke-width="3" />
            </g>
        </svg>
        </div>
    </div>
</template>

<style scoped>
.settingtitle {
    position: relative;
    font-size: 30px;
    z-index: 1;
    overflow: hidden;
    text-align: center;
    color: black;
}

.settingtitle:before,
.settingtitle:after {
    position: absolute;
    top: 52%;
    overflow: hidden;
    width: 48%;
    height: 2px;
    content: '\a0';
    background-color: red;
    margin-left: 2%;
}

.settingtitle:before {
    margin-left: -50%;
    text-align: right;
}
</style>