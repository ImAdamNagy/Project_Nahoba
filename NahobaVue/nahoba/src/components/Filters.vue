<template>
    <VForm class="gridfilter" @submit="Filter">
        <div class="search">
            <Field class="form-control" id="search" placeholder="Search:" name="search" type="text" />
        </div>
        <div class="button">
            <button class="btn btn-light form-control">Search</button>
        </div>
        <div class="cartype">
            <Field name="carTypesFilter" id="carTypesFilter"  class="form-select" :value="0" as="select">
                    <option :value="0">All cartype</option>
                    <option  v-for="item in useCarType().cartypes" :key="item.id" :value="item.id"> {{ item.name }} {{ item.year }}</option>
                </Field>
        </div>
        <div class="type">
            <Field class="form-select" id="typesFilter" name="typesFilter" :value="0" as="select">
                <option :value="0">All type</option>
                <option v-for="item in useType().types" :key="item.id" :value="item.id">{{ item.type }}</option>
            </Field>
        </div>
        <div class="pricemin">
            <Field type="number" class="form-control" id="priceMinFilter" placeholder="Minimum price:"
                name="priceMinFilter" />
        </div>
        <div class="pricemax">
            <Field type="number" class="form-control" id="priceMaxFilter" placeholder="Maximum price:"
                name="priceMaxFilter" />
        </div>
    </VForm>
</template>
<script setup>
import { useType } from '../store/TypeStore';
import { useProduct } from '../store/ProductStore';
import { Form as VForm, Field } from "vee-validate";
import { onMounted } from 'vue';
import {useCarType} from '@/store/CarTypeStore.js'

onMounted(async function (){
    useCarType().allCarTypes();
    useType().allTypes();
});

function Filter(filters) {
    useProduct().filters.search = filters.search ?? null;
    useProduct().filters.typesFilter = filters.typesFilter;
    useProduct().filters.carTypesFilter = filters.carTypesFilter;
    useProduct().filters.priceMinFilter = filters.priceMinFilter ?? null;
    useProduct().filters.priceMaxFilter = filters.priceMaxFilter ?? null;
}

</script>
<style scoped>
.btn:hover {
    background-image: radial-gradient(180deg, grey 0%, white 80%);
}
</style>