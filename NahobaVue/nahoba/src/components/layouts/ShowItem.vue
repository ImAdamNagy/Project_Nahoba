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
    <div class="grid-container">
        <img :src="`/img/${this.data.product_img}`" alt="" class="image img-fluid">
        <h1 class="grid-title">{{ this.data.product_name }}</h1>
        <div class="desc">
            ajfsdpv difv aivnaurnvdurivn druvnunv vadunvaeundvuaendvfjiedv nreufangveirfbgripudbvna ursbgaujfidbg
            ajfsdpv difv aivnaurnvdurivn druvnunv vadunvaeundvuaendvfjiedv nreufangveirfbgripudbvna ursbgaujfidbg
            ajfsdpv difv aivnaurnvdurivn druvnunv vadunvaeundvuaendvfjiedv nreufangveirfbgripudbvna ursbgaujfidbg
            ajfsdpv difv aivnaurnvdurivn druvnunv vadunvaeundvuaendvfjiedv nreufangveirfbgripudbvna ursbgaujfidbg
        </div>
        <div class="loc">
            Budapest 18.
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
    padding: 3px;
    margin-top: 2%;
    margin-bottom: 2%;
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