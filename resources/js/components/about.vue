<template>
    <div style="padding-top:150px">
         
        <agents></agents>
        <testimonial></testimonial>
    </div>
</template>

<script>
import test from "../components/testimonial.vue"
import agents from "../components/agents.vue"
    export default {
        components:{   
            'testimonial': test,            
            'agents': agents,
        },
        mounted() {
            console.log('Component mounted.')
        }
        //hello
    }
</script>
