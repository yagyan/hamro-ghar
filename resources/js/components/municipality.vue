<template>
    <div class="container">
        <div class="row justify-content-center mt-5" v-if="$gate.isAdmin()">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Municipality</h3>
                        <div class="card-tools">
                            <button class="btn btn-primary" @click="openmodal">Add New <i
                                    class="fas fa-district-plus fa-fw"></i></button>
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
                                        Modify
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="municipality in municipalities" :key="municipality.id">
                                    <td>{{municipality.id}}</td>
                                    <td>{{municipality.name}}</td>
                                    <td>
                                        {{municipality.sname}}
                                    </td>
                                    <td>
                                        {{municipality.disname}}
                                    </td>

                                    <td>
                                        <a href="#" @click.prevent="updatemunicipality(municipality)"> <i
                                                class="fa fa-edit blue"></i></a>
                                        <a href="#" @click="deletemunicipality(municipality.id)"> <i
                                                class="fa fa-trash text-red"></i></a>
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
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='!editmodal'>Add district</h5>
                        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='editmodal'>Edit district</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmodal?editmunicipality():addmunicipality()">
                        <div class="modal-body">
                            <!--form -->
                            <div class="form-group">
                                <label>State</label>
                                <select class="form-control input-lg" style="width: 100%;" v-model="form.state_id"
                                    @change='fetchdistrict'>
                                    <option value="">Select State</option>
                                    <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>district</label>
                                <select class="form-control input-lg" style="width: 100%;" v-model="form.district_id">
                                    <option value="">Select district</option>
                                    <option v-for="district in districts" :key="district.id" :value="district.id">{{ district.name }}
                                    </option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>municipality name</label>
                                <input v-model="form.name" type="text" name="name" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>










                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" v-show="!editmodal">Save Changes</button>
                            <button type="submit" class="btn btn-success" v-show="editmodal">Update district</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                states: [],
                districts: [],
                municipalities: [],
                editmodal: false,


                form: new Form({
                    id: '',
                    name: '',
                    state_id: '',
                    district_id: '',



                })
            }
        },
        created() {
            this.loadmunicipality();
            this.fetchstate();
        },
        methods: {
            loadmunicipality() {
                  if(this.$gate.isAdmin()){
                axios.get('api/municipality')
                    .then(({
                        data
                    }) => (this.municipalities = data))
                  }

            },
            openmodal() {
                this.editmodal = false;
                this.form.reset();
                $('#Modal').modal('show');

            },
            addmunicipality() {

                this.form.post('api/municipality')
                    .then(({
                        data
                    }) => {
                        $('#Modal').modal('hide');
                        this.$Progress.start()
                        Swal.fire({
                            icon: 'success',
                            title: 'Update Successful',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        this.loaddistrict();
                        this.$Progress.finish()
                    })

            },

            fetchstate() {
                  if(this.$gate.isAdmin()){
                axios.get('api/state')
                    .then(({
                        data
                    }) => (this.states = data))
                  }
            },

            fetchdistrict() {
                axios.get('api/getdistrict/' + this.form.state_id)
                    .then(({
                        data
                    }) => (this.districts = data))
            },

            deletemunicipality(id) {

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
                            this.form.delete('api/district/' + id)
                                .then(() => {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your File Has Been Deleted.',
                                        'Success'

                                    )
                                    this.loadmunicipality();
                                })
                        }
                    })
                    .catch(() => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href>Why do I have this issue?</a>'
                        })
                    })
            },

            updatemunicipality(municipality) {
                this.editmodal = true;
                $('#Modal').modal('show');
                this.form.fill(municipality);
            },

            editmunicipality() {
                this.form.put('/api/municipality/' + this.form.id)
                    .then(() => {
                        this.$Progress.start()
                        $('#Modal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'district Has Been Successfully Saved',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        this.$Progress.finish()
                    })
            },


        }
    }

</script>
