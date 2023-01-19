const {
    SlashCommandBuilder, ModalActionRowComponentBuilder, ActionRowModalData, ActionRowBuilder,
    TextInputModalData, TextInputStyle, ModalBuilder, TextInputBuilder
} = require('discord.js');

module.exports = {
    data: new SlashCommandBuilder()
        .setName('modal')
        .setDescription("Displays test Modal."),
    async execute(interaction, bot){

        const modal = new ModalBuilder()
            .setCustomId("fav-color")
            .setTitle("Fav Color?");

        const textInput = new TextInputBuilder()
            .setCustomId("favColorInput")
            .setLabel("What is your favorite color?")
            .setRequired(true)
            .setStyle(TextInputStyle.Short);

        modal.addComponents(new ActionRowBuilder().addComponents(textInput));

        await interaction.showModal(modal);

    }
}
