require('./bootstrap');
window.Vue = require('vue').default;
import Vue from 'vue';
import App from './layouts/App';
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

// vue routes under router folder
import router from './router'
// vuex states under store folder
import {store} from './store'

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router: router,
    store: store
});
