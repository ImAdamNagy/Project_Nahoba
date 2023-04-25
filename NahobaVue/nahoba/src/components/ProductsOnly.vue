<template>
<div class="row" v-if="useProduct().EnableProducts.length > 0">
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-3 " v-for="item in useProduct().FilteredProducts">
            <div class="product h-100">
              <img :src="`http://localhost:8881/images/${item.product_img}`" alt="" class="img-fluid">
                <h5 class="title">{{item.product_name}}</h5>
                <p class="price">{{item.product_price}} Ft</p>
                <a class="btn btn-warning" @click="$emit('details', item.id)">More</a>
            </div>
          </div>
</div>
<div class="row mx-auto py-4 rounded rounded-5 px-3" v-else>
    <div class="col-12">
            <h3 class="loadingmsg">Nothing Found</h3>
    </div>
</div>

</template>
<script setup>
import { useProduct } from '../store/ProductStore';
import { onMounted } from 'vue';

onMounted(useProduct().getEnabledProducts);
</script>

<style scoped>

.mechanics{
  border-left: 1px solid white;
}
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