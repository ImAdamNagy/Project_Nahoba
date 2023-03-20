<script>
</script>

<template>
<div class="container">
    <div class="row py-5">
        <div class="col-4 ms-auto rounded-start rounded-3">
            <div class="bg-danger" id="formdiv">
                <form action="">
                    <input type="email" name="email" id="email" placeholder="email" class="form-control">
                    <div id="name">
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
        <div class="col-5 bg-warning me-auto rounded-end rounded-3">
            kép

        </div>   
    </div>
</div>
</template>

<style scoped>
    #name{
        display: flex;
        flex-direction: row;
    }
    input{
        margin-top: 7px;
    }
    #formdiv{
        padding: 10px;
    }

</style>