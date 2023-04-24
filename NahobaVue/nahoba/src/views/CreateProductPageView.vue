<template>
    <NavBar />
<div class="container-fluid">
    <CreateItem  @onChange="onChange" />
</div>

</template>
<script setup>
import NavBar from '@/components/NavBar.vue';
import CreateItem from '../components/CreateItem.vue'
import { reactive } from 'vue';


const file = reactive({
    image: null
});

async function onChange(item){
            console.log("selected file", item);
            file.image = item.target.files[0];
}

</script>
<style scoped>
.container{
    width: 700px;
}
form{
    text-align: center;
    border: solid black 2px;
    border-radius: 5px;
    margin-top: 20px;
}
button{
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>