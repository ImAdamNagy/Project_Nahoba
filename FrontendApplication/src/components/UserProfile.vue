
<script setup>
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { useProduct } from '@/store/ProductStore.js'
import { useAuth } from '@/store/AuthStore.js'
import { onMounted } from "vue";
import * as yup from 'yup';
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
const schema = yup.object(
    {
        product_name: yup.string('The given name is not a text!').min(5, 'The given name must be at elast 5 characters long!').required('The products name is required!'),
        product_price: yup.number().required('You must give your product a price!'),
        product_description: yup.string('Your description must not be a number!').max(150, 'Your items description`s length must not be greater than 150 characters!').required('You must write a hsort description of your product!'),
        product_location: yup.string('Your location format is not correct! Try this format: `city, district`').min(8,).max(120, 'Your location must not be greater than 120 characters!').required('You must give a location from where you are advertising your product!'),
        product_img: yup.string().min(4).required('You must select at least one image for your product!')
    });
onMounted(async function () {
    useProduct().getOwnProducts();
});

async function deleteUserProduct(id) {
    if (confirm(t("Confirm.OwnProductDelConfirm")) == true) {
        useProduct().userProductsIsLoading = true;
        await useProduct().deleteProduct(id);
        const index = useProduct().OwnProducts.findIndex(item => item.id === id);
        useProduct().OwnProducts.splice(index, 1);
        useProduct().userProductsIsLoading = false;
    }
}
</script>
<template>
    <div v-if="useProduct().userProductsIsLoading == false">
        <div class="row mx-auto mt-5 py-4 rounded rounded-5 px-3">
            <div class="col-12">
                <h1>
                    {{ useAuth().currentUserDetails.firstname }} {{ useAuth().currentUserDetails.lastname }}
                </h1>
                <p><b>{{ t('UserData.Email') }}: </b>{{ useAuth().currentUserDetails.email }}</p>
                <p><b>{{ t('UserData.Phone') }}: </b>{{ useAuth().currentUserDetails.tel }}</p>
                <p><b>{{ t('Auth.Username') }}: </b>{{ useAuth().currentUserDetails.username }}</p>
            </div>
            <div class="title_lines">{{ t('Profile.YourProducts') }}</div>
            <div class="col-lg-4  col-sm-6 col-xs-12" v-for="item in useProduct().OwnProducts" :key="item.id"
                v-if="useProduct().OwnProducts.length > 0">
                <div class="product h-100">
                    <img :src="useProduct().getImage(item.product_img)" alt="" class="profilecardimg">
                    <div class="row data">
                        <div class="col-12 ">
                            <h5 class="title">{{ item.product_name }}</h5>
                            <p class="price">{{ item.product_price }} {{ t('ProductInfo.Huf') }}</p>
                            <div id="name" class="d-flex flex-sm-row flex-column justify-content-between">
                                <p class="cartype" id="cartype">{{ item.car_type.name }} {{ item.car_type.vintage }}</p>
                                <p class="type" id="type">{{ item.type.type }}</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-danger deletebtn"
                                @click="deleteUserProduct(item.id)">{{ t('Profile.Delete') }}</button>
                            <a class="btn btn-warning" data-bs-toggle="modal"
                                :data-bs-target="'#updateModal' + item.id">{{ t('Profile.Update') }}</a>
                            <div class="modal fade" :id="'updateModal' + item.id" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                {{ t('Profile.UpdateProduct') }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <VForm @submit="useProduct().updateProduct" :validation-schema="schema">
                                            <div class="modal-body">
                                                <Field type="hidden" id="id" name="id" :value="`${item.id}`" />
                                                <div class="mb-3">
                                                    <label for="product_name"
                                                        class="form-label">{{ t('ProductInfo.ProductName') }}</label>
                                                    <Field type="text" name="product_name" id="product_name"
                                                        class="form-control" :value="`${item.product_name}`" />
                                                    <ErrorMessage name="product_name" as="div"
                                                        class="alert alert-danger m-1" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="product_price"
                                                        class="form-label">{{ t('ProductInfo.ProductPrice') }}</label>
                                                    <Field type="number" name="product_price" id="product_price"
                                                        class="form-control" :value="`${item.product_price}`" />
                                                    <ErrorMessage name="product_price" as="div"
                                                        class="alert alert-danger m-1" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="product_description"
                                                        class="form-label">{{ t('ProductInfo.Desc') }}</label>
                                                    <Field type="text" as="textarea" name="product_description"
                                                        id="product_description" class="form-control"
                                                        :value="`${item.product_description}`" />
                                                    <ErrorMessage name="product_description" as="div"
                                                        class="alert alert-danger m-1" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="product_location"
                                                        class="form-label">{{ t('ProductInfo.Location') }}</label>
                                                    <Field type="text" as="textarea" name="product_location"
                                                        id="product_location" class="form-control"
                                                        :value="`${item.product_location}`" />
                                                    <ErrorMessage name="product_location" as="div"
                                                        class="alert alert-danger m-1" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="product_img"
                                                        class="form-label">{{ t('MechSheet.UploadImage') }}</label>
                                                    <br>
                                                    <Field type="text" id="product_img" name="product_img" ref="file"
                                                        :value="`${item.product_img}`" />
                                                    <ErrorMessage name="product_img" as="div"
                                                        class="alert alert-danger m-1" />
                                                </div>
                                                <button data-bs-dismiss="modal" type="submit"
                                                    class="btn btn-primary">{{ t('Profile.Update') }}</button>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">{{ t('TypeForm.Close') }}</button>
                                            </div>
                                        </VForm>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-auto mt-5 py-4 rounded rounded-5 px-3" v-else>
                <div class="col-12">
                    <div class="msgBoxTitle">{{ t('ProductInfo.NoProductsYet') }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="loader" v-else>
        <svg class="car" width="102" height="40" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(2 1)" stroke="white" fill="none" fill-rule="evenodd" stroke-linecap="round"
                stroke-linejoin="round">
                <path class="car__body"
                    d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01"
                    stroke-width="3" />
                <ellipse class="car__wheel--left" stroke-width="3.2" fill="#FFF" cx="83.493" cy="30.25" rx="6.922"
                    ry="6.808" />
                <ellipse class="car__wheel--right" stroke-width="3.2" fill="#FFF" cx="46.511" cy="30.25" rx="6.922"
                    ry="6.808" />
                <path class="car__line car__line--top" d="M22.5 16.5H2.475" stroke-width="3" />
                <path class="car__line car__line--middle" d="M20.5 23.5H.4755" stroke-width="3" />
                <path class="car__line car__line--bottom" d="M25.5 9.5h-19" stroke-width="3" />
            </g>
        </svg>
    </div>
</template>
<style scoped>
.deletebtn {
    float: right;
}

.loader {
    height: 400px;
}

#msg {
    text-align: center;
}

img {
    max-width: 100%;
}

.row {
    background-color: #ffffff;
}



.data {
    background-color: white;
}

.line {
    border: 5px solid black;
}

.product {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: white;
    padding: 12px;
    font-weight: bold;
    border-radius: 20px 0px 20px 0px;
    border: 2px red solid;
}

.col {
    margin-top: 10px;
}

img {
    width: 100%;
    border-radius: 20px 0px 20px 0px;
}</style>
