import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
import HomeComp from './pages/HomeComp'
import PizzasComp from './pages/PizzasComp'
import AboutComp from './pages/AboutComp'

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeComp
    },
    {
      path: '/pizzas',
      name: 'pizzas',
      component: PizzasComp
    },
    {
      path: '/chi-siamo',
      name: 'about',
      component: AboutComp
    }

  ]
});

export default router;