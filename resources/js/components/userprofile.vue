<template>
    <component-to-re-render :key="componentKey">
        <div class="container">
            <div v-for="user in userinfo" :key="user.userid">
                <div class="row justify-content-center">
                    <div class="col-md-12 mt-5">
                    </div>
                    <div class="col-md-12 mt 8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">

                                    <li class="nav-item"><a class="nav-link active" href="#settings"
                                            data-toggle="tab">Settings</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <!-- /.tab-pane -->
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane active" id="settings">
                                        <div class="col-md-12">
                                            <!-- Profile Image -->
                                            <!-- About Me Box -->
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Details</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <strong><i class=""></i>User Name</strong>
                                                    <p class="text-muted">
                                                        {{user.username}}
                                                    </p>
                                                    <hr>
                                                    <strong><i class=""></i> Name</strong>
                                                    <p class="text-muted">
                                                        {{user.name}}
                                                    </p>
                                                    <hr>
                                                    <strong><i class=""></i> Email</strong>
                                                    <p class="text-muted">
                                                        {{user.useremail}}
                                                    </p>
                                                    <hr>
                                                    <strong><i class=""></i>User Type</strong>
                                                    <p class="text-muted">
                                                        {{user.usertype}}
                                                    </p>
                                                    <hr>
                                                    <strong><i class=""></i>Date Of Birth</strong>
                                                    <p class="text-muted">
                                                        2068/12/12
                                                    </p>
                                                    <hr>
                                                    <strong><i class=""></i> Permanent Address</strong>
                                                    <a href="#" @click.prevent="openaddress"> <i
                                                            class="fa fa-edit blue"></i></a>
                                                    <table class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>

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
                                                                    Ward Name
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="add in address" :key="add.id">

                                                                <td>{{add.sname}}</td>
                                                                <td>{{add.disname}}</td>
                                                                <td>{{add.municname}}</td>
                                                                <td>{{add.wname}}</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <hr>
                                                    <strong><i class=""></i> Temporary Address</strong>
                                                    <a href="#" @click.prevent="opentemp"> <i
                                                            class="fa fa-edit blue"></i></a>
                                                    <table class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>

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
                                                                    Ward Name
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="add in tempaddress" :key="add.id">

                                                                <td>{{add.sname}}</td>
                                                                <td>{{add.disname}}</td>
                                                                <td>{{add.municname}}</td>
                                                                <td>{{add.wname}}</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <hr>
                                                    <strong><i class=""></i> Phone</strong>
                                                    <p class="text-muted">{{user.phone}}</p>
                                                    <hr>
                                                    <strong><i class=""></i> Mobile</strong>
                                                    <p class="text-muted">{{user.mobile}}</p>
                                                    <hr>
                                                    <strong><i class=""></i>Citizenship No</strong>
                                                    <p class="text-muted">{{user.citizen_no}}</p>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                            @click="updatedetail(user)">Edit Detials</button>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <!-- Modal -->


                                </div>

                                <div class="modal fade" id="modal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal">Edit Details</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form @submit.prevent="editdetail()">
                                                <div class="modal-body">
                                                    <!--form -->
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input v-model="form.name" type="text" name="name"
                                                            class="form-control"
                                                            :class="{ 'is-invalid': form.errors.has('name') }">
                                                        <has-error :form="form" field="name"></has-error>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>phone</label>
                                                        <input v-model="form.phone" type="text" name="phone"
                                                            class="form-control"
                                                            :class="{ 'is-invalid': form.errors.has('phone') }">
                                                        <has-error :form="form" field="phone"></has-error>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Mobile</label>
                                                        <input v-model="form.mobile" type="text" name="mobile"
                                                            class="form-control"
                                                            :class="{ 'is-invalid': form.errors.has('mobile') }">
                                                        <has-error :form="form" field="mobile"></has-error>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Citizenship_no</label>
                                                        <input v-model="form.citizen_no" type="text" name="citizen_no"
                                                            class="form-control"
                                                            :class="{ 'is-invalid': form.errors.has('citizen_no') }">
                                                        <has-error :form="form" field="citizen_no"></has-error>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Update
                                                        Details</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="address" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle"
                                                    v-show='!temp'>Add Permanent Address</h5>
                                                <h5 class="modal-title" id="exampleModalCenterTitle" v-show='temp'>
                                                    Add Temporary Address</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form @submit.prevent="temp?addtemp(user.id):addaddress(user.id)">
                                                <div class="modal-body">
                                                    <!--form -->
                                                    <div class="form-group">
                                                        <label>State</label>
                                                        <select class="form-control input-lg" style="width: 100%;"
                                                            v-model="form.state_id" @change="fetchdistrict">
                                                            <option value="">Select State</option>
                                                            <option v-for="state in states" :key="state.id"
                                                                :value="state.id">{{ state.name }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>District</label>
                                                        <select class="form-control input-lg" style="width: 100%;"
                                                            v-model="form.district_id" @change="fetchmunicipality">
                                                            <option value="">Select District</option>
                                                            <option v-for="district in districts" :key="district.id"
                                                                :value="district.id"> {{ district.name }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Municipality</label>
                                                        <select class="form-control input-lg" style="width: 100%;"
                                                            v-model="form.municipality_id" @change="fetchward">
                                                            <option value="">Select Municipality</option>
                                                            <option v-for="municipality in municipalities"
                                                                :key="municipality.id" :value="municipality.id">
                                                                {{ municipality.name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ward</label>
                                                        <select class="form-control input-lg" style="width: 100%;"
                                                            v-model="form.ward_id">
                                                            <option value="">Select Ward</option>
                                                            <option v-for="ward in wards" :key="ward.id"
                                                                :value="ward.id"> {{ ward.name }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-dark"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        v-show="!editmodal">Save Changes</button>
                                                    <button type="submit" class="btn btn-success"
                                                        v-show="editmodal">Update ward</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                </div>
            </div>
        </div>
    </component-to-re-render>
</template>
<script>
    export default {
        data() {
            return {
               componentKey: 0,
                userid: window.user.id,
                userinfo: [],
                temp: false,
                states: [],
                districts: [],
                municipalities: [],
                wards: [],
                address: [],
                tempaddress:[],
                form: new Form({
                    username: '',
                    useremail: '',
                    name: '',
                    dob: '',
                    paddress_id: '',
                    taddress_id: '',
                    phone: '',
                    mobile: '',
                    citizen_no: '',
                    user_id: '',
                    id: '',
                    state_id: '',
                    district_id: '',
                    municipality_id: '',
                    ward_id: '',
                })
            }
        },
        created() {
            this.add();
            this.loaduser();
            this.fetchstate();
            this.loadaddress();
            this.loadtempaddress();
        },
        methods: {
            forcererender(){
                this.componentKey +=1;
            },

            //user functions
            loaduser() {
                this.form.get('api/userinfo/' + this.userid)
                    .then(({
                        data
                    }) => {
                        this.userinfo = data;
                        this.forcererender();
                       
                    })
            },

            add() {
                this.form.get("api/adduser/" + this.userid)

            },
            updatedetail(userinfo) {
                $('#modal').modal('show');
                this.form.fill(userinfo);
            },
            editdetail() {
                this.form.put('/api/userinfo/' + this.form.id)
                    .then(() => {
                        this.$Progress.start()
                        $('#modal').modal('hide');

                        Swal.fire({
                            icon: 'success',
                            title: 'userinfo Has Been Successfully Saved',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        
                        this.$Progress.finish();
                        this.loaduser();

                    })
            },
            //Address functions

             loadaddress() {
                this.form.get('api/address/' + this.userid)
                    .then(({
                        data
                    }) => (this.address = data))
            },
            
             loadtempaddress() {
                this.form.get('api/temp/' + this.userid)
                    .then(({
                        data
                    }) => (this.tempaddress = data))
            },

            openaddress() {
                this.temp = false;
                this.form.reset();
                $('#address').modal('show');
            },
            opentemp() {
                this.temp = true;
                this.form.reset();
                $('#address').modal('show');
            },
            addaddress(user) {
                this.form.put('api/updateprofile/' + user)
                    .then(({
                        data
                    }) => {
                        $('#address').modal('hide');
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

            addtemp(user) {
                this.form.put('api/updatetemp/' + user)
                    .then(({
                        data
                    }) => {
                        $('#address').modal('hide');
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
            
            fetchstate() {
                axios.get('api/state')
                    .then(({
                        data
                    }) => (this.states = data))
            },
            fetchdistrict() {
                axios.get('api/getdistrict/' + this.form.state_id)
                    .then(({
                        data
                    }) => (this.districts = data))
            },

            fetchmunicipality() {
                axios.get('api/getmunicipality/' + this.form.district_id)
                    .then(({
                        data
                    }) => (this.municipalities = data))
            },
            fetchward() {
                axios.get('api/getward/' + this.form.municipality_id)
                    .then(({
                        data
                    }) => (this.wards = data))
            },
        }
    }
</script>