<script setup>
import { RouterView } from 'vue-router';
import { useAuth } from './store/AuthStore.js';
import { onMounted } from 'vue';
import { ref } from 'vue'

const isLoading = ref(true);
onMounted(
    async function () {
        if (useAuth().loggedIn) {
            await useAuth().getCurrentUserDetails();
            if (useAuth().currentUserDetails.role.role_name == "admin") {
                useAuth().isAdmin = true;
            }
            useAuth().userid = useAuth().currentUserDetails.userid;
        }
        isLoading.value = false;
    }
);

</script>
<template>
    <div class="custom-loader" v-if="isLoading == true">

    </div>
    <RouterView v-else />
</template> 
