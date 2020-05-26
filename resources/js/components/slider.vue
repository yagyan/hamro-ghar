<template>
    <component-to-re-render :key="componentKey">
        <div class="slider_area">
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-10 offset-xl-1">
                            <div class="slider_text text-center justify-content-center">
                                <h3>Find your best Property</h3>
                                <p>Esteem spirit temper too say adieus who direct esteem.</p>
                            </div>
                            <div class="property_form">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form_wrap d-flex">
                                                <div class="single-field max_width ">
                                                    <label for="#">Location</label>
                                                    <select class="form-control input-lg" style="width: 100%;"
                                                        v-model="form.state_id">
                                                        <option value="">Select State</option>
                                                        <option v-for="state in states" :key="state.id"
                                                            :value="state.id">
                                                            {{ state.name }}</option>

                                                    </select>
                                                </div>
                                                <div class="single-field max_width ">
                                                    <label for="#">Property type</label>
                                                    <select class="wide">
                                                        <option data-display="Apartment">Apartment</option>
                                                        <option value="1">Apartment</option>
                                                        <option value="2">Apartment</option>
                                                    </select>
                                                </div>
                                                <div class="single_field range_slider">
                                                    <label for="#">Price ($)</label>
                                                    <div id="slider"></div>
                                                </div>
                                                <div class="single-field min_width ">
                                                    <label for="#">Bed Room</label>
                                                    <select class="wide">
                                                        <option data-display="01">01</option>
                                                        <option value="1">02</option>
                                                        <option value="2">03</option>
                                                    </select>
                                                </div>
                                                <div class="single-field min_width ">
                                                    <label for="#">Bath Room</label>
                                                    <select class="wide">
                                                        <option data-display="01">01</option>
                                                        <option value="1">02</option>
                                                        <option value="2">03</option>
                                                    </select>
                                                </div>
                                                <div class="serach_icon">
                                                    <a href="#">
                                                        <i class="ti-search"></i>
                                                    </a>
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
                editmodal: false,
                form: new Form({
                    id: '',
                    name: '',
                    state_id: '',
                    district_id: '',
                    municipality_id: '',
                })
            }
        },
        mounted() {
            this.fetchstate();
            
        },
        methods: {
            forceRerender() {
                this.componentKey += 1;
            },
        fetchstate(){
          axios.get('api/state')
          .then(({data})=>{
              this.states=data;
              this.forceRerender();
              })
      },

        }
    }
</script>