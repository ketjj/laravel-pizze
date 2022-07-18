<template>
<header>
  <nav class="container" >
    <ul class="d-flex justify-content-end">
      <li class="list-unstyled"><router-link :to="{name: 'home'}">Home</router-link></li>
      <li class="list-unstyled"><router-link :to="{name: 'about'}">Chi siamo</router-link></li>
      <li class="list-unstyled"><router-link :to="{name: 'pizzas'}">Le nostre pizze</router-link></li>

    </ul>
  </nav>
</header>
  
</template>

<script>


export default {
 name: 'HeaderComp',
}
</script>

<style lang="scss" scoped>
header{
  height: 70px;
  background-color: rgb(255, 176, 176);
  nav{
    height: 100%;
  }
  ul{
    margin-block-start: 0;
    margin-block-end: 0;
    padding-inline-start: 0;
    line-height: 70px;
    li{
      margin: 0 20px 0 20px;
       a{
        text-decoration: none;
        color:white;
        &.router-link-exact-active{
          color: rgb(251, 90, 90);
        }
    }
  }

}
}

</style>