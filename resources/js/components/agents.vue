<template>
    <!-- team_area  -->
        <div class="team_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title mb-40 text-center">
                            <h3>
                                Our Agents
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div v-for="agent in agents" :key='agent.id'>
                    <div class="col-xl-10 col-md-12 col-lg-10" style="padding: 5px">
                        <div class="single_team">
                            <div class="team_thumb">
                                <img src="img/team/1.png" alt="">
                                <div class="social_link">
                                    <ul>
                                        <li><a href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li><a href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li><a href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team_info text-center">
                                <h3>Milani Mou</h3>
                                <p>Business Agent</p>
                            </div>
                        </div>
                    </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- /team_area  -->
</template>

<script>
    export default {
        data(){
            return{
                agents:[{'id':'1'},{'id':'2'},{'id':'3'},{'id':'4'}],
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
