<script setup>
import NavBar from './NavBar.vue';
</script>
<template>
    <header>
          <NavBar />
        <div>
            <slot />
        </div>
    </header>
</template>
<style scoped>
header{
    background-image: url(../../../public/img/porsche.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-color: #444;
    background-blend-mode: multiply;
    height: 250px;
}

</style>