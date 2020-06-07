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
                                                    <select class="form-control input-lg" style="width:110%;"
                                                        v-model="form.type_id">
                                                        <option value="">Select Type</option>
                                                        <option v-for="type in types" :key="type.id"
                                                            :value="type.id">
                                                            {{ type.name }}</option>

                                                    </select>
                                                </div>
                                                <div class="single-field max_width ">
                                                    <label for="#">State</label>
                                                    <select class="form-control input-lg" style="width:100%;"
                                                        v-model="form.state_id">
                                                        <option value="">Select State</option>
                                                        <option v-for="state in states" :key="state.id"
                                                            :value="state.id">
                                                            {{ state.name }}</option>

                                                    </select>
                                                </div>

                                               
                                                <div class="single-field min_width ">
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input v-model="form.price" type="text" name="price"
                                                            class="form-control" style="width: 100%;"
                                                            :class="{ 'is-invalid': form.errors.has('price') }" placeholder="Price">
                                                        <has-error :form="form" field="price"></has-error>
                                                    </div>
                                                </div>


                                               <div class="single-field min_width ">
                                                    <label for="#">BedRoom </label>
                                                    <select class="form-control input-lg" style="width: 125%;"
                                                        v-model="form.bedroom">
                                                         <option value="">0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                    </select>
                                                </div>
                                                <div class="single-field min_width ">
                                                    <label for="#">Bathroom </label>
                                                    <select class="form-control input-lg" style="width: 125%;"
                                                        v-model="form.bath">
                                                         <option value="">0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                    </select>
                                                </div>

                                                <div class="serach_icon">
                                                   <router-link :to="{ path: 'search', query: {type:this.form.type_id,bathroom:this.form.bath,bed:this.form.bedroom, price:this.form.price, state:this.form.state_id}}"> 
                                                   
                                                      <i class="ti-search" ></i>
                                                   </router-link>
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
                    bath:'',
                    bedroom:'',
                    state_id: '',
                    district_id: '',
                    municipality_id: '',
                    ward_id: '',
                    type_id:'',
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
                this.$router.push({ path: '/search', params: { type:this.form.propertytype_id, bed:this.form.bed, bath:this.form.bath, price:this.form.price} })
                
            },
            forceRerender() {
                this.componentKey += 1;
            },
            loadtypes() {
                axios.get('api/propertytype')
                    .then(({
                        data
                    }) =>(this.types = data))
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