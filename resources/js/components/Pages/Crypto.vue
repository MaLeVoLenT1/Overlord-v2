<template>

</template>

<script>
require('../../blockchain/blockchain');

import {Blockchain} from '../../blockchain/blockchain';
export default {
    name: "Crypto",
    data(){
        return {
            blockchains:[]
        }
    },
    created(){
        console.log("Crypto Portal Created.");
        this.GenerateBlockchains();


    },
    methods: {
        GenerateBlockchains(){
            let self = this;
            let blockchains = [];
            let BTC = new Blockchain("Bitcoin", true);

            blockchains.push(BTC);
            self.blockchains = blockchains;
        }
    },


}
</script>

<style scoped>

</style>
