import Price from './lib/properties/Price.js';
import Supply from './lib/properties/Supply.js';
import MarketCap from './lib/properties/MarketCap.js';
import API from './lib//apis/API.js';
import axios from 'axios';

class Cryptocurrency{
    constructor(name = null, settings = {
        currency: 'usd', localization: 'en', enabled: true,
        api:{type: 'gecko', permissions: 'public', keys: []},
        cache: {enabled: true, time: 60,},
    }, api = null)
    {
        // If the name is null, then the cryptocurrency is being created from the gecko api
        if (api !== null) {
            this.API = api;
            this.id =  this.API.id;
            this.name =  this.API.name;
            this.symbol =  this.API.symbol;
            this.image =  this.API.image['thumb'];

            this.description =  this.API.description;
            this.links =  this.API.links;
            this.platform =  this.API.platform;

            this.market = {
                updated:  this.API['market_data']['last_updated'],
                volume:  this.API['market_data']['total_volume'],
                TotalValueLocked:  this.API['market_data']['total_value_locked'],
                marketCap: new MarketCap(API),
                price: new Price(API),
                supply: new Supply(API)
            }

        }
        // If the Input API is null, then the cryptocurrency is being created from the name
        else {

            if(name !== null){
                this.name = name;
                this.API = new API('coins', 'bitcoin', settings);
            }

            else{

            }
        }

    }

    // A method to display the basic information of the crypto
    showInfo() {
        console.log(`Name: ${this.name}`);
        console.log(`Symbol: ${this.symbol}`);
        console.log(`Current Price: ${this.market.price.current} USD`);
        console.log(`Market Cap Rank: ${this.market.marketCap}`);
        console.log(`Last Updated: ${this.market.updated}`);
    }

    // A method to compare the current price with the all-time high and low
    comparePrice() {
        if(this.market) {

            // calculate the percentage difference between the current price and the all-time high and low
            if(this.market.price){
                let high_diff = ((this.market.price.current - this.market.price.ath.price) / this.market.price.ath.price) * 100;
                let low_diff = ((this.market.price.current - this.market.price.atl.price) / this.market.price.atl.price) * 100;

                // display the results
                console.log(`The current price: ${this.name} is ${high_diff.toFixed(2)}% lower than its all-time high of ${this.market.price.ath.price} USD on ${this.market.price.ath.date}.`);
                console.log(`The current price: ${this.name} is ${low_diff.toFixed(2)}% higher than its all-time low of ${this.market.price.atl.price} USD on ${this.market.price.atl.date}.`);
            }
        }

    }

    /**
     * A method to update the information by pulling it from CoinGecko
     * @returns {Promise<void>} */
    async updateInfo() {
        // use the coingecko API to fetch the current data
        // https://www.coingecko.com/api/documentations/v3#/coins/get_coins__id_
        let response = await axios.get(`https://api.coingecko.com/api/v3/coins/${this.id}`);
        let API = await response.data;

        // update the properties with the latest data
        console.log(API);

    }
}
