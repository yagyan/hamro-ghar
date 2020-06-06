<template>
<component-to-re-render :key="componentKey">
     <div class="popular_property">
        <div class="container" style="padding-top:50px">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-40 text-center">
                        <h3>Searched Items</h3>
                    </div>
                </div>
            </div>
            <div class="row">

                <div v-for="post in filteredposts" :key="post.id">
                    <div class="col-xl-14 col-md-16 col-lg-14" style="padding: 5px">
                        <div class="single_property">
                            <div class="property_thumb" style="height:240px; width:362px ">
                                <div class="property_tag">
                                    For {{post.characteristics}}
                                </div>
                                <router-link :to="{ path: 'singlepost', query: { id: post.id }}">
                                <img class="img-fluid" v-bind:src="post.front_view"
                                    onerror="if (this.src != 'error.jpg') this.src = 'img/property/6.png';">
                                </router-link>
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
           
        </div>
    </div>
  </component-to-re-render>
</template>

<script>
export default {
    data(){
        return{
           componentKey:0,
            type_id:this.$route.query.type,
            bed:this.$route.query.bed,
            bath:this.$route.query.bathroom,
            price:this.$route.query.price,
            posts:[],
        }
    },
     created() {
            console.log('Component mounted.')
            this.fetchsearch();
            
            
        },
        
        computed: {
    filteredposts:function()
    {   let type=this.type_id;
        let bed_no=this.bed;
        let bathroom=this.bath;
        let price=this.price;
        return this.posts
            .filter(function(posts)
            {   
                if(type!=0)
                {
                
                return posts.propertytype_id ==type;
                }
                 
                else
                {
                return posts;
                }

               
            })
            .filter(function(posts)
            {
                 if(bed_no!=0)
                {
                return posts.bed ==bed_no;
                }
                else
                {
                return posts;
                }

            })
            .filter(function(posts)
            {
                 if(bathroom!=0)
                {
                return posts.bathroom ==bathroom;
                }
                else
                {
                return posts;
                }
                
            })
            .filter(function(posts)
            {
                 if(price!=0)
                {
                return posts.price ==price;
                }
                else
                {
                return posts;
                }
            })
            
      
            
            
    },
    
},

        methods:{
           
            fetchsearch(){
                axios.get('api/post')
                    .then(({
                        data
                    }) =>{ this.posts = data;
                    
                    })
            },
        }

}
</script>

<style>

</style>