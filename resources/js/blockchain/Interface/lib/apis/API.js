const CoinList = require("../../../../blockchain/Interface/lib/apis/json/CoinGecko/GeckoCoinList.json");
const ExchangeList = require("../../../../blockchain/Interface/lib/apis/json/CoinGecko/GeckoExchangeList.json");
const BlockchainList = require("../../../../blockchain/Interface/lib/apis/json/CoinGecko/GeckoBlockchainList.json");
const NFTList = require("../../../../blockchain/Interface/lib/apis/json/CoinGecko/GeckoNFTList.json");
const Config = require("../../../../blockchain/Interface/lib/apis/json/config.json");

import axios from 'axios';

export default class api{
    /** Calls the API and returns the data
     * @param asset - The asset to get the data for (Cryptocurrency, NFTs, blockchains, exchanges, companies, etc by name.)
     * @param call - The call to make to the APIs (crypto-simple, crypto, crypto-market, crypto-blockchain,
     *                  exchanges, exchanges-simple, exchanges-market, exchanges-derivatives,
     *                  exchanges-derivatives-simple, exchanges-pro, exchanges-pro-simple, exchanges-pro-market,
     *                  finance-products, finance-products-simple, finance-products-market, finance-platforms,
     *                  blockchain, blockchain-simple, blockchain-market, blockchain-blocks)
     * @param settings - The settings object to use for the API call. See the documentation for more information.
     * @returns {Promise<*>} */
    constructor(asset = 'bitcoin', call='crypto-simple', settings = Config.defaultSettings)
    {
        this.data = null;
        this.asset = null;

        if (!this.findAsset(asset)) throw new Error(`The asset ${asset} was not found.`);
        if (!this.checkSettings(settings)) throw new Error(`The Settings object, is incorrectly formatted. Please check the documentation.`);

        if (!this.computeCall(call).response) throw new Error(`The call ${call} was not found.`);
        else this.call = this.computeCall(call);

        this.urls = {
            private: {
                coinbase: 'https://api.coinbase.com/v2',
                binance: 'https://api.binance.com/api/v3',
                blockchain: 'https://blockchain.com',
            },
            pro: {
                coinMarketCap: 'https://pro-api.coinmarketcap.com/v1'
            },
            public: {
                gecko: 'https://api.coingecko.com/api/v3',
                coinMarketCap: 'https://pro-api.coinmarketcap.com/v1',
                blockchain: 'https://blockchain.info',
                blockCypher: 'https://api.blockcypher.com/v1',
                blockStream: 'https://blockstream.info/api'
            }
        }

    }

    /** Finds the coin in the list of coins
     * @param name
     * @returns {boolean} */
    findCoin(name){
        let cryptoFound = false;

        CoinList.forEach((coin) => {
            if(coin.name.toLowerCase() === name.toLowerCase()){ this.asset = coin; cryptoFound = true; } });

        if(!cryptoFound){
            CoinList.forEach((coin) => {
                if(coin.symbol.toLowerCase() === name.toLowerCase()){ this.asset = coin; cryptoFound = true;} });
        }

        if(!cryptoFound){
            CoinList.forEach((coin) => {
                if(coin.id.toLowerCase() === name.toLowerCase()){ this.asset = coin; cryptoFound = true;} });
        }

        return cryptoFound;
    }

    /** Finds the exchange in the list of exchanges
     * @param name
     * @returns {boolean} */
    findExchange(name){
        let exchangeFound = false;

        ExchangeList.forEach((exchange) => {
            if(exchange.name.toLowerCase() === name.toLowerCase()){ this.asset = exchange; exchangeFound = true; } });

        if(!exchangeFound){
            ExchangeList.forEach((exchange) => {
                if(exchange.symbol.toLowerCase() === name.toLowerCase()){ this.asset = exchange; exchangeFound = true;} });
        }

        if(!exchangeFound){
            ExchangeList.forEach((exchange) => {
                if(exchange.id.toLowerCase() === name.toLowerCase()){ this.asset = exchange; exchangeFound = true;} });
        }

        return exchangeFound;
    }

    /** Finds the blockchain in the list of blockchains
     * @param name
     * @returns {boolean} */
    findBlockchain(name){
        let blockchainFound = false;

        BlockchainList.forEach((blockchain) => {
            if(blockchain.name.toLowerCase() === name.toLowerCase()){ this.asset = blockchain; blockchainFound = true; } });

        if(!blockchainFound){
            BlockchainList.forEach((blockchain) => {
                if(blockchain['shortname'].toLowerCase() === name.toLowerCase() && name !== ""){ this.asset = blockchain; blockchainFound = true;} });
        }

        if(!blockchainFound){
            BlockchainList.forEach((blockchain) => {
                if(blockchain.id.toLowerCase() === name.toLowerCase()){ this.asset = blockchain; blockchainFound = true;} });
        }

        return blockchainFound;
    }

    /** Finds the NFT in the list of NFTs
     * @param name
     * @returns {boolean} */
    findNFT(name){
        let nftFound = false;

        NFTList.forEach((nft) => {
            if(nft.name.toLowerCase() === name.toLowerCase()){ this.asset = nft; nftFound = true; } });

        if(!nftFound){
            NFTList.forEach((nft) => {
                if(nft.symbol.toLowerCase() === name.toLowerCase()){ this.asset = nft; nftFound = true;} });
        }

        if(!nftFound){
            NFTList.forEach((nft) => {
                if(nft.id.toLowerCase() === name.toLowerCase()){ this.asset = nft; nftFound = true;} });
        }

        return nftFound;
    }

    /** Finds asset in the list of assets
     * @param name
     * @returns {boolean} */
    findAsset(name){
        let assetFound = false;
        if (this.findCoin(name)) assetFound = true;
        else if (this.findExchange(name)) assetFound = true;
        else if (this.findBlockchain(name)) assetFound = true;
        else if (this.findNFT(name)) assetFound = true;
        return assetFound;
    }

    /** Checks the settings object to see if it is correctly formatted
     * @param settings
     * @param defaults
     * @returns {boolean} */
    checkSettings(settings, defaults = Config.defaultSettings){
        // Get the keys of both objects as arrays.
        let keys1 = Object.keys(defaults);
        let keys2 = Object.keys(settings);

        // Check if the lengths of both arrays are equal. If not, return false.
        if (keys1.length !== keys2.length) return false;

        // Loop through the keys of one object
        for (let key of keys1) {
            // Check if the other object has the same key. If not, return false.
            if (!settings.hasOwnProperty(key)) return false;

            // Checks if the key is a property array named Keys. Because an array is always a collection of objects.
            // Instead, run a specific validation by looping through each element.
            // the array and checking if it's a string.
            if(key === "keys") {
                if(Array.isArray(defaults[key]) && Array.isArray(settings[key])){
                    // Loops through Object.keys[], to check if all elements within the array is of type string.
                    // not return false.
                    let objectArray2 = settings[key];
                    for (let arrayElement of objectArray2) if (typeof arrayElement !== 'string') return false;
                }

            }

            // Property is not named, "keys".
            else {
                // Check if the values of both objects are also objects
                if (typeof defaults[key] === 'object' && typeof settings[key] === 'object') {
                    // If so, recursively compare them by their keys
                    let result = this.checkSettings(settings[key], defaults[key]);

                    // If they are not equal, return false
                    if (!result) return false;
                }

            }

        }

        // If no false is returned in the loop,  set settings and return true
        this.settings = settings;
        return true;
    }

    computeCall(call){
        let options = [], callType;

        if (call.split('-').length < 2) callType = call;
        else {
            let optionsString = call.split('-')[1];
            callType = call.split('-')[0];

            if (optionsString.split(',').length > 1) options = optionsString.split(',');
            else options.push(optionsString);

        }




        return {response:true, options:options, call:callType};
    }

    async getCoinInfo(call = 'crypto-simple'){
        let option = call.split('-')[1];
        let callType = call.split('-')[0];
        if (callType !== 'crypto') throw new Error('Invalid call type. Must be "crypto"');

        switch (option) {
            case 'simple':

                break;

            case 'full':
                break;

            default:

                break;

        }

        let url = `${this.urls[this.settings.permissionType][this.type]}/coins/${this.name}`;
        let response = await axios.get(url);
        return await response.data;
    }

    async getCoinMarketInfo(){

    }

    async getCoinPrice(){

    }

    async getCoinMarketCap(){
        let url = `${this.urls[this.settings.api.permissions][this.settings.api.type]}/cryptocurrency/quotes/latest?id=${this.name}`;
        let response = await axios.get(url, {
            headers: {
                'X-CMC_PRO_API_KEY':  this.settings.api.keys[this.settings.api.type]
            }
        });
        return await response.data;
    }

    async getCoinMarketCapHistorical(){
        let url = `${this.urls[this.settings.permissionType][this.settings.api.type]}/cryptocurrency/quotes/historical?id=${this.name}&time_start=2018-01-01T00:00:00Z&time_end=2018-01-02T00:00:00Z`;
        let response = await axios.get(url, {
            headers: {
                'X-CMC_PRO_API_KEY': this.settings.api.keys[this.settings.api.type]
            }
        });
        return await response.data;
    }

    async getApiInfo(){

    }
}


