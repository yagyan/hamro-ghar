<template>
      <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Ward</h3>
                      <div class="card-tools">
                          <button class="btn btn-primary" @click="openmodal">Add New <i class="fas fa-ward-plus fa-fw"></i></button>
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
                          State Name
                        </th>
                        <th>
                          District Name
                        </th>
                        <th>
                          Municipality Name
                        </th>
                        <th>
                          Modify
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="address in addresses" :key="address.id">
                        <td>{{address.id}}</td>
                        <td>{{address.name}}</td>
                        <td>{{address.sname}}</td>
                        <td>{{address.disname}}</td>
                        <td>{{address.municname}}</td>
                        <td>
                              <a href="#" @click.prevent="updateaddress(address)"> <i class="fa fa-edit blue"></i></a>
                              <a href="#" @click="deleteaddress(address.id)"> <i class="fa fa-trash text-red"></i></a>
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
        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='!editmodal'>Add Address</h5>
        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='editmodal'>Edit Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form @submit.prevent="editmodal?editaddress():addaddress()">
      <div class="modal-body">
        <!--form -->
        <div class="form-group">
          <label>State</label>
          <select class="form-control input-lg" style="width: 100%;" v-model="form.state_id" @change="fetchdistrict" >
            <option value="">Select State</option>
            <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}</option>
          </select>
        </div>
        <div class="form-group">
          <label>District</label>
          <select class="form-control input-lg" style="width: 100%;" v-model="form.district_id" @change="fetchmunicipality" >
            <option value="" >Select District</option>
            <option v-for="district in districts" :key="district.id" :value="district.id">{{ district.name }}</option>
          </select>
        </div>
         <div class="form-group">
          <label>Municipality</label>
          <select class="form-control input-lg" style="width: 100%;" v-model="form.municipality_id" @change="fetchward" >
            <option value="" >Select Municipality</option>
            <option v-for="municipality in municipalities" :key="municipality.id" :value="municipality.id">{{ municipality.name }}</option>
          </select>
        </div>
        <div class="form-group">
         <label>Ward</label>
         <select class="form-control input-lg" style="width: 100%;" v-model="form.ward_id">
           <option value="" >Select Ward</option>
           <option v-for="ward in wards" :key="ward.id" :value="ward.id">{{ ward.name }}</option>
         </select>
       </div>
  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" v-show="!editmodal">Save Changes</button>
        <button type="submit" class="btn btn-success" v-show="editmodal">Update ward</button>
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
          districts:[],
          municipalities:[],
          wards:[],
          editmodal:false,
           form: new Form({
            id:'',
            name:'',
            state_id:'',
            district_id:'',
            municipality_id:'',
          })
        }
      },
      created(){
        this.loadaddress();
        this.fetchstate();
      },
      methods:{
      loadaddress(){
        axios.get('api/address')
        .then(({data})=>(this.wards=data))
      },
      openmodal(){
        this.editmodal=false;
        this.form.reset();
        $('#Modal').modal('show');
      },
      addaddress(){
        this.form.post('api/address')
              .then(({data})=>{
          $('#Modal').modal('hide');
          this.$Progress.start()
          Swal.fire({
            icon: 'success',
            title: 'Update Successful',
            showConfirmButton: false,
            timer: 3000
          })
          this.loadaddress();
          this.$Progress.finish()
        })
      },
      fetchstate(){
          axios.get('api/state')
          .then(({data})=>(this.states=data))
      },
      fetchdistrict(){
          axios.get('api/getdistrict/'+this.form.state_id)
          .then(({data})=>(this.districts=data))
      },

      fetchmunicipality(){
          axios.get('api/getmunicipality/'+this.form.district_id)
          .then(({data})=>(this.municipalities=data))
      },
      fetchward(){
          axios.get('api/getward/'+this.form.municipality_id)
          .then(({data})=>(this.wards=data))
      },
      deleteaddress(id){
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
            this.form.delete('api/ward/'+id)
            .then(()=>{
            Swal.fire(
              'Deleted!',
              'Your File Has Been Deleted.',
              'Success'
            )
            this.loadaddress();
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
      updateaddress(ward){
        this.editmodal=true;
        $('#Modal').modal('show');
        this.form.fill(address);
      },
      editaddress(){
        this.form.put('/api/address/'+this.form.id)
        .then(()=>{
          this.$Progress.start()
          $('#Modal').modal('hide');
          Swal.fire({
            icon: 'success',
            title: 'ward Has Been Successfully Saved',
            showConfirmButton: false,
            timer: 3000
          })
          this.$Progress.finish()
      })
      },
    }
}
</script>
