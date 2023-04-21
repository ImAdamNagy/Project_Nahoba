<template>
  <header>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <Router-link class="navbar-brand nav-title navbar-light" to="/"><strong>Nahoba Parts</strong></Router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <Router-link class="nav-link active text-light" to="/productsonly">Products</Router-link>
            </li>
            <li class="nav-item">
              <Router-link class="nav-link active text-light" to="/mechanicsonly">Mechanics</Router-link>
            </li>
            <li class="nav-item" v-if="useAuth().loggedIn">
              <Router-link class="nav-link active text-light" to="/newproduct" >Upload product</Router-link>
            </li>
            <li class="nav-item" v-else>
              <Router-link class="nav-link active text-light" to="/register" @click="newproductAlert">Upload product</Router-link>
            </li>
          </ul>

          <div class="nav-item space" v-if="useAuth().loggedIn">
            <div class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle space mx-3" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                My profile
              </a>
              <ul class="dropdown-menu" id="drop">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><Router-link class="dropdown-item" to="/user">Profile</Router-link></li>
                <li><a class="dropdown-item" href="#">Messages</a></li>
                <div class="dropdown-divider"></div>
                <li><button class="dropdown-item" @click="useAuth().logout">Sign out</button></li>
              </ul>
            </div>
          </div>
          <div class="nav-item space mx-3" v-else>
            <li class="nav-item">
              <Router-link class="nav-link active text-light" to="/login">Login</Router-link>
            </li>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script setup>
import { useAuth } from '@/store/AuthStore';

async function newproductAlert(){
    alert("In order to upload your own product you need to sign in")
}

</script>

<style scoped>

.end {
  margin-right: 100px;
}

li{
  list-style: none;
}

.space {
  margin: 10px;
}

nav {
  background-color: rgba(129, 11, 11, 80%);
  color: white;
  font-size: 20px;
}

.nav-title {
  color: white;
}

.form {
  margin: 10px;
}

.functions {
  margin: 10px;
  color: white;
}

#drop {
  text-align: center;
}</style>