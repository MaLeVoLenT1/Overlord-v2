const {SlashCommandBuilder, ActionRowBuilder, ButtonBuilder, ButtonStyle} = require('discord.js');
module.exports = {
    data: new SlashCommandBuilder()
        .setName('button')
        .setDescription("A Test Button."),
    async execute(interaction, bot){
        const button = new ButtonBuilder()
            .setCustomId('test-button')
            .setLabel('Visit Youtube!')
            .setStyle(ButtonStyle.Primary);

        await interaction.reply({
            components: [new ActionRowBuilder().addComponents(button)]
        });

    }
}
