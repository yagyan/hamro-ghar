<template>
    <component-to-re-render :key="componentKey">
        <div class="container" style="padding-top:200px">

            <div class="card" v-if="$gate.isAdminOrAgent()">
                <div class="card-header">
                    <h3 class="card-title">New Post</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form @submit.prevent="addpost()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Title</label>
                            <input v-model="form.title" type="text" name="title" class="form-control"
                                :class="{ 'is-invalid': form.errors.has('title') }">
                            <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="switch-wrap d-flex justify-content-between">
                                        <div class="confirm-switch">
                                            <input type="checkbox" v-model="form.status" id="Status" checked="">
                                            <label class="custom-control-label" for="Status"></label>
                                        </div>
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
                                    <div class="form-group">
                                        <label>Negotiation</label>
                                        <div class="switch-wrap d-flex justify-content-between">
                                            <div class="confirm-switch">
                                                <input type="checkbox" v-model="form.negotiation" id="neogtiation"
                                                    checked="">
                                                <label class="custom-control-label" for="neogtiation"></label>
                                            </div>
                                        </div>
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
                                    <input v-model="form.longitude" type="text" name="longitude" class="form-control"
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
                                                <option v-for="municipality in municipalities" :key="municipality.id"
                                                    :value="municipality.id">{{ municipality.name }}</option>
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
                                    <input v-model="form.Fview" type="File" name="Fview" @change.prevent='updateFview'
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('Fview') }">
                                    <has-error :form="form" field="Fview"></has-error>


                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Top View</label>
                                    <input v-model="form.Tview" type="File" name="Tview" @change.prevent='updateTview'
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('Tview') }">
                                    <has-error :form="form" field="Tview"></has-error>
                                    <!-- <button type="button" class="btn btn-dark" data-dismiss="modal" @click.prevent="updateinfo">upload</button>-->

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Side View</label>
                                    <input v-model="form.Sview" type="File" name="Sview" @change.prevent='updateSview'
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('Sview') }">
                                    <has-error :form="form" field="Sview"></has-error>


                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sold</label>
                                    <div class="switch-wrap d-flex justify-content-between">
                                        <div class="confirm-switch">
                                            <input type="checkbox" v-model="form.sold" id="sold" checked="">
                                            <label class="custom-control-label" for="sold"></label>
                                        </div>
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


                        <button type="submit" class="btn btn-primary">Save Changes</button>

                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </component-to-re-render>
</template>

<script>
    export default {
        data() {
            return {
                componentKey: 0,
                types: [],
                states: [],
                districts: [],
                municipalities: [],
                wards: [],



                form: new Form({
                    id: '',
                    title: '',
                    user_id: window.user.id,
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
        mounted() {

            this.loadtypes();
            this.fetchstate();

        },
        methods: {
            forceRerender() {
                this.componentKey += 1;
            },
            route(){
               
                this.$router.push('yourpost')
            },

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


            loadtypes() {
                if(this.$gate.isAdminOrAgent()){
                axios.get('api/propertytype')
                    .then(({
                        data
                    }) => (this.types = data))
                }
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
                        this.route();

                    })
                    .catch(({
                        result
                    }) => {
                        this.$Progress.fail();
                    })
            },

            //address field function
            addaddress() {
                this.form2.post('api/address')
                    .then(({
                        data
                    }) => {
                        this.form.address_id = data.id;
                         Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Address has been Successfully Added',
                            showConfirmButton: false,
                            timer: 3000
                        })
                    })
            },
            fetchstate() {
                if(this.$gate.isAdminOrAgent()){
                axios.get('api/state')
                    .then(({
                        data
                    }) => {
                        this.states = data;
                        this.forceRerender();
                        }
                        )
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

<style>

</style>