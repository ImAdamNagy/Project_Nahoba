<template>
<VForm class="gridfilter" @submit="values=>$emit('filter',values)">
    <div class="search">
        <input class="form-control" placeholder="Search" type="text">
    </div>
    <div class="button">
        <button class="form-control">Search</button>
    </div>
    <div class="type">
        <Field class="form-select" id="typesFilter" name="typesFilter" as="select">
        <option selected>Select item type...</option>
        <option  v-for="item in useType().types" :key="item.id" :value="item.id">{{ item.type }}</option>
        </Field>
    </div>
    <div class="price">
        <select class="form-select">
        <option selected>Select item type...</option>
        <option value="1">One</option>
        </select>
    </div>
    <div class="location">
        <select class="form-select">
        <option selected>Select item type...</option>
        <option value="1">One</option>
        </select>
    </div>
</VForm>
</template>
<script setup>
import { useType } from '../store/TypeStore';
import {Form as VForm, Field, ErrorMessage} from "vee-validate";
import { onMounted } from 'vue';

onMounted(useType().allTypes);
const emit = defineEmits(['filter']);

</script>
<style scoped>
.gridfilter{
    margin:10px;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr ;
  grid-template-rows: 1fr 1fr ;
  grid-template-areas: "search button . ."
  "type price location .";
  column-gap: 20px;
    row-gap: 5px;
}

.button{
    grid-area: button;
    width: 200px;
}
.search{
    grid-area: search;
}
.location{
    grid-area: location;
}
.price{
    grid-area: price;
}
.type{
    grid-area: type;
}

</style>