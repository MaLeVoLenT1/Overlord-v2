//import Vue from 'vue';
export const EventBus = Vue.createApp({})
window.vDashboard = Vue.createApp({
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
    created(){
        let self = this;
        console.log("Dashboard Created.");

        EventBus.$on('updateRequest', function (request) {
            console.log("Updating Request Item Object");
            self.requests.item = request;
        });
    }
})
