import axios from 'axios';

const state = {
    post:[],
    states:[]
};

const getters = {
    allpost: (state) =>state.post,
    allstates: (state) =>state.states
};


const actions = {
    async fetchpost({commit}) {
        const response = await axios.get('api/post');
        commit('setpost',response.data);
    },
    async fetchstates({commit}) {
        const response = await axios.get('api/state');
        commit('setstates',response.data);
    }
};

const mutations ={
    setpost: (state,post) => (state.post = post),
    setstates: (state,states) => (state.states = states)
};


export default{
    state,
    getters,
    actions,
    mutations
}