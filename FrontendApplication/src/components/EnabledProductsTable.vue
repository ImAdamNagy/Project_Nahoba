<template>
    <div v-if="useProduct().enableProductsIsLoading == false && useProduct().enableProducts.length > 0">
        <div class="scrolltable p-3">
            <table class="table table-responsive table-striped">
                <thead>
                    <th>{{t("DisabledProducts.Seller")}}</th>
                    <th>{{t("DisabledProducts.Name")}}</th>
                    <th>{{t("DisabledProducts.CarType")}}</th>
                    <th>{{t("DisabledProducts.Price")}}</th>
                    <th>{{t("DisabledProducts.Type")}}</th>
                    <th>{{t("DisabledProducts.Image")}}</th>
                    <th>{{t("DisabledProducts.Desc")}}</th>
                    <th>{{t("DisabledProducts.Location")}}</th>
                    <th>{{t("Admin.Actions")}}</th>
                </thead>
                <tbody>
                    <tr v-for="item in useProduct().enableProducts" :key="item.id">
                        <td>{{ item.seller.firstname }} {{ item.seller.lastname }}</td>
                        <td>{{ item.product_name }}</td>
                        <td>{{ item.car_type.name }} {{ item.car_type.year }}</td>
                        <td>{{ item.product_price }}</td>
                        <td>{{ item.type.type }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                :data-bs-target="'#exampleModal' + item.id">
                                {{ item.product_img }}
                            </button>
                        </td>
                        <td>{{ item.product_description }}</td>
                        <td>{{ item.product_location }}</td>
                        <td>
                            <div class="btn btn-danger" @click="deleteEnableProduct(item.id, item.seller.userid)">{{t("CardActions.Delete")}} {{t("ProductInfo.product")}}</div>
                        </td>
                        <div class="modal fade" :id="'exampleModal' + item.id" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ item.product_img }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img :src="useProduct().getImage(item.product_img)" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">{{t("TypeForm.Close")}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="loadingmsg mt-3" v-else-if="useProduct().enableProductsIsLoading == false && useProduct().enableProducts.length == 0">
        <p>{{t("Loadings.NoProducts")}}</p>
    </div>
    <div class="loader" v-else-if="useProduct().enableProductsIsLoading == true">
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
<script setup>
import { useProduct } from '@/store/ProductStore.js'
import { onMounted } from 'vue';
import { useChat } from '../store/ChatStore';
import { useMsg } from '../store/MessageStore';
import {useI18n} from 'vue-i18n'

const { t } = useI18n()
onMounted(useProduct().getEnabledProducts);

async function deleteEnableProduct(id, seller_id) {
    if (confirm(t("Confirm.DeleteConfirm")) == true) {
    useProduct().enableProductsIsLoading = true;
    await useProduct().deleteProduct(id);
    const index = useProduct().enableProducts.findIndex(item => item.id === id);
    useProduct().enableProducts.splice(index, 1);
    await useChat().CreateAdminNotificationChat(seller_id);
    await useMsg().AdminNotificationMessage(t('Notofication.DeleteNotify'));
    useProduct().enableProductsIsLoading = false;
    }
}
</script>
<style scoped>
.loader{
  height: 400px;
}
thead {
    border-bottom: 3px solid red;
}
</style>