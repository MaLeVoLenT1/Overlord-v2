require('../app');
require('../dashboard');

import publicPages from "../components/hud/publicPages";
const { createApp } = Vue;

createApp({
    components: {
        'public-pages': publicPages,
    },
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
    }
}).mount("#app");
