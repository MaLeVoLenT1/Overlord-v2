<template>
    <section class="body-content" id="loading">
        <loading v-if="isLoading === true"/>
        <overlord-parallax :display="'sub'"/>
        <section class="body-content">
            <page-container :location="location" :data_top="true" :data_bottom="true" :background-color="'transparent'" :has-menu="true">
                <!-- Side Menu -->
                <template v-slot="sideMenu">

                </template>

            </page-container>
        </section>


    </section>

</template>

<script>

import api from "../../blockchain/Interface/lib/apis/API";
import {Blockchain} from '../../blockchain/blockchain';

import OverlordParallax from "../hud/parallax/OverlordParallaxV1.vue";
import pageContainer from "../hud/pageContainer/PageContainer.vue";
import Loading from "../hud/loading.vue";

export default {
    name: "Crypto",
    components: {Loading, OverlordParallax, pageContainer},
    data(){
        return {
            isLoading: true,
            location: window.vDashboard.location,
            user: window.vDashboard.user,
            requests: window.vDashboard.requests,
            assetName:"ethereum",
            blockchains:[],
            data:null

        }
    },
    async created(){
        console.log("Crypto Portal Created.");
        this.GenerateBlockchains();
        await this.GenerateAPIData();
    },
    mounted(){
        console.log("Crypto Portal Mounted.");
        let self = this; self.loaded();
    },
    methods: {
        loaded(){
            let self = this;
            $('html,body').scrollTop(0);
            $('#loading').waitForImages(function() {self.isLoading = false;});
        },
        // Blockchain
        GenerateBlockchains(){
            let self = this;
            let BTC = new Blockchain("Bitcoin", true);
            self.blockchains.push(BTC);

        },

        // API
        async GenerateAPIData(){
            let self = this;
            let settings = {
                    currency: "usd", localization: "en", enabled: true,
                    api:{ type: "gecko", permissions: "public", keys: []},
                    cache: { enabled: true, time: 60}
            };

            self.data = new api(self.assetName, 'crypto-price,exchange,blockchain,account', settings);

        },

        // Cryptocurrency
        GenerateCryptocurrency(){
            let self = this;
        }
    },


}
</script>

<style scoped>

</style>
