import Vue from 'vue';
import VueRouter from 'vue-router';
import PersonList from '../views/person/PersonList.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'Home',
    component: PersonList,
  },
];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
});

export default router;
