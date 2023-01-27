<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"/>
        <overlord-parallax-v1 :display="'main'"/>
    </section>
</template>

<script>
import Loading from "../hud/loading.vue";
import OverlordParallaxV1 from "../hud/parallax/OverlordParallaxV1.vue";
    export default {
        components: {
            Loading, OverlordParallaxV1
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
