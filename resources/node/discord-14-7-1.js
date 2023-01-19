const {Client, GatewayIntentBits, Collection} = require('discord.js');
const config = require("./config.json");

// Built In with Node.js, had to install a node package to run. (File System Module)
const fs = require('fs');

// Create a new Discord client
// Added all the Gateway Intents for testing purposes.
const bot = new Client({intents: [
        GatewayIntentBits.Guilds, GatewayIntentBits.GuildMessages, GatewayIntentBits.MessageContent, GatewayIntentBits.GuildMembers,
        GatewayIntentBits.GuildBans, GatewayIntentBits.GuildEmojisAndStickers, GatewayIntentBits.GuildIntegrations, GatewayIntentBits.GuildWebhooks,
        GatewayIntentBits.GuildInvites, GatewayIntentBits.GuildVoiceStates, GatewayIntentBits.GuildPresences, GatewayIntentBits.GuildMessageReactions,
        GatewayIntentBits.GuildMessageTyping, GatewayIntentBits.DirectMessages, GatewayIntentBits.DirectMessageReactions, GatewayIntentBits.DirectMessageTyping,
        GatewayIntentBits.GuildScheduledEvents, GatewayIntentBits.AutoModerationConfiguration, GatewayIntentBits.AutoModerationExecution
    ]});
//const bot = new Client({intents: 32767}); // Allows for all Intents. This appears to not function for everything.

bot.commands = new Collection();
bot.buttons = new Collection();
bot.selectMenus = new Collection();
bot.modals = new Collection();
bot.commandArray = [];

// Uses readdirSync to get a list of all the directories within the specified folder structure.
const functionFolders = fs.readdirSync(`${config.appLocation}/functions`);

// Iterates through all the directories in the param, 'functionFolders' and for each folder, it reads the files inside.
for (const folder of functionFolders){
    const functionFiles = fs.readdirSync(`${config.appLocation}/functions/${folder}`).filter((file) => file.endsWith(".js"));
    for (const file of functionFiles) require(`./functions/${folder}/${file}`)(bot);
}

bot.handleEvents();
bot.handleCommands();
bot.handleComponents();

// Log the client in
bot.login(config.token).catch((err)=>console.log(err));
