<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"/>
        <overlord-parallax-v1 :display="'main'"/>

        <modal v-if="modal" @close="modal = false" :width="'50%'">
            <h3 slot="header" style="margin-bottom: 0; color: rgb(214, 214, 214);">
                Welcome !
            </h3>
        </modal>
        <!-- Page Content -->
        <section class="body-content">

        </section>
    </section>
</template>

<script>
import Loading from "../hud/loading.vue";
import OverlordParallaxV1 from "../hud/parallax/OverlordParallaxV1.vue";
import Modal from "../hud/modal.vue";
    export default {
        components: {
            Loading, OverlordParallaxV1, Modal
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
