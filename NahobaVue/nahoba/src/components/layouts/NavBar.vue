<template>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand nav-title" href="#">Nahoba Parts</a>
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
          <a class="nav-link" href="#">Likes</a>
        </div>
        <div class="nav-item space">
          <div class="nav-item ">
            <a class="nav-link" href="#">Cart</a>
          </div>
        </div>
        <div class="nav-item space">
          <div class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle end" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              My profile
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.end{
    margin-right: 100px;
}
.space{
    margin: 10px;
}
nav{
    background-image: linear-gradient( rgb(156, 15, 15) 90%,black);
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
</style>