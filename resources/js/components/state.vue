<template>
      <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">State</h3>
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
                        <th>
                          Modify
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="state in states" :key="state.id">
                        <td>{{state.id}}</td>
                        <td>{{state.name}}</td>

                        <td>
                              <a href="#" @click.prevent="updatestate(state)"> <i class="fa fa-edit blue"></i></a>
                              <a href="#" @click.prevent="deletestate(state.id)"> <i class="fa fa-trash text-red"></i></a>
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
        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='!editmodal'>Add state</h5>
        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='editmodal'>Edit state</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="editmodal?editstate():addstate()">
      <div class="modal-body">
        <!--form -->

            <div class="form-group">
                <label>State name</label>
                <input v-model="form.name" type="text" name="name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                <has-error :form="form" field="name"></has-error>
            </div>









      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" v-show="!editmodal">Save Changes</button>
        <button type="submit" class="btn btn-success" v-show="editmodal">Update state</button>
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
          states:[],
          editmodal:false,


           form: new Form({
            id:'',
            name:''



          })
        }
      },
      created(){
        this.loadstate();
        },
      methods:{
      loadstate(){
          if(this.$gate.isAdmin()){
        axios.get('api/state')
        .then(({data})=>(this.states=data))
          }

      },

      openmodal(){
        this.editmodal=false;
        this.form.reset();
        $('#Modal').modal('show');

      },
      addstate(){

        axios.post('api/state')
              .then(({data})=>{
          $('#Modal').modal('hide');
          this.$Progress.start()
          Swal.fire({
            icon: 'success',
            title: 'Update Successful',
            showConfirmButton: false,
            timer: 3000
          })
          this.loadstate();
          this.$Progress.finish()
        })

      },
      deletestate(id){

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
            this.form.delete('api/state/'+id)
            .then(()=>{
            Swal.fire(
              'Deleted!',
              'Your File Has Been Deleted.',
              'Success'

            )
            this.loadstate();
          })
          }
        })
        .catch(()=>{
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!',
            footer: '<a href>Why do I have this issue?</a>'
          })
        })
      },

      updatestate(state){
        this.editmodal=true;
        $('#Modal').modal('show');
        this.form.fill(state);
      },

      editstate(){
        this.form.put('/api/state/'+this.form.id)
        .then(()=>{
          this.$Progress.start()
          $('#Modal').modal('hide');
          Swal.fire({
            icon: 'success',
            title: 'state Has Been Successfully Saved',
            showConfirmButton: false,
            timer: 3000
          })

          this.$Progress.finish()
      })
      },



  }
}
</script>
