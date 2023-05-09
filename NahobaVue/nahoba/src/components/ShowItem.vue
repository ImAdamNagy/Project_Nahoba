<script setup>
import { onMounted } from 'vue'
import { useProduct } from '@/store/ProductStore.js'
import { useChat } from '@/store/ChatStore.js'
import {useAuth} from '@/store/AuthStore.js'
import { useRouter } from 'vue-router';

const router = useRouter();

onMounted(useProduct().getProduct);

async function sendMessage(){
    await useChat().createNewChat(useProduct().Product.seller?.userid);
    router.push({name: "MessagesPage"});
}

</script>
<template>
    <div class="grid-container" v-if="useProduct().productIsLoading == false">
        <div class="gridimg">
            <img data-bs-toggle="modal" data-bs-target="#exampleModal" :src="useProduct().getImage(useProduct().Product.product_img)" :alt="`${useProduct().Product.product_img}`" class="image">
        </div>
        <h1 class="grid-title">{{ useProduct().Product.product_name }}</h1>
        <div class="price">
            <p><b>Price: </b>{{ useProduct().Product.product_price }}</p>
        </div>
        <div class="cartype">
            <p><b>Car type: </b>{{ useProduct().Product.car_type.name }} {{ useProduct().Product.car_type.vintage }}</p>
        </div>
        <div class="seller">
            <p><b>Seller name: </b>{{ useProduct().Product.seller?.firstname }} {{ useProduct().Product.seller?.lastname }}
            </p>
            <Router-link :to="`/OtherUserProducts/` + useProduct().Product.seller?.userid"><b>Seller's other
                    products</b></Router-link>
        </div>
        <div class="location">
            <p><b>Location: </b>{{ useProduct().Product.product_location }}</p>
        </div>
        <div class="desc">
            <p><b>Description: </b>{{ useProduct().Product.product_description }}</p>
        </div>
        <div class="msg" v-if="useAuth().loggedIn && useAuth().userid != useProduct().Product.seller?.userid">
            <div class="btn btn-warning sendmsglog" @click="sendMessage">Send message
            </div>
        </div>
        <div class="msg" v-else-if="useAuth().userid == useProduct().Product.seller?.userid">
        </div>
        <div class="msg" v-else>
            <Router-link to="/login" class="btn btn-warning sendmsg">Send message
            </Router-link>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <img class="img-fluid" :src="useProduct().getImage(useProduct().Product.product_img)" :alt="`${useProduct().Product.product_img}`">
                </div>
            </div>
        </div>
    </div>
    <div class="loader" v-else>
        <svg class="car" width="102" height="40" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(2 1)" stroke="white" fill="none" fill-rule="evenodd" stroke-linecap="round"
                stroke-linejoin="round">
                <path class="car__body"
                    d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01"
                    stroke-width="3" />
                <ellipse class="car__wheel--left" stroke-width="3.2" fill="#FFF" cx="83.493" cy="30.25" rx="6.922"
                    ry="6.808" />
                <ellipse class="car__wheel--right" stroke-width="3.2" fill="#FFF" cx="46.511" cy="30.25" rx="6.922"
                    ry="6.808" />
                <path class="car__line car__line--top" d="M22.5 16.5H2.475" stroke-width="3" />
                <path class="car__line car__line--middle" d="M20.5 23.5H.4755" stroke-width="3" />
                <path class="car__line car__line--bottom" d="M25.5 9.5h-19" stroke-width="3" />
            </g>
        </svg>
    </div>
</template>
<style scoped>
.loader {
    height: 400px;
}

.msg{
    padding: 3px;
    text-align: center;
    margin: auto;
    height: 50%;
}
</style>