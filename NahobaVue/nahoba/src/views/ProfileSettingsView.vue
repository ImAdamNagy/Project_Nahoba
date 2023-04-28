<script setup>
import NavBar from '../components/NavBar.vue';
import Header from '../components/Header.vue';
import MechanicSettings from '../components/MechanicSettings.vue';
import ProfileSettings from '../components/ProfileSettings.vue';


</script>

<template>
    <NavBar />
    <Header>
        <h1 class="headertitle">Settings</h1>
    </Header>
    <div class="container">
        <ProfileSettings />
        <MechanicSettings />
    </div>
</template>
<style scoped>
.loader{
  height: 400px;
}
.settingtitle {
    position: relative;
    font-size: 30px;
    z-index: 1;
    overflow: hidden;
    text-align: center;
    color: black;
}

.settingtitle:before,
.settingtitle:after {
    position: absolute;
    top: 52%;
    overflow: hidden;
    width: 48%;
    height: 2px;
    content: '\a0';
    background-color: red;
    margin-left: 2%;
}

.settingtitle:before {
    margin-left: -50%;
    text-align: right;
}
</style>