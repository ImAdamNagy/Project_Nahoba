<script setup>
import UserProfile from '../components/UserProfile.vue'
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import {http} from '@/utils/http.mjs';
import {reactive, onMounted} from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const own = reactive({
    productdata: {},
    helper: ""
});
const userData = reactive({
    user: {}
});

const itemData = reactive({
    id: null,
    typeId: null
});

async function getCurrentItemIdAndTypeId(currentId, currentTypeId){
    itemData.id = currentId;
    itemData.typeId = currentTypeId;
}

async function user() {
    const response = await http.get('/user/' + localStorage.getItem("userid"))
    userData.user = response.data.data;
}
onMounted(user);

async function getOwnProducts(){
    const response = await http.get('/products/userproducts/' + localStorage.getItem("userid"),{
                headers: { Authorization: `Bearer ${localStorage.getItem('token')}`}
        });
    own.productdata = response.data.data;
}
onMounted(getOwnProducts);

async function update(updatedproduct) {
    updatedproduct.seller_id = localStorage.getItem("userid");
    updatedproduct.types_id = itemData.typeId;
    updatedproduct.product_enable = false;
    const response = await http.patch('/products/' + itemData.id, updatedproduct, {
        headers: { Authorization: `Bearer ${localStorage.getItem('token')}` }
    });
    alert("Your changes has been sent to the admin for validation. You may close this window.")
    
    router.push({ name: "UserProfile" });
}

</script>

<template>
    <NavBar />
    <Header><h1>Your Profile</h1></Header>
    <div class="container-fluid">
            <UserProfile :productdata="own.productdata" :user="userData.user" @update='update' @getCurrentItemIdAndTypeId="getCurrentItemIdAndTypeId"/>
    </div>
</template>
<style scoped>
h1{
    color:white;
    margin-left: 5%;
    font-size: 300%;
    align-self: center;
}
</style>