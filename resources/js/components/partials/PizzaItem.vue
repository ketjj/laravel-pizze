<template>
<div class="my-4">
  <div class="h4">{{pizza.name}}</div>
  <span>Prezzo: {{pizza.price}}</span>

  <div>Vegeratiana: {{pizza.isVegetarian === 1 ? 'Si' : 'No'}}</div>
</div>
  
</template>

<script>
export default {
 name: 'PizzaItem',
 props:{
  pizza: Object
 }
}
</script>

<style>

</style>