const fs = require('fs');
const config = require("../../config.json");

module.exports = (bot) => {
    bot.handleEvents = async () => {
        const eventFolders = fs.readdirSync(`${config.appLocation}/events`);
        for (const folder of eventFolders){
            const eventFiles = fs.readdirSync(`${config.appLocation}/events/${folder}`).filter(file => file.endsWith('.js'));

            switch (folder){
                case "client":
                    for (const file of eventFiles) {
                        const event = require(`../../events/${folder}/${file}`);
                        if (config.debugger.handler.events) console.log(`Event: ${event.name} Passed through the handler.`);
                        if(event.once) bot.once(event.name, (...args) => event.execute(...args, bot));
                        else bot.on(event.name, (...args) => event.execute(...args, bot));
                    }
                    break;
                default:
                    break;

            }
        }
    }
}
