<template>

<NavBar />
<div class="container">
    <ShowItem :data="data" :seller="seller" />
</div>


</template>

<script>
import ShowItem from '../components/layouts/ShowItem.vue'
import NavBar from '../components/layouts/NavBar.vue'
import {http} from '../utils/http.mjs'

export default{
    data(){
        return{
            data: {},
            seller: {}
        }
    },
    components:{
        NavBar,
        ShowItem
    },
    methods:{
        async getItem(){
                const response = await http.get("product/" + localStorage.getItem("id"));
                this.data = response.data.data;
                this.getSeller();
            },
        async getSeller(){
            const response = await http.get("user/" + this.data.seller_id);
            this.seller = response.data.data;
            console.log(this.seller);
        }
    },
    mounted(){
        this.getItem();
    }
}
    

</script>
<style scoped>
.container{
    width: 100%;
    height: 100%;
    margin-top: 5%;
}
</style>