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
        <div class="desc">
            ajfsdpv difv aivnaurnvdurivn druvnunv vadunvaeundvuaendvfjiedv nreufangveirfbgripudbvna ursbgaujfidbg
            ajfsdpv difv aivnaurnvdurivn druvnunv vadunvaeundvuaendvfjiedv nreufangveirfbgripudbvna ursbgaujfidbg
            ajfsdpv difv aivnaurnvdurivn druvnunv vadunvaeundvuaendvfjiedv nreufangveirfbgripudbvna ursbgaujfidbg
            ajfsdpv difv aivnaurnvdurivn druvnunv vadunvaeundvuaendvfjiedv nreufangveirfbgripudbvna ursbgaujfidbg
        </div>
        <div class="info">
            <p>Seller name: {{ seller.firstname }} {{ seller.lastname }}</p>
            <p>Location: {{ data.product_location }}</p>
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
.img{
    text-align: center;
}
.name{
    padding: 3px;
    margin-top: 3%;
    margin-bottom: 3%;
}
</style>