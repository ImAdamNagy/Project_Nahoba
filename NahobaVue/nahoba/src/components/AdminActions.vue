<template>
  <div class="row mt-3">
    <div class="actionbtn col-lg-3 col-md-4 col-sm-12 col-xs-12">
      <div class="btn  action-button" data-bs-toggle="modal" data-bs-target="#typeAdd">Add Type</div>
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
                  <Field type="text" name="type" id="type" placeholder="Enter the new type" class="form-control"
                    rule="required" />
                  <ErrorMessage name="type" as="div" class="alert alert-danger m-1" />

                  <input class="btn-warning btn form-control mt-3" data-bs-dismiss="modal" type="submit"
                    value="Save changes" />
                </VForm>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger from-control" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="actionbtn col-lg-3 col-md-4 col-sm-12 col-xs-12">
      <Router-link to="/enabledproducts" class="btn action-button">Available products</Router-link>
    </div>
    <div class="actionbtn col-lg-3 col-md-4 col-sm-12 col-xs-12">
      <Router-link to="/adminmain" class="btn  action-button">Product waiting list</Router-link>
    </div>
    <div class="actionbtn col-lg-3 col-md-4 col-sm-12 col-xs-12">
      <Router-link to="/users" class="btn action-button">Users</Router-link>
    </div>
  </div>
</template>
<script setup>
import { Form as VForm, Field, ErrorMessage } from "vee-validate";
import { useType } from '@/store/TypeStore.js'
import { onMounted } from "vue";

onMounted(useType().allTypes);

</script>
<style scoped> 
.action-button{
width: 100%;
margin-top: 5px;
margin-bottom: 5px;
background: linear-gradient(90deg, rgba(241,241,241,1) 0%, rgba(215,211,211,1) 100%);
}
.action-button:hover{
background: linear-gradient(90deg, rgba(240,237,237,1) 0%, rgba(149,149,149,1) 100%);
}
</style>
