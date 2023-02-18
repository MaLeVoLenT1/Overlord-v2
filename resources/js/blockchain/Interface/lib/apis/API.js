import axios from 'axios';
export default class api{
    name;
    /**
     *  Calls the API and returns the data
     * @param asset
     * @param call
     * @param  settings {
     *     currency: 'usd',
     *     localization: 'en',
     *     api:{ permission: 'public',
     *           type: 'gecko',
     *           keys: []
     *         }
     * }
     * @returns {Promise<*>}
     */
    constructor(call='coins', asset = 'bitcoin',  settings= {
        currency: 'usd',
        localization: 'en',
        enabled: true,
        api:{
            type: 'gecko',
            permissions: 'public',
            keys: []
        },
        cache: {
            enabled: true,
            time: 60,
        },
    }){
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

        this.name = asset;
        this.settings = settings;
        this.data = null;


        switch (settings.api.permissions){
            case 'public': default:

                break;

            case 'private':
                this.key = settings.api.keys[settings.api.type];

                break;

            case 'pro':
                this.key = settings.api.keys[settings.api.type];

                break;
        }

    }

    async getCoinInfo(){
        let url = `${this.urls[this.settings.permissionType][this.type]}/coins/${this.name}`;
        let response = await axios.get(url);
        return await response.data;
    }

    async getCoinMarketInfo(){
        let url = `${this.urls[this.options.permissionType][this.type]}/coins/${this.name}/market_chart?vs_currency=${this.options.currency}&days=1`;
        let response = await axios.get(url);
        return await response.data;
    }

    async getCoinPrice(){
        let url = `${this.urls[this.options.permissionType][this.type]}/simple/price?ids=${this.name}&vs_currencies=${this.options.currency}`;
        let response = await axios.get(url);
        return await response.data;
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
        let url = `${this.urls[this.settings.api.permissions][this.settings.api.type]}/info`;
        let response = await axios.get(url);
        return await response.data;
    }
}


