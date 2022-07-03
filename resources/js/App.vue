<template>
   <div id="app">
       <!-- <Login /> -->
       <router-view />

   </div>
   
</template>
<script>
  import Calendar from './components/Calendar.vue'
  import Login from './components/Login.vue'
  import Test from './components/Test.vue'
  import Api from './components/ApiCalling.vue'
  import TestModal from './components/TestModal.vue'

 export default{// su dung Login ???
     components:{
         Calendar,
         Login,
         Test,
         TestModal,
         Api
     }
 }

// export default {
//         name: 'App',
//     }
 
</script>