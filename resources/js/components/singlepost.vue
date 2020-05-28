<template>
    <div style="padding-bottom:100px">
        <div v-for="post in posts" :key="post.id">
        <div class="popular_property">
            <div class="container" style="padding-top:50px">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title mb-40 text-center">
                            <h3>{{post.title}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='row  border' style="padding-left:50px; padding-right:50px">

            <div class="col-md-6" style="padding-top:50px; padding-bottom:50px">
                <img v-bind:src="post.front_view" alt="" class="img-thumbnail">
            </div>
            <div class="col-md-6" style="padding-top:100px; padding-left:100px">
                <div class="col-xl-14 col-md-16 col-lg-14" style="padding: 5px">
                        <div class="single_property">

                            <h2><a href="#">{{post.title}}</a></h2>
                           
                                <div class="property_tag" style="padding-top:30px">
                                    <strong> Chacracteristics:</strong>
                                   <span>For {{post.characteristics}}</span>
                                </div>
                               
                            
                            <div class="property_content">
                                <div class="main_pro">
                                   
                                   
                                    <div class="mark_pro">
                                        <img src="img/svg_icon/location.svg" alt="">
                                        <strong>Latitude:</strong>
                                        <span> {{post.latitude}}°</span>
                                    </div>
                                    <div class="mark_pro">
                                        <img src="img/svg_icon/location.svg" alt="">
                                         <strong>Longitude:</strong>
                                        <span> {{post.longitude}}°</span>
                                    </div>
                                     <strong>Price:</strong>
                                    <span>$:{{post.price}}</span>
                                </div>
                            </div>
                            <div class="footer_pro">
                                <ul>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="img/svg_icon/square.svg" alt="">
                                             <strong>Area:</strong>
                                            <span>{{post.area}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="img/svg_icon/bed.svg" alt="">
                                             <strong>No of Bed:</strong>
                                            <span>{{post.bed}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="img/svg_icon/bath.svg" alt="">
                                             <strong>No of Bathroom:</strong>
                                            <span>{{post.bathroom}}</span>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="single_info_doc">
                                            <img src="img/svg_icon/type.png" alt="">
                                             <strong>Property Type:</strong>
                                            <span>{{post.pname}}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>


        </div>
        <div class='row  border' style="padding-left:50px; padding-right:50px">
            <div class="col-sm-3" style="padding-top:50px; padding-bottom:50px">
                <img v-bind:src="post.front_view" alt="" class="img-thumbnail">
            </div>
            <div class="col-sm-3" style="padding-top:50px; padding-bottom:50px">
                <img v-bind:src="post.top_view" alt="" class="img-thumbnail">
                
            </div>
            <div class="col-sm-3" style="padding-top:50px; padding-bottom:50px">
                <img v-bind:src="post.side_view" alt="" class="img-thumbnail">
            </div>
        </div>
        </div>
    </div>
</template>
<script>
    import carousel from 'vue-owl-carousel'
    export default {
        props:['id'],
        data() {
            return {
                loaded: false,
               
                posts:{},

            }
        },
        created() {
            this.fetchpost();
        },
        methods: {
            forceRerender() {
                this.componentKey += 1;
            },
            fetchpost() {
                axios.get('api/singlepost/'+this.id)
                    .then(({
                        data
                    }) => {
                        this.posts = data;
                        this.loaded = true;
                    })
            }
        }
    }
</script>
<style></style>