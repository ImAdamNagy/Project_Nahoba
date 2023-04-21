<script setup>
import { http } from '../utils/http.mjs'
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import * as yup from 'yup';
import { useRouter } from 'vue-router';

const router = useRouter();

const schema = yup.object(
    {
        introduction: yup.text().required(),
        country: yup.string().min(3).max(100).required(),
        postal_code: yup.number().required(),
        city: yup.string().min(3).max(100).required(),
        address: yup.string().min(3).max(150).required(),
        profile_pic: yup.string().min(3).max(30).required(),
        profession: yup.string().min(3).max(30).required(),
    });
async function addMechanic(newMec) {
    console.log(newMec);
    const response = await http.post('register', newMec);
}
addMechanic();

</script>
<template>
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">Mechanic informations</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <VForm class="form-group" @submit="addMechanic" :validation-schema="schema">
            <div class="modal-body">
                <Field type="textarea" name="introduction" id="introduction" placeholder="Introduction"
                    class="form-control my-1" />
                <ErrorMessage name="introduction" as="div" class="alert alert-danger m-1" />

                <Field type="text" name="country" id="country" placeholder="Country" class="form-control my-1" />
                <ErrorMessage name="country" as="div" class="alert alert-danger m-1" />

                <div class="d-flex flex-sm-row flex-column my-1">
                    <Field type="number" name="postal_code" id="postal_code" placeholder="Postal code"
                        class="form-control me-2" />
                    <ErrorMessage name="postal_code" as="div" class="alert alert-danger m-1" />

                    <Field type="text" name="city" id="city" placeholder="City" class="form-control" />
                    <ErrorMessage name="city" as="div" class="alert alert-danger m-1" />
                </div>
                <Field type="text" name="address" id="address" placeholder="Address" class="form-control my-1" />
                <ErrorMessage name="address" as="div" class="alert alert-danger m-1" />

                <Field type="text" name="profile_pic" id="profile_pic" placeholder="Profile pic"
                    class="form-control my-1" />
                <ErrorMessage name="profile_pic" as="div" class="alert alert-danger m-1" />

                <Field type="text" name="profession" id="profession" placeholder="Profession" class="form-control my-1" />
                <ErrorMessage name="profession" as="div" class="alert alert-danger m-1" />
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </VForm>
</div></template>