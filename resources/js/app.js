
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import App from './App'
import routes from './routes'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes,
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app-header', require('./components/layout/Header.vue').default);

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
});
