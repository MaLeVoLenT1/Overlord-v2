class Price{
    constructor(name = null, options = {currency:'usd', localization:'en', enabled:true}, API = null)
    {
        if (API !== null) {
            this.current = API.market_data.current_price[options.currency];

            this.ath = {
                price: API.market_data.ath[options.currency],
                date: API.market_data.ath_date[options.currency],
                changePercentage: API.market_data.ath_change_percentage[options.currency]
            }

            this.atl = {
                price: API.atl,
                date: API.atlDate,
                changePercentage: API.atlChangePercentage
            }
            this.calculateChange(gecko);
        }
        else  {
            this.current = null;
            this.ath = {price: null, date: null, changePercentage: null}
            this.atl = {price: null, date: null, changePercentage: null}
            this.change = {time:'24h', price: null, percentage: null, low: null, high: null}

        }
    }

    // A method to display the price change over time
    calculateChange(gecko){
        console.log("Calculating Price Change");
        this.change = {time:'24h', price: gecko.priceChange24h, percentage: gecko.priceChangePercentage24h, low: gecko.low24h, high: gecko.high24h}
        /**
         * Calculate the change in price over the last 7 days
         * OpenAI: 1 day, 2 days, 1 month, 2 months, 6 months, 1 year
         */
        this.previous7d = null;
        this.previous14d = null;
        this.previous30d = null;
        this.previous60d = null;
        this.previous200d = null;
        this.previous1y = null;

    }
}
