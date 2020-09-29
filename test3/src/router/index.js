import Vue from 'vue';
import VueRouter from 'vue-router';

import PersonList from '../views/person/PersonList.vue';
import PersonView from '../views/person/PersonView.vue';
import PersonNew from '../views/person/PersonNew.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'home',
    component: PersonList,
  },
  {
    path: '/person/:id',
    name: 'person-view',
    component: PersonView,
  },
  {
    path: '/person/new',
    name: 'person-new',
    component: PersonNew,
  },
];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
});

export default router;
