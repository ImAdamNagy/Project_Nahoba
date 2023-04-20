<script setup>
import {http} from '@/utils/http.mjs'
import {reactive} from 'vue';
import { defineProps } from "vue";
import { useRouter } from 'vue-router';
import {Form as VForm, Field, ErrorMessage} from "vee-validate";

const router = useRouter();

const props = defineProps({
    data: Object,
    types: Object
});
const userData = reactive({
    data: {}
});
const itemData = reactive({
    helper: ""
});
async function user(){
    const response = await http.get('/user/' + localStorage.getItem("userid"))
        userData.data = response.data.data;
}
user();
async function setId(asd){
    itemData.helper = asd;
    console.log(itemData.helper);
}

async function update(updatedproduct){
    updatedproduct.seller_id = localStorage.getItem("userid");
    updatedproduct.product_enable = false;
    console.log(updatedproduct);
    const response = await http.patch('/product/' + itemData.helper, updatedproduct,{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
    alert("Item successfully updated!")
}

</script>
<template>
    <div class="row mx-auto py-4 rounded rounded-5 px-3">
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
                                    <VForm @submit="update">
                                        <div class="mb-3">
                                            <label for="product_name" class="form-label">Product name</label>
                                            <Field type="text" name="product_name" id="product_name" class="form-control" :value="`${item.product_name}`" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="types_id">Product type</label>
                
                                            <Field name="types_id" id="types_id" class="form-control" as="select">
                                                <option value="" disabled selected hidden>Choose your products type</option>
                                                <option  v-for="item in props.types" :value="item.id">
                                                    {{ item.type }}
                                                </option>
                                            </Field>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_price" class="form-label">Product price</label>
                                            <Field type="number" name="product_price" id="product_price" class="form-control" :value="`${item.product_price}`"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_description" class="form-label">Product descripton</label>
                                            <Field type="text" as="textarea" name="product_description" id="product_description" class="form-control" :value="`${item.product_description}`"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_location" class="form-label">Product location</label>
                                            <Field type="text" as="textarea" name="product_location" id="product_location" class="form-control" :value="`${item.product_location}`"/>
                                        </div>
                                        <div class="mb-3">
                                            <label for="product_img" class="form-label">Upload image</label>
                                            <br>
                                            <Field type="text" id="product_img" name="product_img" ref="file" :value="`${item.product_img}`"/>
                                        </div>
                                        <button type="submit" class="btn btn-primary" @click="setId(item.id)">Update</button>
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