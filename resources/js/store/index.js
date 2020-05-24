import Vuex from 'vuex';
import Vue from 'vue';
import post from './modules/post';

//load Vuex
Vue.use(Vuex);

//create Store
export default new Vuex.Store({
    modules:{
      post  
    }
})