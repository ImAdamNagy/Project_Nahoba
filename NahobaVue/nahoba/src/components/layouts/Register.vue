<script setup>
</script>

<template>
    <div class="row py-5 mx-auto">
        <div class="col-sm-4 ms-sm-auto mx-xs-auto bg-danger rounded-sm-start">
            <div id="formdiv">
                <form action="">
                    <input type="email" name="email" id="email" placeholder="email" class="form-control">
                    <div id="name" class="d-flex flex-sm-row flex-column">
                        <input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control me-2">
                        <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control ">
                    </div>
                    <input type="tel" name="tel" id="tel" placeholder="tel" class="form-control">
                    <input type="text" name="address" id="address" placeholder="address" class="form-control">
                    <input type="text" name="username" id="username" placeholder="username" class="form-control">
                    <input type="password" name="password" id="password" placeholder="password" class="form-control">
                    <input type="password" name="passwordconf" id="passwordconf" placeholder="confirm password" class="form-control">
                    <input type="submit" value="Register" class="btn btn-success mx-auto">
                </form>
            </div>
        </div>
        <div class="col-sm-5 me-sm-auto bg-warning rounded-sm-end">
            kép

        </div>   
    </div>
</template>

<style scoped>
    input{
        margin-top: 7px;
    }
    #formdiv{
        padding: 10px;
    }

</style>