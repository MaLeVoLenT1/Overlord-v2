<template>

</template>

<script>

import api from "../../blockchain/Interface/lib/apis/API";
import {Blockchain} from '../../blockchain/blockchain';
export default {
    name: "Crypto",
    data(){
        return {
            settings: {
                currency: 'usd',
                localization: 'en',
                enabled: true,
                api:{
                    type: 'gecko',
                    permissions: 'public',
                },
                cache: {
                    enabled: true,
                    time: 60,
                }
            },
            blockchains:[]

        }
    },
    created(){
        console.log("Crypto Portal Created.");
        this.GenerateBlockchains();
        this.GenerateAPIData();


    },
    methods: {
        // Blockchain
        GenerateBlockchains(){
            let self = this;
            let BTC = new Blockchain("Bitcoin", true);
            self.blockchains.push(BTC);

        },

        // API
        GenerateAPIData(){
            let self = this;
            let API = new api('coins', 'bitcoin', self.settings);
            console.log(API);
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
