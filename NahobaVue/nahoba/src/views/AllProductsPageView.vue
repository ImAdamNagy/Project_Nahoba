<template>
<NavBar />
<Header><h1>All Products</h1></Header>
<div class="container-fluid">
<Filters @filter="values=>filters=values"/>
<Items @details="details" :allProducts="FilteredProducts"/>
</div>
</template>

<script >
import Filters from '../components/Filters.vue'
import Items from '../components/Items.vue'
import Header from '../components/Header.vue'
import NavBar from '../components/NavBar.vue'
import {http} from '../utils/http.mjs';
import {router} from '../router/index.js'

export default{
    components:{
        Filters,
        Items,
        Header,
        NavBar
    },
    data(){
        return{
            allProducts: [],
            filters: null
        }
    },
    computed:{
        FilteredProducts(){
            if (this.filters == null) {
                return this.allProducts;
            }
            return this.allProducts.filter(product=>{return product.type.id == this.filters.typesFilter})
        }
    },
    methods:{
      async products(){
        const response = await http.get('products/enable');
        this.allProducts = response.data.data;
      },
      details(id){
        router.push({name: "ProductDetails"});
      }
    },
    mounted(){
      this.products();
    }
  }
</script>
<style scoped>

h1{
    color:white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
</style>