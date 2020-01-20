
require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('customers', require('./components/Customers.vue').default);
Vue.component('customer', require('./components/Customer.vue').default);

const app = new Vue({
    el: '#app',
});
