<template>
    <component-to-re-render :key="componentKey">
        <div class="slider_area">
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="slider_text text-center justify-content-center">
                                <h3>Find your best Property</h3>
                                <p>Find A Home That Is Desgined For You</p>
                            </div>
                            <div class="property_form">
                                <form action="#">
                                    <div class="row">

                                        <div class="container-fluid">
                                            <div class="form_wrap d-flex">
                                                <div class="single-field max_width ">
                                                    <label for="#">Property Type</label>

                                                    <select class="form-control input-lg" style="width: 100%;"
                                                        v-model="form.propertytype_id">
                                                        <option value="">Select Type</option>
                                                        <option v-for="type in types" :key="type.id" :value="type.id">
                                                            {{ type.name }}</option>

                                                    </select>
                                                </div>
                                                <div class="single-field max_width ">
                                                    <label for="#">State</label>
                                                    <select class="form-control input-lg" style="width:100%;"
                                                        v-model="form.state_id" @change="fetchdistrict">

                                                        <option v-for="state in states" :key="state.id"
                                                            :value="state.id">
                                                            {{ state.name }}</option>

                                                    </select>
                                                </div>

                                                <!--<div class="single-field max_width ">
                                                    <label for="#">disrict</label>
                                                    <select class="form-control input-lg" style="width: 90%;"
                                                        v-model="form.district_id" @change="fetchmunicipality">
                                                        <option>select district</option>
                                                        <option v-for="district in districts" :key="district.id"
                                                            :value="district.id">
                                                            {{ district.name }}</option>

                                                    </select>
                                                </div> -->
                                                <div class="single-field min_width ">
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input v-model="form.price" type="text" name="price"
                                                            class="form-control" style="width: 100%;"
                                                            :class="{ 'is-invalid': form.errors.has('price') }">
                                                        <has-error :form="form" field="price"></has-error>
                                                    </div>
                                                </div>


                                                <div class="single-field max_width ">
                                                    <label for="#">Bed</label>
                                                    <select class="form-control input-lg" style="width: 100%;"
                                                        v-model="form.bed">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                        <option value="5">05</option>
                                                        <option value="6">06</option>
                                                        <option value="7">07</option>

                                                    </select>
                                                </div>
                                                <div class="single-field max_width ">
                                                    <label for="#">Bath </label>
                                                    <select class="form-control input-lg" style="width: 100%;"
                                                        v-model="form.bath">
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                        <option value="5">05</option>
                                                        <option value="6">06</option>
                                                        <option value="7">07</option>

                                                    </select>
                                                </div>

                                                <div class="serach_icon">
                                                    
                                                  <!--  <router-link
                                                        :to="'/search/'+this.form.propertytype_id+'/'+this.form.bed+'/'+this.form.bath+'/'+this.form.price"> -->
                                                       <a @click='search'><i class="ti-search" ></i></a>
                                                   <!-- </router-link>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                states: [],
                districts: [],
                municipalities: [],
                wards: [],
                types: [],
                editmodal: false,
                form: new Form({
                    id: '',
                    bed: '',
                    bath: '',
                    state_id: '',
                    district_id: '',
                    municipality_id: '',
                    ward_id: '',
                    porpertytype_id: '',
                    price:'',
                })
            }
        },
        mounted() {
            this.loadtypes();
            this.fetchstate();

        },
        methods: {
            search(){
                this.$router.push({ name: 'search', query: { type:this.form.propertytype_id, bed:this.form.bed, bath:this.form.bath, price:this.form.price} })
                
            },
            forceRerender() {
                this.componentKey += 1;
            },
            loadtypes() {
                axios.get('api/propertytype')
                    .then(({
                        data
                    }) => (this.types = data))
            },
            fetchstate() {
                axios.get('api/state')
                    .then(({
                        data
                    }) => {
                        this.states = data;
                        this.forceRerender();
                    })
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