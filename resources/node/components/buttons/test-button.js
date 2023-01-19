module.exports = {
    data:{
        name: `test-button`
    },
    async execute(interaction, bot){
        await interaction.reply({
            content: `https://youtube.com`
        });
    }
}
