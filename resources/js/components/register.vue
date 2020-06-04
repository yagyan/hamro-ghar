<template>
<component-to-re-render :key="componentKey">
    <div class="text-center" style="padding-top:200px">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-header">
                <h3 class="card-title">Register</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form @submit.prevent='adduser'>
                    <div class="form-group">
                        <label>Name</label>
                        <input v-model="form.name" type="text" name="name" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input v-model="form.email" type="email" name="email" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('email') }">
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
                        <input v-model="form.password" type="password" name="password" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>

                    </div>

                    <div class="form-group" v-show="!editmodal">
                        <label>confirm Password</label>
                        <input v-model="form.confirmpassword" type="password" name="confirmpassword"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('confirmpassword') }">
                        <has-error :form="form" field="confirmpassword"></has-error>
                    </div>



                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</component-to-re-render>

</template>

<script>
    export default {
        data() {
            return {
                componentKey:0,
                types: [],
                form: new Form({
                    name: '',
                    email: '',
                    password: '',
                    confirmpassword: '',
                    usertype: '',

                })
            }

        },
        created() {
            this.loadtypes();
        },
        methods: {
            adduser() {
                this.form.post('api/register')
                    .then(({
                        data
                    }) => {
                        $('#Modal').modal('hide');
                        this.$Progress.start()
                        Swal.fire({
                            icon: 'success',
                            title: 'Register Successful',
                            showConfirmButton: false,
                            timer: 1000
                        })
                        this.$router.push({
                            path: '/'
                        })
                        this.$Progress.finish()
                    })
            },
            loadtypes() {
                axios.get('api/usertype')
                    .then(({
                        data
                    }) => {this.types = data
                    this.forcererender();
                    })
            },
            forcererender()
            {
                this.componentKey+=1;
            }

        }

    }
</script>

<style>

</style>