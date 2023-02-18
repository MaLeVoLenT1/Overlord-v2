class MarketCap {
    constructor(API = null, name = null) {
        if (API !== null) {
            this.marketCap = API.market_data.market_cap;
            this.marketCapChange = API.market_data.marketCapChangePercentage24h;
            this.Rank = API.market_data.marketCapRank;
            this.MarketCapToTVL = API.market_data.mcap_to_tvl_ratio;
        }

    }

    getMarketCap() {
        return this.marketCap;
    }

    setMarketCap(API) {
        // this.marketCap = marketCap;
    }
}
