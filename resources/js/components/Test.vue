<template>
    <div class="apiTest container mt-5">
        <h1>Create User</h1>
        <div class="form-group">
            <label>Name</label>
            <input v-model="user.name" type="text" class="form-control" placeholder="Name...">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input v-model="user.email" type="text" class="form-control" placeholder="Email...">
        </div>
        <button class="btn btn-primary" @click="addUserT">Create</button>
    </div>
</template>
<script>
export default {
    name: 'Test',
    data: function() {
        return {
            user: {
                name:"",
                email:""
            }
        }
    },
    method: {
        addUserT(){
            axios.post('api/users/store',{
                user: this.user

            })
            .then( response => {
                if (response.status == 201 ){
                    this.user.name == "";
                    this.user.email =="";
                }
            })
            .catch(error => {
                console.log( error );
            })

        }
    }
}
</script>