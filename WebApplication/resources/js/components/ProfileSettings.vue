<script setup>
import * as yup from 'yup';
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { useUser } from '@/store/UserStore.js'
import { useProduct } from '@/store/ProductStore.js'
import {useMsg} from '@/store/MessageStore.js';
import {useChat} from '@/store/ChatStore.js'
import { useMechanic } from '../store/MechanicStore.js';
import {useAuth} from '@/store/AuthStore.js'
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
async function deleteUserData(userid) {
        if (confirm(t("Confirm.DeleteProfileConfirm")) == true) {
            useUser().usersIsLoading = true;
            await useAuth().logout();
            await useProduct().deleteUsersProducts(userid);
            await useMsg().deleteUserMessages(userid);
            await useChat().deleteChats(userid);
            await useMechanic().deleteMechanic(userid);
            await useUser().deleteUser(userid);
            useUser().usersIsLoading = false;
        }
}

const schema = yup.object(
    {
        email: yup.string("Please enter a valid email!").email("Please enter a valid email!").required("Email is required!"),
        firstname: yup.string("Firstname should not contain numbers!").min(1).required("Firstname is required!"),
        lastname: yup.string("Lastname should not contain numbers!").min(1).required("Lastname is required!"),
        tel: yup.number("Phone number should not contain letters!").required("Phone number is required!").test("length", "not valid", value => value.toString().length >= 6 && value.toString().length <= 18),
        username: yup.string().min(4).max(15).required("Username is required!"),
    });

</script>
<template>
    <div class="row settingrow">
        <div class="col">
            <div class="settinggrid bg-white mt-3 px-3 py-4 rounded rounded-3">
                <h2 class="settingtitle">{{t('Settings.UserInfo')}}</h2>
                <div class="settingusername">
                    <p><b>{{t('Auth.Username')}} </b>{{ useUser().data.username }}</p>
                </div>
                <div class="settingname">
                    <p><b>{{t('UserData.Name')}} </b>{{ useUser().data.firstname }} {{ useUser().data.lastname }}</p>
                </div>
                <div class="settingemail">
                    <p><b>{{t('UserData.Email')}} </b>{{ useUser().data.email }}</p>
                </div>
                <div class="settingtel">
                    <p><b>{{t('UserData.Phone')}} </b>{{ useUser().data.tel }}</p>
                </div>
                <div class="settingchange">
                    <button type="button" id="changedata" class="stgbutton btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        {{t('Settings.ChangeUserData')}}
                    </button>
                </div>
                <div class="settingdelete">
                    <button class="stgbutton btn btn-danger" @click="deleteUserData(useAuth().userid)">{{t('Settings.AccountDelete')}} </button>
                </div>


                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-black" id="staticBackdropLabel">{{t('Settings.ChangeDataModalTitle')}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <VForm class="form-group" @submit="useUser().update" :validation-schema="schema">
                                <div class="modal-body">
                                    <Field type="email" name="email" id="email" :value="`${useUser().data.email}`"
                                        :placeholder="t('UserData.Email')" class="form-control my-1" />
                                    <ErrorMessage name="email" as="div" class="alert alert-danger m-1" />
                                    <div id="name" class="d-flex flex-sm-row flex-column my-1">
                                        <Field type="text" name="firstname" id="firstname"
                                            :value="`${useUser().data.firstname}`" class="form-control me-2"
                                            :placeholder="t('Auth.Firstname')" />
                                        <ErrorMessage name="firstname" as="div" class="alert alert-danger m-1" />
                                        <Field type="text" name="lastname" id="lastname"
                                            :value="`${useUser().data.lastname}`" class="form-control"
                                            :placeholder="t('Auth.Lastname')" />
                                        <ErrorMessage name="lastname" as="div" class="alert alert-danger m-1" />
                                    </div>

                                    <Field type="tel" name="tel" id="tel" :value="`${useUser().data.tel}`"
                                        class="form-control my-1" :placeholder="t('UserData.Phone')" />
                                    <ErrorMessage name="tel" as="div" class="alert alert-danger m-1" />

                                    <Field type="text" name="username" id="username" :value="`${useUser().data.username}`"
                                        class="form-control my-1" :placeholder="t('Auth.Username')" />
                                    <ErrorMessage name="username" as="div" class="alert alert-danger m-1" />
                                </div>
                                <div class="modal-footer">
                                    <button data-bs-dismiss="modal" type="submit" class="btn btn-primary">{{ t('Settings.Save') }}</button>
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