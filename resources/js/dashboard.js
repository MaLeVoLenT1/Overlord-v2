import Vue from 'vue';
export const EventBus = new Vue();
window.vDashboard = new Vue({
    data(){
        return{
            location: null,
            user: null,
            requests: null,
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

});
