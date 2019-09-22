import Vue from 'vue'
import VueRouter from 'vue-router'

import { store } from './store';

//Guest components
import Login from './components/guest/Login.vue';
import Register from './components/guest/Register.vue';
import Wall from './components/guest/Wall.vue';

//User components
import ItemALL from './components/user/ItemALL.vue';
import ItemCreate from './components/user/ItemCreate.vue';
import UpdatePassword from './components/user/UpdatePassword.vue';
import Logout from './components/user/Logout.vue';

//Other components
import Menu from './components/Menu.vue';

window.axios = require('axios');
window.axios.defaults.headers.common = {
    'Accept': 'application/json',
    'X-CSRF-TOKEN': window.csrf_token
};

Vue.component('menu-component', Menu)
// Vue.config.productionTip = false

Vue.use(VueRouter)

const routes = [
	  
    //Guest
    { path: '/', redirect: '/wall',},
  	{ path: '/login', component: Login, meta: { guest: true} },
  	{ path: '/register', component: Register, meta: { guest: true}},
  	{ path: '/wall', component: Wall, meta: { public: true}},

  	//User
  	{ path: '/item-all', component: ItemALL, meta: { requiresLogin: true} },
  	{ path: '/item-create', component: ItemCreate, meta: { requiresLogin: true} },
    { path: '/update-password', component: UpdatePassword, meta: { requiresLogin: true} },
  	{ path: '/logout', component: Logout, meta: { requiresLogin: true} },
]


const router = new VueRouter({
  history: true,
  pathToRegexpOptions: { strict: true } ,
  routes // short for `routes: routes`
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.public)) {
    window.axios.get('dynamic/user-details').then(response => {
    if (response.data != 0) {
      store.commit("UPDATE_USER_LOGGIN", true);
      next();
    } else {
      next();
    }
  })
  } else {
    next();
  }
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.guest)) {
    window.axios.get('dynamic/user-details').then(response => {
    if (response.data != 0) {
      next({
        path: '/item-all',
        query: {
          redirect: to.fullPath,
        },
      });
    } else {
      store.commit("UPDATE_USER_LOGGIN", false);
      next();
    }
  })
  } else {
    next();
  }
})

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresLogin)) {
    window.axios.get('dynamic/user-details').then(response => {
    if (response.data == 0) {
      next({
        path: '/login',
        query: {
          redirect: to.fullPath,
        },
      });
    } else {
      store.commit("UPDATE_USER_LOGGIN", true);
      next();
    }
  })
  } else {
    next();
  }
})

const app = new Vue({
  store,
  router
}).$mount('#app')

