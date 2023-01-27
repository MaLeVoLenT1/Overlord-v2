<template>
    <section class="body-content" id="loading">
        <loading :location="location" v-if="isLoading === true"/>
    </section>
</template>

<script>
import Loading from "../hud/loading.vue";
    export default {
        components: {
            Loading
        },
        name: "Home",
        data(){
            return {
                location: window.vDashboard.location,
                user: window.vDashboard.user,
                requests: window.vDashboard.requests,
                id:'home',
                isLoading: true,
                modal: false,
            };
        },
        mounted(){
            let self = this; self.loaded();
            if(self.requests.message) self.modal = true;
        },
        methods: {
            loaded(){
                let self = this;
                $('html,body').scrollTop(0);
                $('#loading').waitForImages(function() {self.isLoading = false;});
            },

        }
    }
</script>

<style scoped>

</style>
