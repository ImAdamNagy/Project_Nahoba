<script setup>
import { http } from '../utils/http.mjs'
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import * as yup from 'yup';
import { useRouter } from 'vue-router';
import { reactive } from 'vue';

const router = useRouter();
const file = reactive({
    image: null
});

const schema = yup.object(
    {
        introduction: yup.string().required(),
        country: yup.string().min(3).max(100).required(),
        postal_code: yup.number().required(),
        city: yup.string().min(3).max(100).required(),
        address: yup.string().min(3).max(150).required(),
        profile_pic: yup.string().max(1536).required(),
        profession: yup.string().min(3).max(30).required(),
    });

async function addMechanic(newMec){
    const formdata = new FormData();
    for(const item in newMec)
    {
        formdata.append(item, newMec[item]);
    }
    formdata.append('img', newMec.profile_pic);
    const response = await http.post('/mechanics', formdata,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
    alert("Upload was successfull");
    router.push({name: "MainPage"}); 
}

async function onChange(item){
            file.image = item.target.files[0];
}

</script>
<template>
    <div class="row mx-auto mt-5">
        <div class="col-xl-5 text-center bg-warning" id="first">
            <h1>Register as a mechanic to continue</h1>
        </div>
    </div>
    <div class="row mx-auto">
        <div class="col-xl-5 text-center" id="second">
            <div id="formdiv">
                <VForm class="form-group" @submit="addMechanic" :validation-schema="schema">

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

                    <Field type="text" name="profession" id="profession" placeholder="Profession"
                        class="form-control my-1" />
                    <ErrorMessage name="profession" as="div" class="alert alert-danger m-1" />

                    <label for="profile_pic" class="form-label">Upload image</label>
                    <br>
                    <Field type="file" name="profile_pic" id="profile_pic" @change="onChange($event)" />
                    <ErrorMessage name="profile_pic" as="div" class="alert alert-danger m-1" />
                    <input class="btn-warning btn form-control mt-3" type="submit" value="Register" />
                </VForm>
            </div>
        </div>
    </div>
</template>
<style scoped>
    .row{
        position: relative;
        top: 5%;
    }
    @media screen and (max-width: 1000px) {
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
    #second{
        box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
        background-color: #D9D9D9;
        border-end-end-radius: 30px;
        margin: auto;
    }
    #first{
        box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
        background-image: url(/img/bg.jpg);
        background-position: center;
        background-size: cover;
        padding-top: 15%;
        border-start-start-radius: 30px;
        margin: auto;

    }
    h1,p{
        color: white;
        text-align: center;
    }
    #title{
        color:black;
    }
</style>