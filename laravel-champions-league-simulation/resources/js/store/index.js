import Vue from 'vue'
import Vuex from 'vuex'
import modules from './modules/index.js'

Vue.use(Vuex)

export const store = new Vuex.Store({
  modules: {
    ...modules
  }
})
