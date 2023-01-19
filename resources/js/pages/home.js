require('../app');
require('../dashboard');

import publicPages from '../components/hud/PublicPages';
import Vue from 'vue';

let app = new Vue({
    name: 'App',
    el: '#app',
    components: {
        'public-pages': publicPages,
    },
});
