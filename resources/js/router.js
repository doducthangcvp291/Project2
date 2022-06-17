import { createRouter, createWebHistory } from 'vue-router';
import Login from './components/Login.vue'
import Calendar from './components/Calendar.vue'
import Test from './components/Test.vue'

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
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;