<template>
  <div class="col-lg-8 col-md-6 col-sm-12 mt-3">
    <div class="row">
      <h2 class="grouptitle">{{ t("NavBar.NavProducts") }}</h2>
      <div class="col scrollproducts">
        <div class="row">
          <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mt-3" v-for="item in useProduct().enableProducts" :key="item.id">
          <div class="product h-100">
            <img :src="useProduct().getImage(item.product_img)" alt="" class="mainproductscardimg">
            <h5 class="title mt-2">{{ item.product_name }}</h5>
            <p class="price">{{ item.product_price }} {{ t("ProductInfo.Huf") }}</p>
            <div id="name" class="d-flex flex-sm-row flex-column justify-content-between">
              <p class="cartype" id="cartype">{{ item.car_type.name }} {{ item.car_type.vintage }}</p>
              <p class="type" id="type">{{ item.type.type }}</p>
            </div>
            <a class="btn btn-warning productMore" @click="$emit('details', item.id)">{{ t("CardActions.ItemsMore") }}</a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { useProduct } from '../store/ProductStore.js';
import { useI18n } from 'vue-i18n'

const { t } = useI18n()
const emit = defineEmits(["details"]);

</script>
    
<style scoped>
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