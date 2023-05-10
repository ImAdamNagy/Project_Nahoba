<template>
    <div v-if="useUser().usersIsLoading == false && useUser().users.length > 0">
        <div class="scrolltable p-3">
            <table class="table table-responsive table-striped">
                <thead>
                    <th>Id</th>
                    <th>{{t("Auth.Firstname")}}</th>
                    <th>{{t("Auth.Lastname")}}</th>
                    <th>{{t("UserData.Email")}}</th>
                    <th>{{t("UserData.Phone")}}</th>
                    <th>{{t("Auth.Username")}}</th>
                    <th>{{t("Admin.Role")}}</th>
                    <th>{{t("Admin.Actions")}}</th>
                </thead>
                <tbody>
                    <tr v-for="item in useUser().users" :key="item.userid">
                        <td>{{ item.userid }}</td>
                        <td>{{ item.firstname }}</td>
                        <td>{{ item.lastname }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.tel }}</td>
                        <td>{{ item.username }}</td>
                        <td>{{ item.role.role_name }}</td>
                        <td>
                            <div class="btn btn-danger" @click="deleteUserData(item.userid)">{{t("Admin.DeleteUser")}}</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="loadingmsg mt-3" v-else-if="useUser().usersIsLoading == false && useUser().users.length == 0">
        <p>{{t("Admin.NoUsers")}}</p>
    </div>
    <div class="loader" v-else-if="useUser().usersIsLoading == true">
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
<script setup>
import { useUser } from '@/store/UserStore.js'
import { useProduct } from '@/store/ProductStore.js'
import { onMounted } from 'vue';
import {useMsg} from '@/store/MessageStore.js';
import {useChat} from '@/store/ChatStore.js'
import { useMechanic } from '../store/MechanicStore';
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
onMounted(useUser().getUsers);

async function deleteUserData(userid) {
    if (confirm("Are you sure you want to delete this user?") == true) {
    useUser().usersIsLoading = true;
    await useProduct().deleteUsersProducts(userid);
    await useMsg().deleteUserMessages(userid);
    await useChat().deleteChats(userid);
    await useMechanic().deleteMechanic(userid);
    await useUser().deleteUser(userid);
    const index = useUser().users.findIndex(item=>item.userid === userid);
    useUser().users.splice(index,1);
    useUser().usersIsLoading = false;
    alert("The user has been successfully deleted");
    }
}

</script>
<style scoped>
.loader{
  height: 400px;
}
thead {
    border-bottom: 3px solid red;
}
</style>