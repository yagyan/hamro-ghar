<template>
      <div class="container">
        <div class="row justify-content-center mt-5" v-if='$gate.isAdmin()'>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">User Management</h3>
                      <div class="card-tools">
                          <button class="btn btn-primary" @click="openmodal">Add New <i class="fas fa-user-plus fa-fw"></i></button>
                      </div>
                    </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Modify</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="user in users" :key="user.id">
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.usertype}}</td>
                        <td>
                              <a href="#" @click.prevent="updateuser(user)"> <i class="fa fa-edit blue"></i></a>
                              <a href="#" @click.prevent="deleteuser(user.id)"> <i class="fa fa-trash text-red"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='!editmodal'>Add User</h5>
        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='editmodal'>Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="editmodal?edituser():addUser()">
      <div class="modal-body">
        <!--form -->
            <div class="form-group">
                <label>Name</label>
                <input v-model="form.name" type="text" name="name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                <has-error :form="form" field="name"></has-error>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input v-model="form.email" type="email" name="email"
                class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                <has-error :form="form" field="name"></has-error>
            </div>

             <div class="form-group">
                        <label>User type</label>
                        <select class="form-control input-lg" style="width: 100%;" v-model="form.usertype">
                            <option value="">Select User Type</option>
                            <option v-for="type in types" :key="type.id" :value="type.name">
                                {{ type.name }}</option>


                        </select>
                    </div>
            
            <div class="form-group" v-show="!editmodal">
                <label>Password</label>
                <input v-model="form.password" type="password" name="password"
                class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                <has-error :form="form" field="password"></has-error>

            </div>

            <div class="form-group" v-show="!editmodal">
                  <label>confirm Password</label>
                  <input v-model="form.confirmpassword" type="password" name="confirmpassword"
                  class="form-control" :class="{ 'is-invalid': form.errors.has('confirmpassword') }">
                  <has-error :form="form" field="confirmpassword"></has-error>
              </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" v-show="!editmodal">Save Changes</button>
        <button type="submit" class="btn btn-success" v-show="editmodal">Update User</button>
      </div>
    </form>
    </div>
  </div>
</div>
    </div>
</template>
<script>
    export default {
      data(){
        return{
          users:[],
          types:[],
          editmodal:false,
          avatar:'',

           form: new Form({
            id:'',
            name:'',
            email:'',
            password:'',
            confirmpassword:'',
            usertype:'',
          })
        }
      },
      created(){
        this.loaduser();
        this.loadtypes();
      },
      methods:{
      loaduser(){
        if(this.$gate.isAdmin()){
        axios.get('api/user')
        .then(({data})=>(this.users=data))
        }
      },
       loadtypes() {
                axios.get('api/usertype')
                    .then(({
                        data
                    }) => (this.types = data))
            },

      openmodal(){
        this.editmodal=false;
        this.form.reset();
        $('#Modal').modal('show');

      },
      addUser(){

        this.form.post('api/user')
              .then(({data})=>{
          $('#Modal').modal('hide');
          this.$Progress.start()
          Swal.fire({
            icon: 'success',
            title: 'Update Successful',
            showConfirmButton: false,
            timer: 3000
          })
          this.loaduser();
          this.$Progress.finish()
        })

      },
      deleteuser(id){

        Swal.fire({
          title: 'Are you sure?',
          text: "You Won't Be Able To Revert This!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            axios.delete('api/user/'+id)
            .then(()=>{
            Swal.fire(
              'Deleted!',
              'Your File Has Been Deleted.',
              'Success'

            )
           this.loaduser(); 
          })
          .catch(()=>{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href>Why do I have this issue?</a>'
          })
        })
          }
        })
        
      },

      updateuser(user){
        this.editmodal=true;
        $('#Modal').modal('show');
        this.form.fill(user);
      },

      edituser(){
        this.form.put('/api/user/'+this.form.id)
        .then(()=>{
          this.$Progress.start()
          $('#Modal').modal('hide');
          Swal.fire({
            icon: 'success',
            title: 'User Has Been Successfully Saved',
            showConfirmButton: false,
            timer: 3000
          })
          this.line(this.form.id);
          this.$Progress.finish()
      })
      },

      line(id){
      this.form.get('/api/user/'+id)
        .then(({data})=>(this.users=data.data))
    },

    


    

  }
}
</script>
