<template>

</template>

<script>

import api from "../../blockchain/Interface/lib/apis/API";
import {Blockchain} from '../../blockchain/blockchain';
export default {
    name: "Crypto",
    data(){
        return {
            assetName:"ethereum",
            settings: {
                "currency": "usd", "localization": "en", "enabled": true,
                "api":{"type": "all", "permissions": "public", "keys": []},
                "cache": {"enabled": true, "time": 60}
            },
            blockchains:[],
            data:null

        }
    },
    async created(){
        console.log("Crypto Portal Created.");
        this.GenerateBlockchains();
        await this.GenerateAPIData();
    },
    methods: {
        // Blockchain
        GenerateBlockchains(){
            let self = this;
            let BTC = new Blockchain("Bitcoin", true);
            self.blockchains.push(BTC);

        },

        // API
        async GenerateAPIData(){
            let self = this;

            self.data = new api(self.assetName);

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
