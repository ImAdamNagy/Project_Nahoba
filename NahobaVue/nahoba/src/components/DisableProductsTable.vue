<template>
    <table class="table table-responsive table-striped">
        <thead>
            <th>Id</th>
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
            <tr v-for="item in useProduct().disabledProducts">
                <td>{{ item.id }}</td>
                <td>{{ item.seller.firstname }} {{ item.seller.lastname }}</td>
                <td>{{ item.product_name }}</td>
                <td>{{ item.product_price }}</td>
                <td>{{ item.type.type }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" :data-bs-target="'#exampleModal' + item.id">
                        {{ item.product_img }}
                    </button>
                </td>
                <td>{{ item.product_description }}</td>
                <td>{{ item.product_location }}</td>
                <td><button class="btn btn-danger " @click="useProduct().BeEnable(item.id)">Enable</button></td>
                <div class="modal fade" :id="'exampleModal' + item.id" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ item.product_img }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img :src="`http://localhost:8881/images/${item.product_img}`" alt="" class="img-fluid">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
        </tbody>
    </table>
</template>
<script setup>
import {useProduct} from '@/store/ProductStore.js'
import {onMounted} from 'vue';

onMounted(useProduct().GetDisabledProducts);

</script>
<style scoped>
.table {
    margin-top: 20px;
    background-color: beige;
}
</style>

  