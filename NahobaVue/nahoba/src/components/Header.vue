<script setup>
</script>
<template>
    <header>
         <div>
            <slot />
         </div>
    </header>
</template>
<style scoped>
div{
    background-image: url(/img/porsche.jpg);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    background-color: #444;
    background-blend-mode: multiply;
    height: 250px;
    display: flex;
}
</style>