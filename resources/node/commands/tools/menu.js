const {SlashCommandBuilder, StringSelectMenuBuilder, ActionRowBuilder, StringSelectMenuOptionBuilder} = require('discord.js');
module.exports = {
    data: new SlashCommandBuilder()
        .setName('menu')
        .setDescription("Returns a Select Menu."),
    async execute(interaction, bot){
        const menu = new StringSelectMenuBuilder()
            .setCustomId(`sub-menu`)
            .setMinValues(1)
            .setMaxValues(1)
            .setOptions(
                new StringSelectMenuOptionBuilder({
                    label: `Option 1`,
                    value:`https://youtube.com`
                }),
                new StringSelectMenuOptionBuilder({
                    label: `Option 2`,
                    value:`https://twitter.com`
                })
            );
        await interaction.reply({
            components: [new ActionRowBuilder().addComponents(menu)]
        });


    }
}
