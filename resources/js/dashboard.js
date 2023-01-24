//import Vue from 'vue';

window.vDashboard = Vue.createApp({
    name: 'Dashboard',
    data(){
        return{
            location:  ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['page'] :  null),
            user: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['user'] : null),
            requests: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['request'] :  null),
            section: ((typeof overlord.Dashboard !== 'undefined') ? overlord.Dashboard['section'] :  null),
            userConfig:{
                isSignedIn: false,
                overlord_rank: '',
                hasAPI: false,
                belongsToGuilds:false,
                belongsToAlliances: false,
                belongsToHubs: false,

                isGuildLeader: false,
                isAllianceLeader: false,
                isHubLeader: false,

            },
        }

    },
    template: `<div></div>`,
    created(){
        let self = this;
        console.log("Dashboard Created.");

    }
}).mount("#dash");
