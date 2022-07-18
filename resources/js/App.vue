<template>
<div>
  <HeaderComp />
    <main class="container">
      <router-view></router-view>
      <!-- <div 
      v-for="pizza in pizzas"
      :key="pizza.id"
      >{{pizza.name}}</div> -->
    </main>
  <FooterComp />
</div>
  
</template>

<script>

import HeaderComp from './components/partials/HeaderComp.vue'
import FooterComp from './components/partials/FooterComp.vue'

export default {
  name: 'App',
  components:{
    HeaderComp,
    FooterComp
  },

  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/pizzas',
      pizzas: null
    }
  },

  methods: {
    getApi(){
     axios.get(this.apiUrl)
     .then(res =>{
      this.pizzas= res.data;
      console.log(this.pizzas);
     })
    }
  },

  mounted(){
    this.getApi();
  }
}
</script>

<style lang="scss" scoped >
 main{
  min-height:calc(100vh - 140px);
  padding: 50px 0;
 }

</style>