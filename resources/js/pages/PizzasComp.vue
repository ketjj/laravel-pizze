<template>
<div>
  <PizzaItem v-for="pizza in pizzas"
  :key="pizza.id"
  :pizza = 'pizza'
  />

</div>

</template>

<script>
import PizzaItem from '../components/partials/PizzaItem.vue';

export default {
  name: 'PizzasComp',
  components:{
    PizzaItem
  }, 

  data(){
    return{
      apiUrl: '/api/pizzas/',
      pizzas: null
    }
  },
  methods:{
    getApi(){
      axios.get(this.apiUrl)
        .then(res =>{
          this.pizzas = res.data;
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