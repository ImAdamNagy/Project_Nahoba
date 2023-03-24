<script>
import {http} from '../../utils/http.mjs'

export default{
    data(){
        return{
            data: {},
        }
    },
    methods:{
        async getItem(){
            const response = await http.get("product/" + localStorage.getItem("id"));
            this.data = response.data.data;
            console.log(this.data);
        }
    },
    mounted(){
        this.getItem();
    }
}

</script>
<template>

<div class="row content">
    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-2 img">
        <img :src="`../img/${this.data.product_img}`" class="img-fluid"/>
    </div>
    <div class="col-lg-5 col-md-6 col-sm-6 col-xs-2 name">
        <h1>{{this.data.product_name}}</h1>
        <div class="col-lg-6">
            {{this.data.product_description}}
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-4 msg btn btn-warning">
        Send message
    </div>
</div>

</template>
<style scoped>
.msg{
    padding: 3px;
    text-align: center;
    width: 30%;
    margin: auto;
}
.img{
    text-align: center;
    padding: 3px;
    margin-top: 2%;
    margin-bottom: 2%;
}
img{
    border-radius: 10px;
}
.name{
    padding: 3px;
    margin-top: 3%;
    margin-bottom: 3%;
}
.content{
    margin: auto;
    background-color: rgb(63, 173, 159);
    border: 3px solid white;
    border-radius: 10px;
    padding: 10px;
}
</style>