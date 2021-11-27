require('./gallery-bootstrap');

window.Vue = require('vue');

import App from "./components/App";

window.laravelGalleryEvent = new Vue();

const app = new Vue({
    el: '#laravel-gallery',
    components: {
        App
    }
});
