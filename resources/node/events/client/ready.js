const config = require('../../config.json');

module.exports = {
    name: 'ready',
    once: true,
    async execute(bot) {
        if (config.debugger.events.ready) console.log(`Ready!!! ${bot.user.tag} is logged in and online.`);

        // Create an invite link for the bot
        if (config.debugger.inviteLink){
            const inviteLink = bot.generateInvite({scopes: ['bot'], permissions: ['Administrator']});
            console.log(`Invite link: ${inviteLink}`);
        }
    }
}
