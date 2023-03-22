<script>
export default{
data(){
    return{
        newUser:{
            email: "",
            firstname: "",
            lastname: "",
            tel: "",
            postalcode: "",
            city: "",
            address: "",
            username: "",
            password: "",
            password_confirmation: ""
        }
    }
},
methods:{
   redirect(){
    this.$router.push({name: 'login'});
   }     
},
emits:[
        "registerUser"
]
}
</script>

<template>
    <div class="row py-5 mx-auto">
        <div class="col-sm-5 ms-sm-auto bg-warning" id="piccol">
            <h1>Register now!</h1>
            <p>Start your journey at nahoba parts</p>
        </div> 
        <div class="col-sm-4 me-sm-auto mx-xs-auto" id="formcol">
            <div id="formdiv">
                <form @submit.prevent="$emit('registerUser', newUser)">
                    <input type="email" name="email" id="email" placeholder="email" class="form-control">
                    <div id="name" class="d-flex flex-sm-row flex-column">
                        <input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control me-2">
                        <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control ">
                    </div>
                    <input type="tel" name="tel" id="tel" placeholder="tel" class="form-control">
                    <div id="name" class="d-flex flex-sm-row flex-column">
                        <input type="number" name="postalcode" id="postalcode" placeholder="Postal code" class="form-control me-2">
                        <input type="text" name="city" id="city" placeholder="City" class="form-control ">
                    </div>
                    <input type="text" name="address" id="address" placeholder="address" class="form-control">
                    <input type="text" name="username" id="username" placeholder="username" class="form-control">
                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="confirm password" class="form-control">
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <input type="submit" value="Register" class="btn btn-secondary my-md-3 my-2 rounded-pill">
                        <Router-link class="btn btn-secondary my-md-3 my-1 rounded-pill" to="/login">Login</Router-link>
                    </div>
                </form>
            </div>
        </div>  
    </div>
</template>

<style scoped>
    .row{
        position: relative;
        top: 35%;
    }
    @media screen and (max-width: 575px) {
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
    #formcol{
        box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
        background-color: #D9D9D9;
        border-end-end-radius: 30px;
    }
    #piccol{
        box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
        background-image: url(../img/porsche.jpg);
        background-position: center;
        background-size: cover;
        padding-top: 15%;
        border-start-start-radius: 30px;

    }
    h1,p{
        color: white;
        text-align: center;
    }

</style>