import { createRouter, createWebHistory } from 'vue-router';
import Login from './components/Login'
import Calendar from './components/Calendar'

const routes = [
    {
        path: '/',
        component: Calendar,
        name: 'Calendar',
    },
    {
        path: '/login',
        component: Login,
        name: 'Login',
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;