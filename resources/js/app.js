//require('./bootstrap');

// Vue.component('Login', require('./components/Login'));
// Vue.component('Calendar', require('./components/Calendar'));


import { createApp } from 'vue';
//import App from './components/App';
//import Vue from 'vue';
//import VueRouter from 'vue-router';

import router from './route';

import App from './App.vue';



// và cuối cùng là tạo 1 instance Vue và render tại phần tử có id là app,
// render tại component App và dùng router đã khai báo ở trên
// const app = new Vue({
//     el: '#app',
//     render: h => h(App),
//     router
// });

createApp(App).use(router).mount("#app");