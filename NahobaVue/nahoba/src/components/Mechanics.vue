<template>

  <div class="col-lg-4 col-md-3 col-sm-12 mechanics mt-3 ">
    <div class="row">
      
      <h2 class="grouptitle">Mechanics</h2>
        <div class="col-12 mt-3" v-for="item in useProduct().EnableProducts">
          <div class="product h-100">
            <img :src="`http://localhost:8881/images/${item.product_img}`" alt="" class="img-fluid">
              <h5 class="title">{{item.product_name}}</h5>
              <p class="price">{{item.product_price}} Ft</p>
              <a class="btn btn-warning" @click="$emit('details', item.id)">More</a>
          </div>
        </div>
       </div>
  </div>
</template>
<script setup>
import { useProduct } from '../store/ProductStore.js';
import { onMounted } from 'vue';

onMounted(useProduct().getEnabledProducts);
</script>
  
<style scoped>
  .product{
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      background-color: white;
      padding: 10px;
      font-weight: bold;
      border-radius: 20px 0px 20px 0px;
      box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
  }
  img{
    width: 100%;
    border-radius: 20px 0px 20px 0px;
  }
  </style>
