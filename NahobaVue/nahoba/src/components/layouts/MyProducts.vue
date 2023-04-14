<template>
<div class="row">
      <div class="col col-lg-3 col-md-4 col-sm-6 col-xs-12" v-for="item in props.data">
        <div class="product h-100">
          <img :src="`/img/${item.product_img}`" alt="" class="img-fluid">
            <h5 class="title">{{item.product_name}}</h5>
            <p class="price">{{item.product_price}} Ft</p>
            <a class="btn btn-warning" @click="details(item.id)">More</a>
        </div>
      </div>
  </div>
</template>
<script setup>
import { defineProps } from "vue";

const props = defineProps({
    data: Object
});
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
.col{
  margin-top: 10px;
}
img{
  width: 100%;
  border-radius: 20px 0px 20px 0px;
}


</style>