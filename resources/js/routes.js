import Vue from 'vue'
import VueRouter from 'vue-router'
import task from './components/Task.vue'
import user from './components/User.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    // mode: 'history',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'task',
            component: task,
        },
        {
            path: '/user',
            name: 'user',
            component: user,
        }
    ]
})
export default router