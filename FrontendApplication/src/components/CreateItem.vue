<template>
<div class="row mx-auto mt-5">
        <div class="col-xl-5 text-center" id="first">
            <h1>{{ t('CreateForm.title') }}</h1>
        </div> 
</div>
<div class="row mx-auto mb-4">
        <div class="col-xl-5 text-center" id="second">
            <div id="formdiv">
        <VForm @submit="createProduct" :validation-schema="schema">
                <label for="product_name" class="form-label">{{t('ProductInfo.ProductName')}}</label>
                <Field type="text" name="product_name" id="product_name" :placeholder="t('ProductInfo.ProductName')" class="form-control" rule="required"/>
                <ErrorMessage name="product_name" as="div" class="alert alert-danger m-1" />

                <label for="type">{{ t("ProductInfo.ProductType") }}</label>
                
                <Field name="types_id" id="type" class="form-control" as="select">
                    <option value="" disabled selected hidden>{{t('CreateForm.TypeSelect')}}</option>
                    <option  v-for="item in useType().types" :value="item.id" :key="item.id">
                        {{ item.type }}
                    </option>
                </Field>

                <label for="car_typeId">Car type</label>
                <Field name="car_typeId" id="car_typeId" class="form-control" as="select">
                    <option value="" disabled selected hidden>{{t('CreateForm.CartTypeSelect')}}</option>
                    <option  v-for="item in useCarType().cartypes" :value="item.id" :key="item.id">
                        {{ item.name }} {{ item.year }}
                    </option>
                </Field>

                <label for="product_price" class="form-label">{{t('ProductInfo.ProductPrice')}}</label>
                <Field type="number" name="product_price" id="product_price" :placeholder="t('ProductInfo.ProductPrice')" class="form-control"/>
                <ErrorMessage name="product_price" as="div" class="alert alert-danger m-1" />

                <label for="product_description" class="form-label">{{t('ProductInfo.ProductDesc')}}</label>
                <Field type="text" name="product_description" id="product_description" :placeholder="t('ProductInfo.ProductDesc')" class="form-control"/>
                <ErrorMessage name="product_description" as="div" class="alert alert-danger m-1" />

                <label for="product_location" class="form-label">{{t('ProductInfo.ProductLoc')}}</label>
                <Field type="text" name="product_location" id="product_location" :placeholder="t('ProductInfo.ProductLoc')" class="form-control"/>
                <ErrorMessage name="product_location" as="div" class="alert alert-danger m-1" />
                
                <label for="product_img" class="form-label">{{t('MechSheet.Image')}}</label>
                <br>
                <Field type="file" name="product_img" id="product_img" @change="$emit('onChange', $event)" />

                <input class="btn-warning btn form-control mt-3" type="submit" :value="t('CreateForm.Create')" />
            </VForm>
            </div>
        </div>
</div>  
</template>

<script setup>
import {Form as VForm, Field, ErrorMessage} from "vee-validate";
import { onMounted } from "vue";
import * as yup from 'yup';
import {useType} from '@/store/TypeStore.js'
import {useProduct} from '@/store/ProductStore.js'
import {useCarType} from '@/store/CarTypeStore.js'
import { useRouter } from 'vue-router';
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
const router = useRouter();

async function createProduct(newproduct){
    await useProduct().createProduct(newproduct);
    router.push({name: "MainPage"});
}

const schema = yup.object(
    {
        product_name: yup.string('The given name is not a text!').min(5, 'The given name must be at elast 5 characters long!').required('The products name is required!'),
        product_price: yup.number().required('You must give your product a price!'),
        product_description: yup.string('Your description must not be a number!').max(150, 'Your items description`s length must not be greater than 150 characters!').required('You must write a hsort description of your product!'),
        product_location: yup.string('Your location format is not correct! Try this format: `city, district`').min(8, ).max(120, 'Your location must not be greater than 120 characters!').required('You must give a location from where you are advertising your product!'),
        product_img: yup.string().max(1536).required('You must select at least one image for your product!')
    })

const emits = defineEmits(["onChange"]);

onMounted(async function (){
    useType().allTypes();
    useCarType().allCarTypes();
});

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
        background-image: url(/img/bg.jpg);
        background-position: center;
        background-color: #444;
        background-blend-mode: multiply;
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