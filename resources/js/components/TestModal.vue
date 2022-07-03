<template>
<h1>Test Modal</h1>
<div>
    <Modal >       
    </Modal>        
        <button @click="handleModalToggle2" type="button" >Open Modal</button>

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
            modalActive: true 
        }
    },
    methods: {
        handleModalToggle2(){
            this.modalActive = !this.modalActive
            console.log(this.modalActive)
            console.log(typeof(this.modalActive))
    },
    }

 }
</script>