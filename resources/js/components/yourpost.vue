<template>
<component-to-re-render :key="componentKey">
    <div class="popular_property">
        <div class="container" style="padding-top:50px">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-40 text-center">
                        <h3>Your Post</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                <div v-for="post in posts" :key="post.id">
                    <div class="col-xl-14 col-md-16 col-lg-14" style="padding: 5px">
                        <div class="single_property">
                            <div class="property_thumb" style="height:240px; width:362px ">
                                <div class="property_tag">
                                    For {{post.characteristics}}
                                </div>
                                <img class="img-fluid" v-bind:src="post.front_view"
                                    onerror="if (this.src != 'error.jpg') this.src = 'img/property/6.png';">
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
                                     <li>
                                        <div class="single_info_doc">
                                            <a href="#" @click="deletepost(post)"> <i
                                                class="fa fa-trash text-red"></i></a>
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
                        <div class="boxed-btn3-line" @click="$router.push('allproperty')">All Properties</div>
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
                componentKey:0,
                posts: [],
                userid:window.user.user.id,

            }
        },
        created() {
            console.log('Component mounted.')
            this.fetchyourpost();
            this.scrollToTop();
            
        },
        methods: {
            forceRerender() {
                this.componentKey += 1;
            },
            fetchyourpost(){
                axios.get('api/yourpost/'+this.userid)
                    .then(({
                        data
                    }) =>{ this.posts = data;
                    this.forceRerender();
                    })
            },

        
            scrollToTop() {
                window.scrollTo(0,0);
           },
           deletepost(post) {

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
                        axios.delete('api/post/' + post.id)
                            .then(() => {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                                this.fetchyourpost();
                              
                            })
                    }
                })
            },
        }

    }

</script>
