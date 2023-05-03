const config = require('../../config.json');
const {Configuration, OpenAIApi} = require('openai');

const AI_key = require('../../ai-config.json');
const configuration = new Configuration({
    organization: AI_key.organization,
    apiKey: AI_key.key,
});

/**
 * @param message
 * @returns {{prefix: string, userCommand: *, status: string}|{prefix: null, userCommand: null, status: boolean}} */
function findStarter(message){

    /** Determines if the user used the right starter to start a command. */
    // If Discord user used the guild prefix.
    if (message.content.substr(0,1) === config.prefix.symbol){
        return {
            status:"success. Prefix Used.",
            userCommand: message.content.split(config.prefix.symbol)[1],
            prefix: message.content.substr(0,1)
        }
    }

    // If Discord user used the guild phrase.
    else if(message.content.substr(0, config.prefix.phrase.length).toLowerCase() === config.prefix.phrase.toLowerCase()){
        return {
            status:"success. Phrase Used.",
            userCommand: message.content.split(message.content.substr(0,config.prefix.phrase.length))[1].trim(),
            prefix: message.content.substr(0, config.prefix.phrase.length).toLowerCase()
        }
    }

    // If no starter prefix was found then do nothing.
    else return { status:false, userCommand: null, prefix: null }

}

module.exports = {
    name: 'messageCreate',
    async execute(message, bot) {
        if(message.author.bot) return;
        const useDebugger = config.debugger.events.message;
        if (useDebugger) console.log(`Message Create: "${message.content}" Created By: ${message.author.tag} Created At: ${message.createdAt}`);

        /** Finds the command. */
        let {userCommand, prefix, status} = findStarter(message);
        if (useDebugger) console.log(status);
        if (!status) return;

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
                /** list models
                    const response = await openai.listEngines();
                   // console.log(response.data);
                 */
                /**
                 * const prompt = `The following is a conversation with an AI assistant. The assistant is helpful, creative, clever, and very friendly.\nHuman: Hello, who are you?\nAI: I am an AI created by OpenAI. How can I help you today?\nHuman:`;
                 *                 const gptResponse = await openai.complete({
                 *                     engine: 'davinci',
                 *                     prompt: prompt,
                 *                     maxTokens: 100,
                 *                     temperature: 0.9,
                 *                     topP: 1,
                 *                     presencePenalty: 0,
                 *                     frequencyPenalty: 0,
                 *                     bestOf: 1,
                 *
                 *                 });
                 */

                /** If the message is not a command, then run the AI. */
                const openai = new OpenAIApi(configuration);
                let conversation = [
                    {"role": "system", "content": "You are a friendly bot named Overlord."},
                ];
                await message.channel.sendTyping();

                let prevMessages = await message.channel.messages.fetch({limit: 15});
                prevMessages.reverse();
                prevMessages.forEach(msg => {
                    if (msg.author.id === message.author.id) conversation.push({"role": "user", "content": msg.content});
                });

                console.log(conversation);

                const result = await openai.createChatCompletion({
                    model: 'gpt-4',
                    messages: conversation,
                });
                // console.log(result.data.choices[0].message);
                console.log(result.data);
                message.reply(result.data.choices[0].message);

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
