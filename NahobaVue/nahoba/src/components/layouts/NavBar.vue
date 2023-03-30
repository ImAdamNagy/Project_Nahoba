<template>
  <header>
    <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <Router-link class="navbar-brand nav-title navbar-light" to="/">Nahoba Parts</Router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <Router-link class="nav-link active text-light" to="/">Mechanics</Router-link>
        </li>
        </ul>
        <slot />
      </div>
    </div>
  </nav>
  </header>

</template>

<style scoped>
.end{
    margin-right: 100px;
}
.space{
    margin: 10px;
}
nav{
    background-color: rgba(129, 11, 11, 80%);
    color: white;
    font-size: 20px;
}
.nav-title{
color:white;
}
.form{
    margin: 10px;
}
.functions{
    margin: 10px;
    color: white;
}
#drop{
  text-align: center;
}

</style>