<template>
  <div class="col-lg-4 col-md-6 col-sm-12 mechanics mt-3 ">
    <div class="row">
      <h2 class="grouptitle">Mechanics</h2>
      <div class="col-12 mt-3 " v-for="item in useMechanic().mechanics" :key="item.id">
        <div class="mechanic m-2 h-100">
            <h2>{{ item.user?.firstname }} {{ item.user?.lastname }}</h2>
            <p class="mecprofession">{{ item.profession }}</p>
            <a class="btn btn-warning" @click="$emit('mechDetails', item.id)">More</a>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import { useMechanic } from '../store/MechanicStore.js';
import { onMounted } from 'vue';

onMounted(useMechanic().getMechanics);
</script>
<style scoped>
.mechanic {
  background-color: white;
  padding: 10px;
  border-radius: 20px 0px 20px 0px;
  box-shadow: 10px 1px 20px -2px rgb(22, 22, 22);
}

.mecprofession {
  color: gray;
}
</style>