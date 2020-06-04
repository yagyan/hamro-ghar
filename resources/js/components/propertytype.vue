<template>
      <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Property Type</h3>
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
                      <tr v-for="type in types" :key="type.id">
                        <td>{{type.id}}</td>
                        <td>{{type.name}}</td>

                        <td>
                              <a href="#" @click.prevent="updatetype(type)"> <i class="fa fa-edit blue"></i></a>
                              <a href="#" @click.prevent="deletetype(type.id)"> <i class="fa fa-trash text-red"></i></a>
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
        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='!editmodal'>Add type</h5>
        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='editmodal'>Edit type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="editmodal?edittype():addtype()">
      <div class="modal-body">
        <!--form -->

            <div class="form-group">
                <label>type name</label>
                <input v-model="form.name" type="text" name="name"
                class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                <has-error :form="form" field="name"></has-error>
            </div>









      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" v-show="!editmodal">Save Changes</button>
        <button type="submit" class="btn btn-success" v-show="editmodal">Update type</button>
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
          types:[],
          editmodal:false,


           form: new Form({
            id:'',
            name:''



          })
        }
      },
      created(){
        this.loadtype();
      },
      methods:{
      loadtype(){
        axios.get('api/propertytype')
        .then(({data})=>(this.types=data))

      },
      openmodal(){
        this.editmodal=false;
        this.form.reset();
        $('#Modal').modal('show');

      },
      addtype(){

        this.form.post('api/propertytype')
              .then(({data})=>{
          $('#Modal').modal('hide');
          this.$Progress.start()
          Swal.fire({
            icon: 'success',
            title: 'Update Successful',
            showConfirmButton: false,
            timer: 3000
          })
          this.loadtype();
          this.$Progress.finish()
        })

      },
      deletetype(id){

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
            this.form.delete('api/propertytype/'+id)
            .then(()=>{
            Swal.fire(
              'Deleted!',
              'Your File Has Been Deleted.',
              'Success'

            )
            this.loadtype();
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

      updatetype(type){
        this.editmodal=true;
        $('#Modal').modal('show');
        this.form.fill(type);
      },

      edittype(){
        this.form.put('/api/propertytype/'+this.form.id)
        .then(()=>{
          this.$Progress.start()
          $('#Modal').modal('hide');
          Swal.fire({
            icon: 'success',
            title: 'type Has Been Successfully Saved',
            showConfirmButton: false,
            timer: 3000
          })

          this.$Progress.finish()
      })
      },



  }
}
</script>
