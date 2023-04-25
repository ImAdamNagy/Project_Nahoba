<template>
    <table class="table table-responsive table-striped">
        <thead>
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Username</th>
            <th>Role</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <tr v-for="item in useUser().allUsers">
                <td>{{ item.userid }}</td>
                <td>{{ item.firstname }}</td>
                <td>{{ item.lastname }}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.tel }}</td>
                <td>{{ item.username }}</td>
                <td>{{ item.role.role_name }}</td>
                <td>
                    <div class="btn btn-danger" @click="deleteUserData(item.userid)">Delete user</div>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script setup>
import {useUser} from '@/store/UserStore.js'
import {useProduct} from '@/store/ProductStore.js'
import {onMounted} from 'vue';

onMounted(useUser().getAllUsers);

async function deleteUserData(userid){
    await useProduct().deleteUsersProducts(userid);
    await useUser().deleteUser(userid);
}

</script>
<style scoped>
.table {
    margin-top: 20px;
    background-color: beige;
}
</style>