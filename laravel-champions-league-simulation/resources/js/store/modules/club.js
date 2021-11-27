import axios from "axios";

const state = {
    clubs: [],
    totalClub: 0
}

const getters = {
    clubs: (state) => state.clubs,
    totalClub: (state) => state.totalClub,
}

const actions = {
    getClubs({commit}) {
        axios.get(`api/clubs`)
            .then(response => {
                commit('setClub', response.data.data);
                commit('setTotalClub', response.data.total);
            })
            .catch(error => {
                console.log("Unable to fetch data : " + error);
            });
    },
    setClubs({commit},payload){
        commit('setClub', payload);
        commit('setTotalClub', payload.length);
    }
}

const mutations = {
    setClub(state, data) {
        state.clubs = data;
    },
    setTotalClub(state, data) {
        state.totalClub = data;
    },
}

export default {
    state,
    getters,
    actions,
    mutations
}
