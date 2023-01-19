const {Embed, EmbedBuilder} = require('discord.js');
const cryptoLibrary = require("../../cryptoLibrary/coinGeckoCoinList.json");
const { request } = require('undici');

module.exports = {
    data: {
        name: "price",
        description: "Shows the current price of a cryptocurrency",
        hasArguments: true,
        toJSON() {
            return {
                name: this.name,
                description: this.description,
                hasArguments: this.hasArguments
            };
        }
    },
    async execute(interaction, bot, args){
        // Checks for arguments
        if (args === undefined){const message = await interaction.reply({content: `You need to add the crypto you wish me to report on.`});}
        else if (args.length === 0) {const message = await interaction.reply({content: `You need to add the crypto you wish me to report on.`});}
        else {
            console.log('Arguments Found.');
            console.log(args);

            let cryptoFound = cryptoLibrary.find(crypto => crypto.symbol === args[0]);

            (cryptoFound)? console.log(`Cryptocurrency ${cryptoFound.name} found!`): console.log(`Cryptocurrency ${args[0]} Not Found!`);
            if (!cryptoFound){

            }

            if (cryptoFound){
                const coinGeckoData = await request(`https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=${cryptoFound.id}`);
                const cryptoData  = await coinGeckoData.body.json();

                console.log(cryptoData[0]);

                const crypto = cryptoData[0];

                let price = `$${crypto.current_price.toLocaleString()}`;
                let rank = `#${crypto.market_cap_rank.toLocaleString()}`;
                let market_cap = `${crypto.market_cap.toLocaleString()}`;

                let price_change_24hr = `$${crypto.price_change_24h.toLocaleString()}`;
                let price_change_percentage_24h = `$${crypto.price_change_percentage_24h.toLocaleString()}`;
                let high_24h = crypto.high_34h;
                let low_24h = crypto.low_24h;

                let ATH = crypto.ath;
                let ATH_percentage = crypto.ath_change_percentage;
                let ATH_date = crypto.ath_date;

                let ATL = crypto.atl;
                let ATL_percentage = crypto.atl_change_percentage;
                let ATL_date = crypto.atl_date;

                let max_supply = crypto.max_supply;
                let total_supply = crypto.total_supply;
                let circulating_supply = crypto.circulating_supply;
                let total_volume = crypto.total_volume;

                // const message = await interaction.reply({content: cryptoData});
                const embed = new EmbedBuilder()
                    .setTitle(`Crypto Information provided by CoinGecko!`)
                    .setColor(0x18e1ee)
                    // .setImage(crypto.image)
                    .setThumbnail(crypto.image)
                    .setTimestamp(Date.now())
                    .setAuthor({
                        url: `https://www.coingecko.com/en/coins/${crypto.id}`,
                        iconURL: crypto.image,
                        name: `[${crypto.symbol.toUpperCase()}]-${crypto.name}`
                    })
                    .setFooter({iconURL: crypto.image, text: bot.user.tag })
                    .addFields([
                        { name:`Rank | Price`, value:"```css\n" + `#${crypto.market_cap_rank.toLocaleString()} - ` + `$${crypto.current_price.toLocaleString()}` + "```\n", inline: true },
                        {
                            name:`(%) Price Change 24hr`,
                            value:"```diff\n" +  `( ${crypto.price_change_percentage_24h.toLocaleString()} %)` + `$ ${crypto.price_change_24h.toLocaleString()}` + "```\n", inline: true
                        },
                        { name:`Market Cap`, value: `${crypto.market_cap.toLocaleString()}`, inline: false },
                        //{ name:`Rank`, value: `${crypto.market_cap_rank.toLocaleString()}`, inline: true },

                        { name:`All-Time-High`, value: "```md\n" + `[${crypto.ath_change_percentage}%]($${crypto.ath.toLocaleString()})` + "```\n", inline: true },
                        { name:`ATH Date`, value: `${crypto.ath_date.toLocaleString()}}`, inline: true },

                        { name:`All-Time-Low`, value: `(${crypto.atl_change_percentage}%) $${crypto.atl.toLocaleString()}`, inline: false },
                        { name:`ATL Date`, value: `${crypto.atl_date.toLocaleString()}}`, inline: true },
                    ]);

                await interaction.reply({
                    embeds: [embed]
                });
            }

        }





    }
}
