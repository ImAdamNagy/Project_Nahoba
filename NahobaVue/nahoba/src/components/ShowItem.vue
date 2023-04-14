<script>
export default{
    props:{
        data: Object,
        seller: Object
    }
}
</script>
<template>
    <div class="grid-container">
        <img :src="`/img/${this.data.product_img}`" alt="" class="image img-fluid">
        <h1 class="grid-title">{{ data.product_name }}</h1>
        <div class="price">
            <p><b>Price:</b> {{ data.product_price}}</p>
        </div>
        <div class="seller">
            <p><b>Seller name:</b> {{ seller.firstname }} {{ seller.lastname }}</p>
        </div>
        <div class="location">
            <p><b>Location:</b> {{ data.product_location }}</p>
        </div>
        <div class="desc">
            <p><b>Description:</b> {{ data.product_description}}</p>
        </div>
        <div class="msg">
            <div class="btn btn-warning">Send message</div>
        </div>
    </div>
</template>
<style scoped>
.msg{
    padding: 3px;
    text-align: center;
    margin: auto;
    height: 50%;
}
</style>