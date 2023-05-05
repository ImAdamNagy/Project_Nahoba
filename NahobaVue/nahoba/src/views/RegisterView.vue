<script setup>
import { http } from '../utils/http.mjs'
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { reactive } from 'vue';
import * as yup from 'yup';
import { useRouter } from 'vue-router';
import { onMounted } from 'vue';
import { useRole } from '../store/RoleStore.js';

const router = useRouter();
const roles = reactive({
    data: {}
});

const schema = yup.object(
    {
        email: yup.string("Please enter a valid email!").email("Please enter a valid email!").required("Email is required!"),
        firstname: yup.string("Firstname should not contain numbers!").min(1).required("Firstname is required!"),
        lastname: yup.string("Lastname should not contain numbers!").min(1).required("Lastname is required!"),
        tel: yup.number("Phone number should not contain letters!").required("Phone number is required!").test("lenght", "not valid", value => value.toString().length >= 6 && value.toString().length <= 18),
        username: yup.string().min(4).max(15).required("Username is required!"),
        password: yup.string().min(5).matches(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{5,}$/, "Password must contain at least 5 characters, one uppercase, one lowercase and one number!").required("Password is required!"),
        password_confirmation: yup.string().oneOf([yup.ref("password")]).required("Password confirmation is required!"),
        role_id: yup.number().required("Select your role!")
    }
)
async function registerUser(newUser) {
     try {
        const response = await http.post('register', newUser);
        router.push({ name: 'LoginPage' });
    } catch (e) {
        if (e.response.status == 422) {
           error.value = `<ul>${Object.entries(e.response.data.errors).map(([key,value])=>`<li>${value}</li>`).reduce((a,b)=>a+b)}</ul>`
        }
    }
}
onMounted(useRole().getRoles)

</script>

<template>
    <div class="row py-5 mx-auto">
        <div class="col-lg-5 ms-sm-auto bg-warning" id="piccol">
            <h1>Register now!</h1>
            <p>Start your journey at nahoba parts</p>
        </div>
        <div class="col-lg-4 me-sm-auto mx-xs-auto" id="formcol">
            <div id="formdiv">
                <VForm @submit="registerUser" class="form-group" :validation-schema="schema">
                    <Field type="email" name="email" id="email" placeholder="email" class="form-control" />
                    <ErrorMessage name="email" as="div" class="alert alert-danger m-1" />
                    <div id="name" class="d-flex flex-sm-row flex-column">
                        <Field type="text" name="firstname" id="firstname" placeholder="firstname"
                            class="form-control me-2" />
                        <ErrorMessage name="firstname" as="div" class="alert alert-danger m-1" />
                        <Field type="text" name="lastname" id="lastname" placeholder="lastname" class="form-control" />
                        <ErrorMessage name="lastname" as="div" class="alert alert-danger m-1" />
                    </div>
                    <Field type="tel" name="tel" id="tel" placeholder="tel" class="form-control" />
                    <ErrorMessage name="tel" as="div" class="alert alert-danger m-1" />
                    <Field type="text" name="username" id="username" placeholder="username" class="form-control" />
                    <ErrorMessage name="username" as="div" class="alert alert-danger m-1" />
                    <Field type="password" name="password" id="password" placeholder="password" class="form-control" />
                    <ErrorMessage name="password" as="div" class="alert alert-danger m-1" />
                    <Field type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="confirm password" class="form-control" />
                    <ErrorMessage name="password_confirmation" as="alert" class="alert alert-danger m-1" />

                    <Field name="role_id" id="role" class="mt-2 form-control" as="select">
                        <option value="" disabled selected hidden>Select your role</option>
                        <option v-for="item in useRole().roles" :value="item.id" :key="item.id">
                            {{ item.role_name }}
                        </option>
                    </Field>
                    <ErrorMessage name="role_id" as="alert" class="alert alert-danger m-1" />
                    <Alert v-html="error" v-if="error" alert-type="danger" class="mt-2"></Alert>
                    <div class="d-flex flex-column flex-xl-row justify-content-center">
                        <button class="btn btn-secondary w-100 my-md-3 my-2 rounded-pill" type="submit">Register</button>
                    </div>
                    <div class="d-flex flex-column flex-sm-row justify-content-between">
                        <Router-link class="btn w-40 btn-secondary my-md-3 my-2 rounded-pill" id="back" to="/">Back</Router-link>
                        <Router-link class="btn w-40 btn-secondary my-md-3 my-2 rounded-pill" id="login" to="/login">Go to Login</Router-link>
                    </div>
                </VForm>
            </div>
        </div>
    </div>
</template>
<style scoped>
input {
    margin-top: 7px;
}

#formdiv {
    padding: 10px;
}

#formcol {
    box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
    background-color: #D9D9D9;
    border-end-end-radius: 30px;
}

#piccol {
    box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
    background-image: url(/img/bg.jpg);
    background-position: center;
    background-size: cover;
    padding-top: 15%;
    border-start-start-radius: 30px;
}

h1,
p {
    color: white;
    text-align: center;
}

.row {
    width: 80%;
}</style>

