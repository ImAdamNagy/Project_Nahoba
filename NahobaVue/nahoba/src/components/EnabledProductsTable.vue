<template>
    <div v-if="useProduct().enableProductsIsLoading == false && useProduct().EnableProducts.length > 0">
        <div class="scrolltable p-3">
            <table class="table table-responsive table-striped">
                <thead>
                    <th>seller</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Type</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr v-for="item in useProduct().EnableProducts">
                        <td>{{ item.seller.firstname }} {{ item.seller.lastname }}</td>
                        <td>{{ item.product_name }}</td>
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
                            <div class="btn btn-danger" @click="useProduct().deleteProduct(item.id)">Delete product</div>
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
                                        <img :src="`http://localhost:8881/images/${item.product_img}`" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="loadingmsg mt-3"
        v-else-if="useProduct().enableProductsIsLoading == false && useProduct().EnableProducts.length == 0">
        <p>There are no available products on the website</p>
    </div>
    <div class="loadingmsg mt-3" v-else-if="useProduct().enableProductsIsLoading == true">
        <p>Just a moment, available products table is loading.....</p>
    </div>
</template>
<script setup>
import { useProduct } from '@/store/ProductStore.js'
import { onMounted } from 'vue';

onMounted(useProduct().getEnabledProducts);

</script>
<style scoped>thead {
    border-bottom: 3px solid red;
}</style>