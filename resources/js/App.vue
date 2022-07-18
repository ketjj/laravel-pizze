<template>
<div>
  <HeaderComp />
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

<style>

</style>