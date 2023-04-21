<script setup>
import {http} from '@/utils/http.mjs'
import {reactive} from 'vue';
import { defineProps } from "vue";
import { useRouter } from 'vue-router';
import {Form as VForm, Field, ErrorMessage} from "vee-validate";
import * as yup from 'yup';

const router = useRouter();

const schema = yup.object(
    {
        product_name: yup.string('The given name is not a text!').min(5, 'The given name must be at elast 5 characters long!').required('The products name is required!'),
        product_price: yup.number().required('You must give your product a price!'),
        product_description: yup.string('Your description must not be a number!').max(150, 'Your items description`s length must not be greater than 150 characters!').required('You must write a hsort description of your product!'),
        product_location: yup.string('Your location format is not correct! Try this format: `city, district`').min(8, ).max(120, 'Your location must not be greater than 120 characters!').required('You must give a location from where you are advertising your product!'),
        product_img: yup.string().min(4).required('You must select at least one image for your product!')
    });
const props = defineProps({
    data: Object
});
const userData = reactive({
    data: {}
});
const itemData = reactive({
    helper: "",
    typesHelper: {}
});

async function user(){
    const response = await http.get('/user/' + localStorage.getItem("userid"))
        userData.data = response.data.data;
        console.log
}
user();
async function setIdAndTypesId(sellerId, types){
    itemData.helper = sellerId;
    itemData.typesHelper = types.id;
    console.log(props.data);
    console.log(itemData.typesHelper);
}

async function update(updatedproduct){
    updatedproduct.seller_id = localStorage.getItem("userid");
    updatedproduct.types_id = itemData.typesHelper;
    updatedproduct.product_enable = false;
    const response = await http.patch('/product/' + itemData.helper, updatedproduct,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
    alert("Your changes has been sent to the admin for validation. You may close this window.")
    router.push({name: "UserProfile"});
}

</script>
<template>
    <div class="row mx-auto py-4 rounded rounded-5 px-3" v-if="props.data.length > 0">
        <div class="col-12">
            <h1>
                {{userData.data.firstname}} {{userData.data.lastname}}
            </h1>
            <p><b>Email address:</b> {{ userData.data.email }}</p>
            <p><b>Phone number:</b> {{ userData.data.tel }}</p>
            <p><b>Username:</b> {{ userData.data.username }}</p>
        </div>
        <div class="title_lines">Your products</div>
        <div class="col col-lg-3 col-md-4 col-sm-6 col-xs-12" v-for="item in props.data">
        <div class="product h-100">
            <img :src="`/img/${item.product_img}`" alt="" class="img-fluid">
            <div class="row data">
                <div class="col-8">
                    <h5 class="title">{{item.product_name}}</h5>
                    <p class="price">{{item.product_price}} Ft</p>
                </div>
                <div class="col-3">
                    <a class="btn btn-warning" data-bs-toggle="modal" :data-bs-target="'#updateModal' + item.id">Update</a>
                        <div class="modal fade" :id="'updateModal' + item.id" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update your product</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <VForm @submit="update" :validation-schema="schema">
                                        <div class="mb-3">
                                            <label for="product_name" class="form-label">Product name</label>
                                            <Field type="text" name="product_name" id="product_name" class="form-control" :value="`${item.product_name}`" />
                                            <ErrorMessage name="product_name" as="div" class="alert alert-danger m-1" />
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="product_price" class="form-label">Product price</label>
                                            <Field type="number" name="product_price" id="product_price" class="form-control" :value="`${item.product_price}`"/>
                                            <ErrorMessage name="product_price" as="div" class="alert alert-danger m-1" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_description" class="form-label">Product descripton</label>
                                            <Field type="text" as="textarea" name="product_description" id="product_description" class="form-control" :value="`${item.product_description}`"/>
                                            <ErrorMessage name="product_description" as="div" class="alert alert-danger m-1" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_location" class="form-label">Product location</label>
                                            <Field type="text" as="textarea" name="product_location" id="product_location" class="form-control" :value="`${item.product_location}`"/>
                                            <ErrorMessage name="product_location" as="div" class="alert alert-danger m-1" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_img" class="form-label">Upload image</label>
                                            <br>
                                            <Field type="text" id="product_img" name="product_img" ref="file" :value="`${item.product_img}`"/>
                                            <ErrorMessage name="product_img" as="div" class="alert alert-danger m-1" />
                                        </div>
                                        <button type="submit" class="btn btn-primary" @click="setIdAndTypesId(item.id, item.type)">Update</button>
                                    </VForm>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="row mx-auto py-4 rounded rounded-5 px-3" v-else>
    <div class="col-12">
            <p id="msg">Just a moment, we are loading your profile</p>
        </div>
  </div>
</template>
<style scoped>
.title_lines {
    position: relative;
    font-size: 30px;
    z-index: 1;
    overflow: hidden;
    text-align: center;
    color: black;
    font-family: arial;
}
#msg{
    text-align: center;
}
.title_lines:before, .title_lines:after {
    position: absolute;
    top: 51%;
    overflow: hidden;
    width: 48%;
    height: 2px;
    content: '\a0';
    background-color: red;
    margin-left: 2%;
}
.title_lines:before {
    margin-left: -50%;
    text-align: right;
}
img{
    max-width: 100%;
}
.row{
        background-color: #ffffff;   
    }
@media screen and (min-width: 992px) {
    .row{
        max-width: 75%;   
    }
}
.data{
    background-color: white;
}
.line{
    border: 5px solid black;
}
.product{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: white;
    padding: 12px;
    font-weight: bold;
    border-radius: 20px 0px 20px 0px;
    border: 2px red solid;
}
.col{
  margin-top: 10px;
}
img{
  width: 100%;
  border-radius: 20px 0px 20px 0px;
}
</style>