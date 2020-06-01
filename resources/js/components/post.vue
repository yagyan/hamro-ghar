<template>
    <div class="container">
        <div class="row justify-content-center mt-5" v-if='$gate.isAgent()'>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post</h3>
                        <div class="card-tools">
                            <button class="btn btn-primary" @click="openmodal">New Post <i
                                    class="fas fa-user-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Property Type</th>
                                    <th>Address ID </th>
                                    <th>Characteristics</th>
                                    <th>Area</th>
                                    <th>Price</th>
                                    <th>Negotiation</th>
                                    <th>bed</th>
                                    <th>bathroom</th>
                                    <th>Published Date</th>
                                    <th>Expiry Date</th>
                                    <th>Status</th>
                                    <th>Sold</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>Top View</th>
                                    <th>Side View</th>
                                    <th>Front View</th>
                                    <th>Description</th>
                                    <th>Modify</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="post in posts" :key="post.id">
                                    <td>{{post.id}}</td>
                                    <td>{{post.title}}</td>
                                    <td>{{post.pname}}</td>
                                    <td>{{post.address_id}}</td>
                                    <td>{{post.characteristics}}</td>
                                    <td>{{post.area}}</td>
                                    <td>{{post.price}}</td>
                                    <td>{{post.negotiation}}</td>
                                    <td>{{post.bed}}</td>
                                    <td>{{post.bathroom}}</td>
                                    <td>{{post.published_date}}</td>
                                    <td>{{post.expiry_date}}</td>
                                    <td>{{post.status}}</td>
                                    <td>{{post.sold}}</td>
                                    <td>{{post.longitude}}</td>
                                    <td>{{post.latitude}}</td>
                                    <td>{{post.top_view}}</td>
                                    <td>{{post.side_view}}</td>
                                    <td>{{post.front_view}}</td>
                                    <td>{{post.description}}</td>
                                    <td>
                                        <a href="#" @click.prevent="updatepost(post)"> <i
                                                class="fa fa-edit blue"></i></a>
                                        <a href="#" @click="deletepost(post.id)"> <i
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
                        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='!editmodal'>Add Post</h5>
                        <h5 class="modal-title" id="exampleModalCenterTitle" v-show='editmodal'>Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editmodal?editpost():addpost()" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!--form -->
                            <div class="form-group">
                                <label>Title</label>
                                <input v-model="form.title" type="text" name="title" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('title') }">
                                <has-error :form="form" field="title"></has-error>
                            </div>
                            <div class="row">


                                <div class="col-md-6">

                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" v-model="form.status" class="custom-control-input"
                                                id="status">
                                            <label class="custom-control-label" for="status">Status</label>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Property Type</label>
                                        <select class="form-control input-lg" style="width: 100%;"
                                            v-model="form.propertytype_id">
                                            <option value="">Select Property Type</option>
                                            <option v-for="type in types" :key="type.id" :value="type.id">
                                                {{ type.name }}</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Area</label>
                                        <input v-model="form.area" type="text" name="area" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('area') }">
                                        <has-error :form="form" field="area"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Characteristics</label>
                                        <section>
                                            <input type="radio" v-model="form.characteristics" value="Buy">Buy
                                            <br>
                                            <input type="radio" v-model="form.characteristics" value="Sell">Sell
                                            <br>
                                            <input type="radio" v-model="form.characteristics" value="Rent">Rent
                                            <br>
                                        </section>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input v-model="form.price" type="text" name="price" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('price') }">
                                        <has-error :form="form" field="price"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <!-- Default switch -->
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" v-model="form.negotiation"
                                                class="custom-control-input" id="customSwitches">
                                            <label class="custom-control-label" for="customSwitches">Negotiation</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No of bed</label>
                                        <input v-model="form.bed" type="text" name="bed" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('bed') }">
                                        <has-error :form="form" field="bed"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No of bathroom</label>
                                        <input v-model="form.bathroom" type="text" name="bathroom" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('bathroom') }">
                                        <has-error :form="form" field="bathroom"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Longitude</label>
                                        <input v-model="form.longitude" type="text" name="longitude"
                                            class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('longitude') }">
                                        <has-error :form="form" field="longitude"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Latitude</label>
                                        <input v-model="form.latitude" type="text" name="latitude" class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('latitude') }">
                                        <has-error :form="form" field="latitude"></has-error>
                                    </div>
                                </div>
                            </div>

                            <!--<div class="row">
          <div class="col-md-6">
            <div class="form-group">
                      <label>Published Date</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input v-model="form.published_date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" placeholder="dd/mm/yyyy" data-mask="" im-insert="false">
                      </div>

                    </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                    <label>Expiry Date</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input v-model="form.expiry_date" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="mm/dd/yyyy" placeholder="dd/mm/yyyy" data-mask="" im-insert="false">
                  </div>

                </div>
          </div>
        </div>-->
                            <form2>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <select class="form-control input-lg" style="width: 100%;"
                                                    v-model="form2.state_id" @change="fetchdistrict">
                                                    <option value="">Select State</option>
                                                    <option v-for="state in states" :key="state.id" :value="state.id">
                                                        {{ state.name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>District</label>
                                                <select class="form-control input-lg" style="width: 100%;"
                                                    v-model="form2.district_id" @change="fetchmunicipality">
                                                    <option value="">Select District</option>
                                                    <option v-for="district in districts" :key="district.id"
                                                        :value="district.id">
                                                        {{ district.name }}</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Municipality</label>
                                                <select class="form-control input-lg" style="width: 100%;"
                                                    v-model="form2.municipality_id" @change="fetchward">
                                                    <option value="">Select Municipality</option>
                                                    <option v-for="municipality in municipalities"
                                                        :key="municipality.id" :value="municipality.id">
                                                        {{ municipality.name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ward</label>
                                                <select class="form-control input-lg" style="width: 100%;"
                                                    v-model="form2.ward_id">
                                                    <option value="">Select Ward</option>
                                                    <option v-for="ward in wards" :key="ward.id" :value="ward.id">
                                                        {{ ward.name }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-primary" @click.prevent="addaddress()">Save Address</button>
                                </div>
                            </form2>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Front View</label>
                                        <input v-model="form.Fview" type="File" name="Fview"
                                            @change.prevent='updateFview' class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('Fview') }">
                                        <has-error :form="form" field="Fview"></has-error>


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Top View</label>
                                        <input v-model="form.Tview" type="File" name="Tview"
                                            @change.prevent='updateTview' class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('Tview') }">
                                        <has-error :form="form" field="Tview"></has-error>
                                        <!-- <button type="button" class="btn btn-dark" data-dismiss="modal" @click.prevent="updateinfo">upload</button>-->

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Side View</label>
                                        <input v-model="form.Sview" type="File" name="Sview"
                                            @change.prevent='updateSview' class="form-control"
                                            :class="{ 'is-invalid': form.errors.has('Sview') }">
                                        <has-error :form="form" field="Sview"></has-error>


                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" v-model="form.sold" class="custom-control-input"
                                                id="sold">
                                            <label class="custom-control-label" for="sold">Sold</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea v-model="form.description" class="form-control" rows="3"
                                            placeholder="Description"></textarea>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" v-show="!editmodal">Save Changes</button>
                            <button type="submit" class="btn btn-success" v-show="editmodal">Update Post</button>
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
                posts: [],
                editmodal: false,
                types: [],
                files: [],
                states: [],
                districts: [],
                municipalities: [],
                wards: [],




                form: new Form({
                    id: '',
                    title: '',
                    user_id: window.userinfo.user.id,
                    status: true,
                    propertytype_id: '',
                    area: '',
                    characteristics: '',
                    price: '',
                    negotiation: false,
                    address_id: '',
                    longitude: '',
                    latitude: '',
                    published_date: '',
                    expiry_date: '',
                    Tview: '',
                    Sview: '',
                    Fview: '',
                    sold: false,
                    description: '',
                    bed: '',
                    bathroom: '',
                    address_id: '',
                }),
                form2: new Form({

                    state_id: '',
                    district_id: '',
                    municipality_id: '',
                    ward_id: ''
                })
            }
        },
        created() {
            this.loadpost();
            this.loadtypes();
            this.fetchstate();

        },
        methods: {

            updateTview(e) {
                let file = e.target.files[0];
                //console.log(file);
                let reader = new FileReader();
                if (file['size'] < 5111775) {
                    reader.onloadend = (file) => {
                        //console.log('RESULT', reader.result);
                        this.form.Tview = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'File is Too Big',
                    })
                }
            },


            updateSview(e) {
                let file = e.target.files[0];
                //console.log(file);
                let reader = new FileReader();
                if (file['size'] < 5111775) {
                    reader.onloadend = (file) => {
                        //console.log('RESULT', reader.result);
                        this.form.Sview = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'File is Too Big',
                    })
                }
            },


            updateFview(e) {
                let file = e.target.files[0];
                //console.log(file);
                let reader = new FileReader();
                if (file['size'] < 5111775) {
                    reader.onloadend = (file) => {
                        //console.log('RESULT', reader.result);
                        this.form.Fview = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'File is Too Big',
                    })
                }
            },

            loadpost() {

                if(this.$gate.isAgent()){
                axios.get('api/yourpost/' + this.form.user_id)
                    .then(({
                        data
                    }) => (this.posts = data))
                }
            },
            loadtypes() {
                  if(this.$gate.isAgent()){
                axios.get('api/propertytype')
                    .then(({
                        data
                    }) => (this.types = data))
                  }
            },
            openmodal() {
                this.editmodal = false;
                $('#Modal').modal('show');
                this.form.reset();
            },
            addpost() {
                this.$Progress.start();
                this.form.post('api/post')
                    .then(({
                        data
                    }) => {
                        $('#Modal').modal('hide');
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Post has been Successfully Added',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        this.$Progress.finish();
                        this.loadpost();

                    })
                    .catch(({
                        result
                    }) => {
                        this.$Progress.fail();
                    })
            },
            deletepost(id) {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        this.form.delete('api/post/' + id)
                            .then(() => {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                this.loadpost();
                            })
                            .catch(() => {
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
            updatepost(post) {
                this.editmodal = true;
                $('#Modal').modal('show');
                this.form.fill(post);
            },
            editpost() {
                this.form.put('api/post/' + this.form.id)
                    .then(() => {
                            $('#Modal').modal('hide');
                            this.form.get('api/post/' + this.form.id)
                                .then(({
                                    data
                                }) => (this.posts = data.data))
                        }

                    )
            },
            addaddress() {
                this.form2.post('api/address')
                    .then(({
                        data
                    }) => {
                        (this.form.address_id = data.id)
                    })
            },
            fetchstate() {
                  if(this.$gate.isAgent()){
                axios.get('api/state')
                    .then(({
                        data
                    }) => (this.states = data))
                  }
            },
            fetchdistrict() {
                axios.get('api/getdistrict/' + this.form2.state_id)
                    .then(({
                        data
                    }) => (this.districts = data))
            },

            fetchmunicipality() {
                axios.get('api/getmunicipality/' + this.form2.district_id)
                    .then(({
                        data
                    }) => (this.municipalities = data))
            },
            fetchward() {
                axios.get('api/getward/' + this.form2.municipality_id)
                    .then(({
                        data
                    }) => (this.wards = data))
            },
        }
    }
</script>