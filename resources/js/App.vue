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
  import Test from './components/Test.vue'

 export default{// su dung Login ???
     components:{
         Calendar,
         Login,
         Test
     }
 }

// export default {
//         name: 'App',
//     }
 
</script>