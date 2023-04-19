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
            <th>Enable</th>
            <th>Action</th>
        </thead>
        <tbody>
            <tr v-for="item in disabledProducts">
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
                <td>{{ item.product_enable }}</td>
                <td><button class="btn btn-danger " @click="BeEnable(item.id)">Enable</button></td>
                <div class="modal fade" :id="'exampleModal' + item.id" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ item.product_img }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img :src="`/img/${item.product_img}`" alt="" class="img-fluid">
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
<script>
import { http } from '../utils/http.mjs';

export default {
    data() {
        return {
            disabledProducts: {},
            obj: {}
        }
    },
    methods: {
        async GetDisabledProducts() {
            const response = await http.get("/products/disable", {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
            this.disabledProducts = response.data.data;
            console.log(this.disabledProducts)
        },
        async BeEnable(id){
            this.obj = {
                product_enable: true
            }
            console.log(this.obj)
            const response = await http.patch("/enable/" + id, this.obj, {
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
            });
        }
    },
    mounted() {
        this.GetDisabledProducts();
    }
}
</script>
<style scoped>
.table {
    margin-top: 20px;
    background-color: beige;
}
</style>

  