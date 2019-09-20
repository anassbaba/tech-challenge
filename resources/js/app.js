import Vue from 'vue'
import VueRouter from 'vue-router'

//Guest components
import Login from './components/guest/Login.vue';
import Register from './components/guest/Register.vue';
import Wall from './components/guest/Wall.vue';

//User components
import ItemALL from './components/user/ItemALL.vue';
import ItemCreate from './components/user/ItemCreate.vue';
import UpdatePassword from './components/user/UpdatePassword.vue';

// Vue.config.productionTip = false

Vue.use(VueRouter)

const routes = [
	//Guest
  	{ path: '/login', component: Login },
  	{ path: '/register', component: Register },
  	{ path: '/wall', component: Wall },

  	//User
  	{ path: '/item-all', component: ItemALL },
  	{ path: '/item-create', component: ItemCreate },
  	{ path: '/update-password', component: UpdatePassword },
]


const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
  router
}).$mount('#app')

