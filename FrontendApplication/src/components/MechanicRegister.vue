<script setup>
import { http } from '../utils/http.mjs'
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import * as yup from 'yup';
import { useRouter } from 'vue-router';
import { reactive } from 'vue';
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
const router = useRouter();
const file = reactive({
    image: null
});

const schema = yup.object(
    {
        introduction: yup.string("The introduction should not be a number only!").required("Introduction is required!"),
        country: yup.string("The country should not be a number only!").min(3).max(100).required("Country is required!"),
        postal_code: yup.number("The postal code should be a number!").required("Postal code is required!"),
        city: yup.string("The city should not be a number only!").min(3).max(100).required("City is required!"),
        address: yup.string("The address should not be a number only!").min(3).max(150).required("Address is required!"),
        profile_pic: yup.string().max(1536).required("Profile picture is required!"),
        profession: yup.string("Your profession should not contain numbers only!").min(3).max(30).required("Profession is required!"),
    });

async function addMechanic(newMec) {
    const formdata = new FormData();
    for (const item in newMec) {
        formdata.append(item, newMec[item]);
    }
    formdata.append('img', newMec.profile_pic);
    const response = await http.post('/mechanics', formdata, {
        headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
    });
    alert(t("Alerts.UploadSuccess"));
    router.push({ name: "MainPage" });
}

async function onChange(item) {
    file.image = item.target.files[0];
}

</script>
<template>
    <div class="row mx-auto mt-5">
        <div class="col-12 text-center" id="first">
            <h1 class="mectitle">{{ t("MechInfo.MechSheet") }}</h1>
        </div>
    </div>
    <div class="row mx-auto">
        <div class="col-12 text-center" id="second">
            <div id="formdiv">
                <VForm class="form-group" @submit="addMechanic" :validation-schema="schema">

                    <Field type="text" as="" name="introduction" id="introduction" placeholder="Introduction"
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

                    <label for="profile_pic" class="form-label">{{ t("MechSheet.Image") }}</label>
                    <br>
                    <Field type="file" name="profile_pic" id="profile_pic" @change="onChange($event)" />
                    <ErrorMessage name="profile_pic" as="div" class="alert alert-danger m-1" />
                    <input class="btn-warning btn form-control mt-3" type="submit" value="Submit" />
                </VForm>
            </div>
        </div>
    </div>
</template>
<style scoped>


input {
    margin-top: 7px;
}
.mectitle{
    font-size: 200%;
    padding-bottom: 20px;
    color: white;
}
#formdiv {
    padding: 10px;
}

#second {
    box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
    background-color: #D9D9D9;
    border-end-end-radius: 30px;
    margin: auto;
}

#first {
    box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
    background-image: url(/img/bg.jpg);
    background-color: #444;
    background-blend-mode: multiply;
    background-position: center;
    background-size: cover;
    padding-top: 15%;
    border-start-start-radius: 30px;
    margin: auto;

}
</style>