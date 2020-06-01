<template>
   <div>
        <div class="property_details_banner">
                <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-md-8 col-lg-6">
                                <div class="comfortable_apartment">
                                    <h4>{{post[0].title}}</h4>
                                    <p> <img src="img/svg_icon/location.svg" alt="">Longitude:{{post[0].longitude}}°</p>
                                    <p> <img src="img/svg_icon/location.svg" alt="">Latitude:{{post[0].latitude}}°</p>
                                    <div class="quality_quantity d-flex">
                                        <div class="single_quantity">
                                            <img src="img/svg_icon/color_box.svg" alt="">
                                            <span>{{post[0].area}}</span>
                                        </div>
                                        <div class="single_quantity">
                                            <img src="img/svg_icon/color_bed.svg" alt="">
                                            <span>{{post[0].bed}}</span>
                                        </div>
                                       <div class="single_quantity">
                                            <img src="img/svg_icon/browser.png" alt="">
                                            <span>{{post[0].pname}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-4 col-lg-6">
                                <div class="prise_quantity">
                                    <h4>$:{{post[0].price}}</h4>
                                    <a href="#">+10 367 457 735</a>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    <div class="property_details" >
        <div class="container">
            <div class="row ">
                <div class="col-xl-10" style="padding-left:220px">
                    <div class="property_banner">
                        <carousel :items='1' :autoplay='true' :loop='true' :nav="false">
                            <img v-bind:src="post[0].front_view" alt=""
                                onerror="if (this.src != 'error.jpg') this.src = 'img/property/6.png';"
                                class="img-thumbnail">
                            <img v-bind:src="post[0].top_view" alt=""
                                onerror="if (this.src != 'error.jpg') this.src = 'img/property/6.png';"
                                class="img-thumbnail">
                            <img v-bind:src="post[0].side_view" alt=""
                                onerror="if (this.src != 'error.jpg') this.src = 'img/property/6.png';"
                                class="img-thumbnail">
                        </carousel>
                    </div>
                </div>
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="details_info">
                        <h4>Description</h4>
                        {{post[0].description}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
</template>
<script>
    import carousel from 'vue-owl-carousel'
    export default {
        components: {
            carousel
        },
        
        data() {
            return {
                loaded: false,
                post: [],
                id:this.$route.query.id
            }
        },
        created() {
            this.fetchpost();
        },
        methods: {
            forceRerender() {
                this.componentKey += 1;
            },
           fetchpost(){
                axios.get('api/singlepost/'+this.id)
                    .then(({
                        data
                    }) =>{ this.post = data;
                    this.forceRerender();
                    })
            },
        }
    }
</script>
<style></style>