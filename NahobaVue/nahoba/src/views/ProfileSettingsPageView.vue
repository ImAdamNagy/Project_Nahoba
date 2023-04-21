<script setup>
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import { http } from '../utils/http.mjs'
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { reactive } from 'vue';
import * as yup from 'yup';
import { useRouter } from 'vue-router';

const router = useRouter();

const schema = yup.object(
    {
        email: yup.string().email().required(),
        firstname: yup.string().min(1).required(),
        lastname: yup.string().min(1).required(),
        tel: yup.number().required().test("lenght", "not valid", value => value.toString().length >= 6 && value.toString().length <= 18),
        username: yup.string().min(4).max(15).required(),
    })

const own = reactive({
    data: {},
    isLoading: true
});

async function getUserDetails() {
    const response = await http.get('/user/' + localStorage.getItem("userid"));
    own.data = response.data.data;
    console.log(own.data);
    own.isLoading = false;
}
getUserDetails();

async function update(updatedUser) {
    updatedUser.id = localStorage.getItem("userid");
    const response = await http.patch('/user/' + localStorage.getItem("userid"), updatedUser, {
        headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
    });
    alert("Changes saved");
    router.reload({ name: "ProfileSettingsPage" });
}
</script>

<template>
    <NavBar />
    <Header>
        <h1>Settings</h1>
    </Header>
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <div class="bg-white m-3 p-5 py-3 rounded rounded-3">
                    <h3>User information</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 50%;">Username:</td>
                                <td>{{ own.data.username }}</td>
                            </tr>
                            <tr>
                                <td>Name:</td>
                                <td>{{ own.data.firstname }} {{ own.data.lastname }}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{ own.data.email }}</td>
                            </tr>
                            <tr>
                                <td>Tel:</td>
                                <td>{{ own.data.tel }}</td>
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
                                    <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">halo</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <VForm class="form-group" v-if="!own.isLoading" @submit="update"
                                    :validation-schema="schema">
                                    <div class="modal-body">
                                        <Field type="email" name="email" id="email" :value="`${own.data.email}`"
                                            class="form-control my-1" />
                                        <ErrorMessage name="email" as="div" class="alert alert-danger m-1" />
                                        <div id="name" class="d-flex flex-sm-row flex-column my-1">
                                            <Field type="text" name="firstname" id="firstname"
                                                :value="`${own.data.firstname}`" class="form-control me-2" />
                                            <ErrorMessage name="firstname" as="div" class="alert alert-danger m-1" />
                                            <Field type="text" name="lastname" id="lastname" :value="`${own.data.lastname}`"
                                                class="form-control" />
                                            <ErrorMessage name="lastname" as="div" class="alert alert-danger m-1" />
                                        </div>

                                        <Field type="tel" name="tel" id="tel" :value="`${own.data.tel}`"
                                            class="form-control my-1" />
                                        <ErrorMessage name="tel" as="div" class="alert alert-danger m-1" />

                                        <Field type="text" name="username" id="username" :value="`${own.data.username}`"
                                            class="form-control my-1" />
                                        <ErrorMessage name="username" as="div" class="alert alert-danger m-1" />

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </VForm>
                            </div>
                        </div>
                    </div>
                </div>
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