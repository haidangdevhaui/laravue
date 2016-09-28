import bootstrap from './bootstrap';

import App from './components/app.vue';

import UserComponent from './components/user/user.vue';
import ListUser from './components/user/list.vue';
import FormUser from './components/user/form.vue';

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';

Vue.use(VueRouter);
Vue.use(VueResource);

const router = new VueRouter();

router.map({
	'/user': {
		name: 'user',
		component: UserComponent,
		subRoutes: {
			'/': {
				name: 'userIndex',
				component: ListUser
			},
			'/create': {
				name: 'userCreate',
				component: FormUser
			},
			'/edit/:uid': {
				name: 'userEdit',
				component: FormUser
			}
		}
	}
})

const app = new Vue({
    el: 'body',
    components: {
    	App
    }
});

router.start(App, '#app')