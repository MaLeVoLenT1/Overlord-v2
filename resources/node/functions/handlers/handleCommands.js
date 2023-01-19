const {REST, Routes} = require('discord.js');

const fs = require('fs');
const config = require("../../config.json");
module.exports = (bot) => {
    bot.handleCommands = async() => {
        const commandFolders = fs.readdirSync(`${config.appLocation}/commands`);

        for (const folder of commandFolders){
            const commandFiles = fs.readdirSync(`${config.appLocation}/commands/${folder}`).filter(file => file.endsWith('.js'));

            const {commands, commandArray} = bot;
            for (const file of commandFiles){
                const command = require(`../../commands/${folder}/${file}`);
                commands.set(command.data.name, command);
                commandArray.push(command.data.toJSON());
                if (config.debugger.handler.commands) console.log(`Command: '${command.data.name}' Passed through the handler.`);
            }
        }

        const rest = new REST({version: '9'}).setToken(config.token);

        try {
            if (config.debugger.handler.commands) console.log("Started refreshing application (/) commands.");
            await rest.put(Routes.applicationCommands(config.botID),{ body: bot.commandArray });
        } catch (e) { if (config.debugger.handler.commands) console.log(e); }
    };
};
