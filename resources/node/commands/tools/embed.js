const {SlashCommandBuilder, EmbedBuilder, Embed} = require('discord.js');

module.exports = {
    data: new SlashCommandBuilder()
        .setName("embed")
        .setDescription("Returns Test embed."),
    async execute(interaction, bot) {
        const embed = new EmbedBuilder()
            .setTitle(`This is an Embed!!!`)
            .setDescription(`This is a very cool description!`)
            .setColor(0x18e1ee)
            .setImage(bot.user.displayAvatarURL())
            .setThumbnail(bot.user.displayAvatarURL())
            .setTimestamp(Date.now())
            .setAuthor({
                url: `https://youtube.com`,
                iconURL: interaction.user.displayAvatarURL(),
                name: interaction.user.tag
            })
            .setFooter({iconURL: bot.user.displayAvatarURL(), text: bot.user.tag })
            .setURL(`https://youtube.com`)
            .addFields([
                {
                    name:`field 1`,
                    value: `value 1`,
                    inline: true
                },
                {
                    name:`field 2`,
                    value: `value 2`,
                    inline: true
                },
            ]);

            await interaction.reply({
                embeds: [embed]
            });
    }
}
