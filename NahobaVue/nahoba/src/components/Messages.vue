<template>
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 p-3">
        <div class="box" v-if="useMsg().getMsgLoading == false">
            <p class="" v-for="item in useMsg().messages">
                {{ item.message }}
            </p>
        </div>
    </div>
</template>
<script setup>
import {useMsg} from '@/store/MessageStore.js'

</script>