<script setup>
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

</script>
<template>
    <div class="row settingrow">
        <div class="col">
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