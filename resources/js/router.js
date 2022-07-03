import { createRouter, createWebHistory } from 'vue-router';
import Login from './components/Login.vue'
import Calendar from './components/Calendar.vue'
import Test from './components/Test.vue'
import TestModal from './components/TestModal.vue'

import Api from './components/ApiCalling.vue'

const routes = [
    {
        path: '/',
        component: Calendar
        
    },
    {
        path: '/login',
        component: Login
        
    },
    {
        path: '/thang',
        component: Test
    },
    {
        path: '/modal',
        component: TestModal
    },
    {
        path:'/callingapi',
        component: Api
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;