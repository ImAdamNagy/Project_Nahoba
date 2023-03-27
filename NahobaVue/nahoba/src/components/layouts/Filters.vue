<template>
<form class="gridfilter">
    <div class="search">
        <input class="form-control" placeholder="Search" type="text">
    </div>
    <div class="button">
        <button class="form-control">Search</button>
    </div>
    <div class="type">
        <select class="form-select">
        <option selected>Select a company...</option>
        <option value="1">One</option>
        </select>
    </div>
    <div class="price">
        <select class="form-select">
        <option selected>Select item type...</option>
        <option value="1">One</option>
        </select>
    </div>
    <div class="location">
        <select class="form-select">
        <option selected>Select item type...</option>
        <option value="1">One</option>
        </select>
    </div>
    
</form>
</template>
<style scoped>
.gridfilter{
    margin:10px;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr ;
  grid-template-rows: 1fr 1fr ;
  grid-template-areas: "search button . ."
  "type price location .";
  column-gap: 20px;
    row-gap: 5px;
}

.button{
    grid-area: button;
    width: 200px;
}
.search{
    grid-area: search;
}
.location{
    grid-area: location;
}
.price{
    grid-area: price;
}
.type{
    grid-area: type;
}

</style>