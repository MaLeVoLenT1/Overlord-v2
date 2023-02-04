require('../app');
require('../dashboard');

import publicPages from "../components/hud/publicPages";
import { createApp } from 'vue'

let Hub = {
    name: 'Hub',
    data() {
        return {
            ui:{userMenu: false},
            host: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['page']['host'] :  null),
            location:null,
            section: null,
            requests: null,
            user:null,
        };
    },
    methods: {
        setUpLocation(){
            let self = this;
            // Checks if the overlord object is available.
            if (typeof overlord.Dashboard !== 'undefined') {
                // Assigns the location object to pages that are loaded via the public pages component.
               self.location = overlord.Dashboard['page'];
               self.user = overlord.Dashboard['user'];
               self.section = overlord.Dashboard['section'];
               self.requests = overlord.Dashboard['request'];

                console.log(`PATH: ${overlord.Dashboard['path']} | URL: ${overlord.Dashboard['url']}`);
                console.log("Public Pages Loaded. Hub Created.");
            }
            else console.log("Public Pages Failed to Load.");
        },
        updateUser(user) {
            window.vDashboard.user = user;
            if (user.data !== null) {
                window.vDashboard.userConfig.isSignedIn = true;
                console.log("Signed-In");
            }
        },
        /**
         * Test emit function. */
        testCatch(){
            // console.log(' Home.js: test catch successful ');
        },
    },
    created(){
        let self = this;
        self.setUpLocation();
    }
};
const app = createApp(Hub).component('public-pages', publicPages).mount("#app");


