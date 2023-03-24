<template>
<div class="row">

      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" v-for="item in this.allProducts">
        <div class="card">
          <img :src="`../img/${item.product_img}`" alt="">
          <div class="card-body text">
            <h5 class="card-title">{{item.product_name}}</h5>
            <p class="card-text">
              {{item.product_price}} Ft
              <a class="btn btn-warning" @click="details(item.id)">More</a>
            </p>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
import {http} from '../../utils/http.mjs';
import {router} from '../../router/index.js'

export default{
    data(){
        return{
           allProducts: {}
        }
    },
    methods:{
      async products(){
        const response = await http.get('products');
        this.allProducts = response.data.data;
        console.log(this.allProducts);
      },
      details(id){
        router.push({name: "ProductDetails"});
        localStorage.setItem("id", id);
      }
    },
    mounted(){
      this.products();
    }
  }
</script>

<style scoped>
.card{
    background-color: white;
    border: 2px solid white;
    font-weight: bold;
    margin: 5px;
    margin-bottom: 10px;
}
.text{
    border-top: 2px solid white;
}
img{
  height: 150px;
}
</style>