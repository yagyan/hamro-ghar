<template>
    <!-- home_details  -->
   <component-to-re-render :key="componentKey"> 
    <div class="home_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <carousel :items='1' :autoplay='true' :loop='true' :nav="false" >
                        <div v-for="post in posts.slice(0,4)" :key="post.id" >
                            <div class="single_details">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="modern_home_info">
                                            <div class="modern_home_info_inner">
                                                <span class="for_sale">
                                                    For {{post.characteristics}}
                                                </span>
                                                
                                                <div class="info_header">
                                                    
                                                    <h3>{{post.title}}</h3>
                                                   
                                                    <div class="popular_pro d-flex">
                                                        <img src="img/svg_icon/location.svg" alt="">
                                                        <span>Longitide: {{post.longitude}}°</span>
                                                        
                                                    </div>
                                                    <div class="popular_pro d-flex">
                                                        <img src="img/svg_icon/location.svg" alt="">
                                                        <span>Latitude: {{post.latitude}}°</span>
                                                        
                                                    </div>
                                                </div>
                                                <div class="info_content">
                                                    <ul>
                                                        <li> <img src="img/svg_icon/square.svg" alt="">
                                                            <span>{{post.area}}</span> </li>
                                                        <li> <img src="img/svg_icon/bed.svg" alt="">
                                                            <span>{{post.bed}}</span>
                                                        </li>
                                                        <li> <img src="img/svg_icon/bath.svg" alt="">
                                                            <span>{{post.bath}}</span> </li>
                                                    </ul>
                                                    <p>{{post.description}}</p>
                                                    <div
                                                        class="prise_view_details d-flex justify-content-between align-items-center">
                                                        <span>$:{{post.price}}</span>
                                                        <router-link :to="{ path: 'singlepost', query: { id: post.id }}">
                                                        <div class="boxed-btn3-line">View Details</div>
                                                        </router-link>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </carousel>
                </div>
            </div>
        </div>
    </div>
    </component-to-re-render>
    <!-- /home_details  -->
</template>

<script>
    import carousel from 'vue-owl-carousel'
    export default {
        components: {
            carousel
        },

        data() {
            return {
                //componentKey: 0,
                posts: [],
                properties: [{
                        "title": "chundevi",
                        "area": "500 sqft",
                        "bed": "2",
                        "bath": "2",
                        "description": " It allowance prevailed enjoyment in it.Calling observe for who pressed raising his. ",
                        "price": "$1500"
                    },
                    {
                        "title": "choochen",
                        "area": "500 sqft",
                        "bed": "2",
                        "bath": "3",
                        "description": " aaaaaaaa It allowance prevailed enjoyment in it.Calling observe for who pressed raising his. ",
                        "price": "$2500"
                    },
                    {
                        "title": "asd",
                        "area": "400 sqft",
                        "bed": "1",
                        "bath": "1",
                        "description": " bbbbbbbbbbbbb It allowance prevailed enjoyment in it.Calling observe for who pressed raising his. ",
                        "price": "$3500"
                    },
                    {
                        "title": "aaaa",
                        "area": "300 sqft",
                        "bed": "4",
                        "bath": "4",
                        "description": " cccccccccc It allowance prevailed enjoyment in it.Calling observe for who pressed raising his. ",
                        "price": "$4500"
                    },
                    {
                        "title": "aaaa",
                        "area": "300 sqft",
                        "bed": "4",
                        "bath": "4",
                        "description": " cccccccccc It allowance prevailed enjoyment in it.Calling observe for who pressed raising his. ",
                        "price": "$4500"
                    },
                    {
                        "title": "aaaa",
                        "area": "300 sqft",
                        "bed": "4",
                        "bath": "4",
                        "description": " cccccccccc It allowance prevailed enjoyment in it.Calling observe for who pressed raising his. ",
                        "price": "$4500"
                    },

                ],



            }
        },
        created() {
            console.log('Component mounted.');
            this.fetchpost();

        },
        methods: {
            forceRerender() {
                this.componentKey += 1;
            },
            fetchpost() {
                axios.get('api/post')
                    .then(({
                        data
                    }) => {
                        this.posts = data;
                        this.forceRerender();
                    })
            },



        }
    }
</script>