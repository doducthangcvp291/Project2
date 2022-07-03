<template>
<h1>Test Modal</h1>
<button type="button" class="btn btn-primary" @click="showModal=!showModal">Open Modal</button>
<div>
    <modal v-if="showModal" :show="showModal" :save="addevent" @close="showModal=false" />
    

</div>
</template>
<script>

import Modal from './EventModal.vue'
 export default {
    name: 'TestModal',
    components: {        
        Modal
    },
    data: function() {
        return {
            showModal: false,
            events: {infor:''},
            calendar:{

            }
        }
    },
    methods: {
        addevent(){

        }
    }

 }
</script>