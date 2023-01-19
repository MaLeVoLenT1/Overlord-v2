const config = require('../../config.json');
const { InteractionType } = require('discord.js');


module.exports = {
    name: 'interactionCreate',
    async execute(interaction, bot) {

        // If interaction is chat input.
        if (interaction.isChatInputCommand()){
            const {commands} = bot;
            const {commandName} = interaction;
            const command = commands.get(commandName);

            if (!command) return;

            try {
                await command.execute(interaction, bot);
                if (config.debugger.events.interaction) console.log(`Interaction Create: ${commandName} executed(Chat Input).`);
            } catch (e) {
                if (config.debugger.events.interaction) console.error(e);
                await interaction.reply({content: `[ERROR] INTERACTION CREATE: Chat Input`, ephemeral: true});
            }
        }

        // If Interaction is a button.
        else if (interaction.isButton()){
            const {buttons} = bot;
            const {customId} = interaction;
            const button = buttons.get(customId);

            if (!button) return new Error("[ERROR] No Code for this Button!");

            try {
                await button.execute(interaction, bot);
                if (config.debugger.events.interaction) console.log(`Interaction Create: ${button.data.name} executed(Button).`);
            } catch (e) {
                if (config.debugger.events.interaction) console.log(e);
                await interaction.reply({content: `[ERROR] INTERACTION CREATE: Button`, ephemeral: true});
            }
        }

        // If Interaction is a select Menu.
        else if (interaction.isStringSelectMenu()){
            const {selectMenus} = bot;
            const {customId} = interaction;
            const menu = selectMenus.get(customId);

            if (!menu) return new Error(`[ERROR] There is no code for this selected menu.`);

            try {
                await menu.execute(interaction, bot);
                if (config.debugger.events.interaction) console.log(`Interaction Create: ${menu.data.name} executed(Menu).`);
            } catch (e) {
                if (config.debugger.events.interaction) console.log(e);
                await interaction.reply({content: `[ERROR] INTERACTION CREATE: ${menu.data.name} Menu`, ephemeral: true});
            }
        }

        // If Interaction Type is equal to a modal(modal submit).
        else if (interaction.type === InteractionType.ModalSubmit){
            const { modals } = bot;
            const { customId } = interaction;
            const modal = modals.get(customId);

            if (!modal) return new Error("[ERROR] No Code for this Modal!");

            try {
                await modal.execute(interaction, bot);
                if (config.debugger.events.interaction) console.log(`Interaction Create: ${modal.data.name} executed(Modal).`);
            } catch (e) {
                if (config.debugger.events.interaction) console.log(e);
                await interaction.reply({content: `[ERROR] INTERACTION CREATE: Modal`, ephemeral: true});
            }
        }

        // If Interaction is a context menu.
        else if (interaction.isContextMenuCommand()){
            const {commands} = bot;
            const {commandName} = interaction;
            const contextCommand = commands.get(commandName);
            if (!contextCommand) return;
            try{
                await contextCommand.execute(interaction, bot);
            }catch (e) {
                if (config.debugger.events.interaction) console.log(e);
                await interaction.reply({content: `[ERROR] INTERACTION CREATE: Context Menu`, ephemeral: true});
            }

        }
    }
}
