<template>
<div>
<slider></slider>
<popularity></popularity>
<home-details></home-details>
<counter></counter>
<testimonial></testimonial>
<agents></agents>
</div>
</template>

<script>
import slider from "../components/slider.vue"
import popularity from "../components/popularity.vue"
import details from "../components/homedetails.vue"
import test from "../components/testimonial.vue"
import counter from "../components/counter.vue"
import agents from "../components/agents.vue"
import {
        mapGetters,
        mapActions
    } from 'vuex';


    export default {
        computed: mapGetters(['allpost']),
        components:{
            'slider':slider,
            'popularity': popularity,
            'home-details': details,
            'testimonial': test,
            'counter': counter,
            'agents': agents,
        },
            mounted() {
            console.log('Component mounted.');
             this.fetchpost();
             this.scrollToTop();
        },
        methods:{
             ...mapActions(['fetchpost']),

             scrollToTop() {
                window.scrollTo(0,0);
           },

        }
    }
</script>
