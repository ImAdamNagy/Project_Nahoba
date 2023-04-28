<template>
  <div class="row" v-if="useProduct().FilteredProducts.length > 0 && useProduct().enableProductsIsLoading == false">
    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 mt-3" v-for="item in useProduct().FilteredProducts">
      <div class="product h-100">
        <img :src="useProduct().getImage(item.product_img)" class="productsonlycardimg" alt="...">
        <h5 class="title">{{ item.product_name }}</h5>
        <p class="price">{{ item.product_price }} Ft</p>
        <p class="cartype">{{ item.car_type.name }} {{ item.car_type.vintage }}</p>
        <a class="btn btn-warning" @click="$emit('details', item.id)">More</a>
      </div>
    </div>
  </div>
  <div class="row" v-else-if="useProduct().FilteredProducts.length == 0 && useProduct().enableProductsIsLoading == false">
    <p class="loadingmsg">No available products!</p>
  </div>
  <div class="loader" v-else-if="useProduct().enableProductsIsLoading == true">
    <svg class="car" width="102" height="40" xmlns="http://www.w3.org/2000/svg">
      <g transform="translate(2 1)" stroke="white" fill="none" fill-rule="evenodd" stroke-linecap="round"
        stroke-linejoin="round">
        <path class="car__body"
          d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01"
          stroke-width="3" />
        <ellipse class="car__wheel--left" stroke-width="3.2" fill="#FFF" cx="83.493" cy="30.25" rx="6.922" ry="6.808" />
        <ellipse class="car__wheel--right" stroke-width="3.2" fill="#FFF" cx="46.511" cy="30.25" rx="6.922" ry="6.808" />
        <path class="car__line car__line--top" d="M22.5 16.5H2.475" stroke-width="3" />
        <path class="car__line car__line--middle" d="M20.5 23.5H.4755" stroke-width="3" />
        <path class="car__line car__line--bottom" d="M25.5 9.5h-19" stroke-width="3" />
      </g>
    </svg>
  </div>
</template>
<script setup>
import { useProduct } from '../store/ProductStore.js';
import { onMounted } from 'vue';

onMounted(useProduct().getEnabledProducts);
</script>

<style scoped>
.loader{
  height: 400px;
}
.product {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  background-color: white;
  padding: 10px;
  font-weight: bold;
  border-radius: 20px 0px 20px 0px;
  box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
}

</style>