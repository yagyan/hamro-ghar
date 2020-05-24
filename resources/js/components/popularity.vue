<template>
    <div class="popular_property">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title mb-40 text-center">
                            <h3>Popular Properties</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
               
                <div v-for="post in allpost.slice(0,6)" :key="post.id">
                <div class="col-xl-14 col-md-16 col-lg-14" style="padding: 5px">
                    <div class="single_property">
                        <div class="property_thumb" style="height:240px; width:362px ">
                            <div class="property_tag">
                                    For Sale
                            </div>
                            <img class="img-fluid" v-bind:src="post.front_view" onerror="if (this.src != 'error.jpg') this.src = 'img/property/6.png';">
                        </div>
                        <div class="property_content">
                            <div class="main_pro">
                                    <h3><a href="#">{{post.title}}</a></h3>
                                    <div class="mark_pro">
                                        <span>Popular Property</span>
                                    </div>
                                    <div class="mark_pro">
                                        <img src="img/svg_icon/location.svg" alt="">
                                        <span>Latitude:{{post.latitude}}°</span>
                                    </div>
                                    <div class="mark_pro">
                                        <img src="img/svg_icon/location.svg" alt="">
                                        <span>Longitude:{{post.longitude}}°</span>
                                    </div>
                                    <span class="amount">$:{{post.price}}</span>
                            </div>
                        </div>
                        <div class="footer_pro">
                                <ul>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="img/svg_icon/square.svg" alt="">
                                            <span>{{post.area}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="img/svg_icon/bed.svg" alt="">
                                            <span>{{post.bed}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="img/svg_icon/bath.svg" alt="">
                                            <span>{{post.bathroom}}</span>
                                        </div>
                                        
                                    </li>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="img/svg_icon/type.png" alt="">
                                            <span>{{post.pname}}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="more_property_btn text-center">
                            <a href="#" class="boxed-btn3-line">More Properties</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex';
    export default {
        computed: mapGetters(['allpost']),
        data(){
            return{
                posts:[],
                 
            }
        },
        mounted() {
            console.log('Component mounted.')
             this.fetchpost();
        },
        methods: {
            ...mapActions(['fetchpost']),
        }
        
    }
</script>










