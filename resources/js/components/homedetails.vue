<template>
    <!-- home_details  -->
    <div class="home_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                   <div class="home_details_active owl-carousel">
                        <div v-for="prop in post" :key="prop.id" >
                            <div class="single_details">
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="modern_home_info">
                                            <div class="modern_home_info_inner">
                                                <span class="for_sale">
                                                    For Sale
                                                </span>
                                                <div class="info_header">
                                                    <h3>{{prop.title}}</h3>
                                                    <div class="popular_pro d-flex">
                                                        <img src="img/svg_icon/location.svg" alt="">
                                                        <span>Popular Properties</span>
                                                    </div>
                                                </div>
                                                <div class="info_content">
                                                    <ul>
                                                        <li> <img src="img/svg_icon/square.svg" alt="">
                                                            <span>{{prop.area}}</span> </li>
                                                        <li> <img src="img/svg_icon/bed.svg" alt="">
                                                            <span>{{prop.bed}}</span>
                                                        </li>
                                                        <li> <img src="img/svg_icon/bath.svg" alt="">
                                                            <span>{{prop.bath}}</span> </li>
                                                    </ul>
                                                    <p>{{prop.description}}</p>
                                                    <div
                                                        class="prise_view_details d-flex justify-content-between align-items-center">
                                                        <span>$:{{prop.price}}</span>
                                                        <a class="boxed-btn3-line" href="#">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
    <!-- /home_details  -->
</template>

<script>
   /* import {
        mapGetters,
        mapActions
    } from 'vuex'; */

    export default {
        props:['post'],
        //computed: mapGetters(['allpost']),
        data() {
            return {
                load: false,
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
            //this.fetchpost();
            
        },
        methods: {

            //...mapActions(['fetchpost']),

            /*loadproperty() {
                axios.get('api/post')
                    .then(({
                        data
                    }) => {
                        this.post = data;
                        this.load= true;

                    })
            },*/
        }
    }

</script>
