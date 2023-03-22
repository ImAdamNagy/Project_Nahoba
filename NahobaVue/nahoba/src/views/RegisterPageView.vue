<script >
import Register from '../components/layouts/Register.vue'

export default{
    components:{
        Register
    },
    methods:{
        async registerUser(newUser){
            const response = await http.post('newuser',newUser);
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

