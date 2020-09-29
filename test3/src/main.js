import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';

import { ValidationObserver, ValidationProvider, configure, extend, localize } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
import pt_BR from 'vee-validate/dist/locale/pt_BR';
extend('required', required);
localize('pt_BR', pt_BR);
configure({ classes: {invalid: 'is-invalid'}, mode: 'lazy', useConstraintAttrs: false });
Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount('#app');
