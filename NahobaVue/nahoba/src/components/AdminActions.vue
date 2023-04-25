<template>
    <div class="row">
        <div class="col d-flex flex-column">
            <div class="col-lg-4-col-md-3 col-sm-12 col-xs-12 d-flex justify-content-around action">
                
<div class="btn btn-primary action-button" data-bs-toggle="modal" data-bs-target="#typeAdd">Add Type</div>
<div class="modal fade" id="typeAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new type</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <VForm @submit="useType().createType">
            <label for="type" class="form-label">New type</label>
            <Field type="text" name="type" id="type" placeholder="Enter the new type" class="form-control" rule="required"/>
            <ErrorMessage name="type" as="div" class="alert alert-danger m-1" />

            <input class="btn-warning btn form-control mt-3" data-bs-dismiss="modal" type="submit" value="Save changes" />
        </VForm>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                <Router-link to="/enabledproducts" class="btn btn-primary action-button">Avaliable products</Router-link>
                <Router-link to="/adminmainpage" class="btn btn-primary action-button">Product waiting list</Router-link>
                <Router-link to="/allusers" class="btn btn-primary action-button">Users</Router-link>
            </div>
        </div>
    </div>
</template>
<script setup>
import {Form as VForm, Field, ErrorMessage} from "vee-validate";
import {useType} from '@/store/TypeStore.js'
import { onMounted } from "vue";

onMounted(useType().allTypes);

</script>
<style scoped>
.action{
    background-color: beige
}
.action-button{
    margin: 3px;
}
</style>