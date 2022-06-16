<template>
   <div id="app">
       <!-- <Login /> -->
       <router-view />

   </div>
   <router-view />
</template>
<script>
  import Calendar from './components/Calendar.vue';
  import Login from './components/Login.vue';

 export default{// su dung Login ???
     components:{
         Calendar,
         Login
     }
 }

// export default {
//         name: 'App',
//     }
 
</script>