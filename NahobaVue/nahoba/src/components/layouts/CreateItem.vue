<template>
<div class="row mx-auto mt-5">
        <div class="col-xl-5 text-center bg-warning" id="first">
            <h1>Create a new product</h1>
        </div> 
</div>
<div class="row mx-auto">
        <div class="col-xl-5 text-center" id="second">
            <div id="formdiv">
        <VForm @submit="(newproduct) => $emit('createProduct', newproduct)">
                <label for="product_name" class="form-label">Product Name</label>
                <Field type="text" name="product_name" id="product_name" placeholder="Enter product name" class="form-control"/>
                <ErrorMessage name="product_name" as="div" class="alert alert-danger m-1" />

                <label for="types_id" class="form-label">Product Type</label>
                <Field type="text" name="types_id" id="types_id" placeholder="Enter product type" class="form-control"/>

                <label for="type">Product type</label>
                
                <Field name="type" id="type" class="form-control" as="select">
                    <option value="" disabled selected hidden>Choose your products type</option>
                    <option  v-for="item in props.data" :value="item.id">
                        {{ item.type }}
                    </option>
                </Field>

                <label for="product_price" class="form-label">Product Price</label>
                <Field type="text" name="product_price" id="product_price" placeholder="Enter product type" class="form-control"/>
                <ErrorMessage name="product_price" as="div" class="alert alert-danger m-1" />

                <label for="product_description" class="form-label">Description</label>
                <Field type="text" name="product_description" id="product_description" placeholder="Write a short description" class="form-control"/>
                <ErrorMessage name="product_description" as="div" class="alert alert-danger m-1" />

                <label for="loc" class="form-label">Location</label>
                <Field type="text" name="product_location" id="product_location" placeholder="Enter product location" class="form-control"/>
                <ErrorMessage name="product_location" as="div" class="alert alert-danger m-1" />

                <label for="img" class="form-label">Upload image</label>
                <br>
                <Field type="file" name="image" ref="file"/>

                <button class="btn-warning btn form-control mt-3" type="submit">Create</button>
            </VForm>
            </div>
        </div>
</div>

            
</template>

<script setup>
import {Form as VForm, Field, ErrorMessage} from "vee-validate";
import { defineProps } from "vue";

const props = defineProps({
    data: Object
});
const emits =  defineEmits(["createProduct"]);


</script>
<style scoped>
    .row{
        position: relative;
        top: 5%;
    }
    @media screen and (max-width: 1000px) {
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
    #second{
        box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
        background-color: #D9D9D9;
        border-end-end-radius: 30px;
        margin: auto;
    }
    #first{
        box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
        background-image: url(../img/porsche.jpg);
        background-position: center;
        background-size: cover;
        padding-top: 15%;
        border-start-start-radius: 30px;
        margin: auto;

    }
    h1,p{
        color: white;
        text-align: center;
    }
    #title{
        color:black;
    }
</style>