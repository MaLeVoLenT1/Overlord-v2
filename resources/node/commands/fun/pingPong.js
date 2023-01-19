module.exports = {
    data:{
        name:'ping',
        description:'Play Ping Pong With Overlord',
        toJSON() {
            return {
                name: this.name,
                description: this.description
            };
        }
    },
    async execute(interaction, bot){
        await interaction.reply({
            content: `Pong!`
        });

    }

}
