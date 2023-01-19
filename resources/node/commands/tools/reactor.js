const {SlashCommandBuilder} = require('discord.js');
module.exports = {
    data: new SlashCommandBuilder()
        .setName('reactor')
        .setDescription("emoji reaction example."),
    async execute(interaction, bot){
        const message = await interaction.reply({
            content: 'React Here!',
            fetchReply: true
        });


    }
}
