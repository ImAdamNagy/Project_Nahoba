<template>
  <header>
          <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <Router-link class="navbar-brand nav-title" to="/">Nahoba Parts</Router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <div class="row">
                <form class="d-flex form col-lg-12 col-md-6 col-sm-5" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                  </form>
            </div>
          
        </ul>
        <div class="nav-item space">
          <Router-link class="nav-link" to="">Likes</Router-link>
        </div>
        <div class="nav-item space">
          <div class="nav-item ">
            <Router-link class="nav-link" to="">Cart</Router-link>
          </div>
        </div>
        <div class="nav-item space">
          <div class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle end" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              My profile
            </a>
            <ul class="dropdown-menu" id="drop">
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">My products</a></li>
              <li><a class="dropdown-item" href="#">Messages</a></li>
              <div class="dropdown-divider"></div>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  </header>

</template>

<style scoped>
@media screen and (max-width: 991px) {
  .navbar-collapse{
  background-image: url("../img/sales1.jpg");
  background-repeat: no;
}
}

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
.form{
    margin: 10px;
}
.nav-title{
    border: 2px solid white;
    border-radius: 10px;
}
.functions{
    margin: 10px;
    color: white;
}
#drop{
  text-align: center;
}
</style>