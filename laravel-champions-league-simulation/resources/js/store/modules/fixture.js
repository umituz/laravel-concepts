import axios from "axios";

const state = {
    fixtures: [],
}

const getters = {
    fixtures: (state) => state.fixtures,
}

const actions = {
    getFixture({commit}) {
        axios.get(`/api/fixtures`)
            .then(response => {
                commit('setFixture', response.data);
            })
            .catch(error => {
                console.log("Unable to fetch data : " + error);
            });
    },
    setFixture({commit}, payload) {
        commit('setFixture', payload);
    }
}

const mutations = {
    setFixture(state, data) {
        state.fixtures = data;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}
