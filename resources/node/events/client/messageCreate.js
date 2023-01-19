const config = require('../../config.json');

module.exports = {
    name: 'messageCreate',
    async execute(message, bot) {
        if(message.author.bot) return;
        const useDebugger = config.debugger.events.message;
        if (useDebugger) console.log(`Message Create: "${message.content}" Created By: ${message.author.tag} Created At: ${message.createdAt}`);


        let userCommand, prefix;

        /** Determines if the user used the right starter to start a command. */
        // If Discord user used the guild prefix.
        if (message.content.substr(0,1) === config.prefix.symbol){
            if (useDebugger) console.log("Prefix Used.");

            userCommand = message.content.split(config.prefix.symbol)[1];
            prefix = message.content.substr(0,1);
        }

        // If Discord user used the guild phrase.
        else if(message.content.substr(0, config.prefix.phrase.length).toLowerCase() === config.prefix.phrase.toLowerCase()){
            if (useDebugger) console.log("Phrase Used.");

            userCommand = message.content.split(message.content.substr(0,config.prefix.phrase.length))[1].trim();
            prefix = message.content.substr(0, config.prefix.phrase.length).toLowerCase();
        }

        // If no starter prefix was found then do nothing.
        else { if (useDebugger) console.log("No prefix or phrase used."); return; }

        /** Finds the command. */
        // If a starter prefix was found.
        if (useDebugger) console.log(`Prefix: ${prefix} Found.`)

        // Attempts to find the intended command.
        const {commands} = bot;
        let command = commands.get(userCommand);
        let args = [];


        if (!command) {
            if (useDebugger) console.log(`Interaction Create: COMMAND NOT FOUND YET: ${userCommand}`);

            // After the prefix is split from the string, the message is then split by word.
            // To determine if the first word within the message is a proper command with arguments.
            const argSplit = userCommand.split(" ");
            command = commands.get(argSplit[0]);

            // If the first word in the message isn't a command, then return.
            if (!command) {
                if (useDebugger) console.log(`Interaction Create: COMMAND NOT FOUND AT ALL: ${argSplit[0]}`);
                return;
            }

            // This splits the command from the arguments of the command.
            console.log(`Command Found: ${argSplit[0]}.`);
            if (argSplit.length !== 1) for (let i = 1, length = argSplit.length; i < length; i++) args.push(argSplit[i]);

            if (command.data.hasArguments){
                // if (useDebugger) console.log(`Interaction Create: These are the args - `);
                // if (useDebugger) console.log(args);
            }


        }
        // Attempts to run the command found.
        if (config.debugger.events.message) console.log(`COMMAND FOUND: ${command.data.name}`);
        try {
            await command.execute(message, bot, args);
            if (config.debugger.events.message) console.log(`Interaction Create: ${userCommand} executed(Chat Input).`);

        } catch (e) {
            if (config.debugger.events.message) console.error(e);
            await message.reply({content: `[ERROR] INTERACTION CREATE: Chat Input`, ephemeral: true});
        }
    }
};
