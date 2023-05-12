<template>
  <div class="gridadminaction mt-3  ">
    <div class="producttype">
      <div class="btn action-button" id="addProductType" data-bs-toggle="modal" data-bs-target="#typeAdd">Add product type</div>
        <div class="modal fade" id="typeAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel modaltitle">Add a new product type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <VForm @submit="useType().createType">
                  <Field type="text" name="type" id="type" placeholder="Enter the new type" class="form-control" rules="required" />
                  <ErrorMessage name="type" as="div" class="alert alert-danger m-1" />
                  <input class="btn-warning btn form-control mt-3" id="typeSubmit" data-bs-dismiss="modal" type="submit" value="Add" />
                </VForm>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger from-control" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="cartype">
      <div class="btn action-button" id="addProductCarType" data-bs-toggle="modal" data-bs-target="#carTypeAdd">Add car type</div>
        <div class="modal fade" id="carTypeAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add a new car type</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <VForm @submit="useCarType().addCarType">
                  <Field type="text" name="name" id="name" placeholder="Enter the new car type" class="form-control mt-1" rules="required" />
                  <ErrorMessage name="name" as="div" class="alert alert-danger m-1" />
                  <Field type="number" name="year" id="year" placeholder="Enter the car types year" class="form-control mt-1" rules="required|numeric|between:1886,2023" />
                  <ErrorMessage name="year" as="div" class="alert alert-danger m-1" />
                  <input class="btn-warning btn form-control mt-3" id="cartypeSubmit" data-bs-dismiss="modal" type="submit" :value="t('TypeForm.Add')" />
                </VForm>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger from-control" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="availableproduct">
      <Router-link to="/enabledproducts" class="btn action-button">Available products</Router-link>
    </div>
    <div class="waitinglist">
      <Router-link to="/adminmain" class="btn  action-button">Product waiting list</Router-link>
    </div>
    <div class="userstable">
      <Router-link to="/users" class="btn action-button">Users</Router-link>
    </div>
  </div>
</template>
<script setup>
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { useType } from '@/store/TypeStore.js';
import { useCarType } from '@/store/CarTypeStore.js';
import { onMounted } from "vue";
import {useI18n} from 'vue-i18n'

const { t } = useI18n()

onMounted(useType().allTypes);

</script>
<style scoped> 
.action-button{
width: 100%;
background: linear-gradient(90deg, rgba(241,241,241,1) 0%, rgba(215,211,211,1) 100%);
}
.action-button:hover{
background: linear-gradient(90deg, rgba(240,237,237,1) 0%, rgba(149,149,149,1) 100%);
}
</style>
