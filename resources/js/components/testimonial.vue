<template>
    <!-- testimonial_area  -->
    <div class="testimonial_area overlay ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div v-for="test in testimonials" :key="test.id">
                            <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                    <div class="quote">
                                        <img src="img/svg_icon/quote.svg" alt="">
                                    </div>
                                    <p>{{test.description}}</p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                            <img src="img/case/testmonial.png" alt="">
                                        </div>
                                        <h3>Robert Thomson</h3>
                                        <span>Business Owner</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /testimonial_area  -->
</template>

<script>
    export default {
        data() {
            return {
                testimonials: [{
                    "description":"Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque. Fusce ac mattis nulla. Morbi eget ornare dui."
                }, 
                {
                    "description":"yagyan munankarmi yagyan munankarmi"
                }, 
                {
                    "description":"Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.Fusce ac mattis nulla. Morbi eget ornare dui."}
                    ],
                post:[],
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.loadproperty();
        },
        methods: {
            loadproperty() {
                axios.get('api/post')
                    .then(({
                        data
                    }) => (this.post = data))
            },
        }
    }

</script>
