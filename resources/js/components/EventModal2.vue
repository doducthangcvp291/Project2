<template>
    <div class="modal" :class="show ? 'show' : ''" :style="show ?'display:block;padding-right:17px;' :''"  aria-hidden="true" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Edit Event</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="$emit( 'close')">
                     <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
               <div class="form-groups">
                  <label>Event Name</label>
                  <input type="text" id="event_name" class="form-control" required>
                  <label>Event Time</label>
                  <input type="text" id="event_time" class="form-control" required>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary">Save Change</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
    </div>
</template>
<script>
 export default{
    name: 'Modal2',
    props: {
      show: Boolean,
      save:Function,
      infor:Object,
    },
    data(){
      return{
         title:''
      }
         
    },
    mounted(){
      this.title=''

    }
 }
</script>
<style>
.modal-content{
   background-color: #e6e6e6;
}
</style>