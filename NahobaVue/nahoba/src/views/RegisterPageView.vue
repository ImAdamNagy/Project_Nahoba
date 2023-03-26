<script >
import Register from '../components/layouts/Register.vue'
import {http} from '../utils/http.mjs'

export default{
    components:{
        Register
    },
    methods:{
        async registerUser(newUser){
            const response = await http.post('register',newUser);
            this.$router.push({name: 'login'});
        }
    }
}
</script>

<template>
    <div class="container-fluid">
        <Register @register-user="registerUser"/>
    </div>
</template>
<style scoped>
</style>

