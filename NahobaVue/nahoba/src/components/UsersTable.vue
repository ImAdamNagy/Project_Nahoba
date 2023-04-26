<template>
    <div v-if="useUser().usersIsLoading == false && useUser().Users.length > 0">
        <div class="scrolltable p-3">
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
                    <tr v-for="item in useUser().Users">
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
        </div>
    </div>
    <div class="loadingmsg mt-3" v-else-if="useUser().usersIsLoading == false && useUser().Users.length == 0">
        <p>There are no users!</p>
    </div>
    <div class="loadingmsg mt-3" v-else-if="useUser().usersIsLoading == true">
        <p>Just a moment, users table is loading.....</p>
    </div>
</template>
<script setup>
import { useUser } from '@/store/UserStore.js'
import { useProduct } from '@/store/ProductStore.js'
import { onMounted } from 'vue';

onMounted(useUser().getUsers);

async function deleteUserData(userid) {
    useUser().usersIsLoading = true;
    await useProduct().deleteUsersProducts(userid);
    await useUser().deleteUser(userid);
    useUser().usersIsLoading = false;
    alert("The user has been successfully deleted");
}

</script>
<style scoped>
thead {
    border-bottom: 3px solid red;
}
</style>