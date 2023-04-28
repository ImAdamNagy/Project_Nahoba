<script setup>
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { onMounted } from 'vue';
import * as yup from 'yup';
import { useUser } from '@/store/UserStore.js';
import { useMechanic } from '@/store/MechanicStore.js';

const schema = yup.object(
    {
        introduction: yup.string().required(),
        country: yup.string().min(3).max(100).required(),
        postal_code: yup.number().required(),
        city: yup.string().min(3).max(100).required(),
        address: yup.string().min(3).max(150).required(),
        profession: yup.string().min(3).max(30).required(),
    });

onMounted(useUser().getUserDetails)
onMounted(useMechanic().getCurrentMechanic)

</script>
<template>
    <div class="row settingrow" v-if="useUser().data.role?.id == 3 && useMechanic().currentMechanicIsLoading == false">
        <div class="col">
            <div class="settinggrid bg-white mt-3 px-3 py-4 rounded rounded-3">
                <h2 class="settingtitle">Mechanic information</h2>
                <div>
                    <p><b>Introduction: </b>{{ useMechanic().currentMechanic.introduction }}</p>
                </div>
                <div>
                    <p><b>Country: </b>{{ useMechanic().currentMechanic.country }}</p>
                </div>
                <div>
                    <p><b>Postal code: </b>{{ useMechanic().currentMechanic.postal_code }}</p>
                </div>
                <div>
                    <p><b>City: </b>{{ useMechanic().currentMechanic.city }}</p>
                </div>
                <div>
                    <p><b>Address: </b>{{ useMechanic().currentMechanic.address }}</p>
                </div>
                <div>
                    <p><b>Profession: </b>{{ useMechanic().currentMechanic.profession }}</p>
                </div>
                <div class="settingchange">
                    <button type="button" class="stgbutton btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#mechanicModal">
                        Change data
                    </button>
                </div>
                <div class="modal fade" id="mechanicModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">Edit your profile</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <VForm class="form-group" @submit="useMechanic().update" :validation-schema="schema">
                                <div class="modal-body">
                                    <Field type="textarea" name="introduction" id="introduction"
                                        :value="`${useMechanic().currentMechanic.introduction}`"
                                        class="form-control my-1" />
                                    <ErrorMessage name="introduction" as="div" class="alert alert-danger m-1" />

                                    <Field type="text" name="country" id="country"
                                        :value="`${useMechanic().currentMechanic.country}`" class="form-control my-1" />
                                    <ErrorMessage name="country" as="div" class="alert alert-danger m-1" />

                                    <div class="d-flex flex-sm-row flex-column my-1">
                                        <Field type="number" name="postal_code" id="postal_code"
                                            :value="`${useMechanic().currentMechanic.postal_code}`"
                                            class="form-control me-2" />
                                        <ErrorMessage name="postal_code" as="div" class="alert alert-danger m-1" />

                                        <Field type="text" name="city" id="city"
                                            :value="`${useMechanic().currentMechanic.city}`" class="form-control" />
                                        <ErrorMessage name="city" as="div" class="alert alert-danger m-1" />
                                    </div>
                                    <Field type="text" name="address" id="address"
                                        :value="`${useMechanic().currentMechanic.address}`" class="form-control my-1" />
                                    <ErrorMessage name="address" as="div" class="alert alert-danger m-1" />

                                    <Field type="text" name="profession" id="profession"
                                        :value="`${useMechanic().currentMechanic.profession}`" class="form-control my-1" />
                                    <ErrorMessage name="profession" as="div" class="alert alert-danger m-1" />

                                    <!--<label for="profile_pic" class="form-label">Upload image</label>
                                    <br>
                                    <Field type="file" name="profile_pic" id="profile_pic" @change="onChange($event)" />

                                    <ErrorMessage name="profile_pic" as="div" class="alert alert-danger m-1" /> -->
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
    <div class="loader" v-else-if="useUser().data.role?.id == 3">
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