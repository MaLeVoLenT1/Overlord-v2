require('../app');
require('../dashboard');

import publicPages from "../components/hud/publicPages";
import { createApp } from 'vue'

const app = createApp({
    name: 'Hub',
    data() {
        return {
            ui:{userMenu: false},
            host: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['page']['host'] :  null),
        };
    },
    methods: {
        //Hud Controls
        updateUser(user) {
            window.vDashboard.user = user;
            if (user.data !== null) {
                window.vDashboard.userConfig.isSignedIn = true;
                console.log("Signed-In");
            }
        }
    },
    created(){
        let self = this;
        console.log("Hub Created.");

    }
}).component('public-pages', publicPages).mount("#app");


