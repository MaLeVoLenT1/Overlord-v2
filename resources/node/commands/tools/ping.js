const {SlashCommandBuilder} = require('discord.js');
module.exports = {
    data: new SlashCommandBuilder()
        .setName('my-ping')
        .setDescription("Return my Ping."),
    async execute(interaction, bot){
        const message = await interaction.deferReply({
            fetchReply: true
        });

        // Displays User PING information
        const newMessage = `API Latency: ${bot.ws.ping}\nClient Ping: ${message.createdTimestamp - interaction.createdTimestamp}`;
        await interaction.editReply({
            content: newMessage
        });
    }
}
