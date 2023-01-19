const {readdirSync} = require('fs');
const config = require("../../config.json");

module.exports = (bot) => {
    bot.handleComponents = async () => {
        const componentFolders = readdirSync(`${config.appLocation}/components`);
        for (const folder of componentFolders){
            const componentFiles = readdirSync(`${config.appLocation}/components/${folder}`).filter(file => file.endsWith('.js'));

            const {buttons, selectMenus, modals} = bot;
            switch (folder){
                case "buttons":
                    for (const file of componentFiles){
                        const button = require(`../../components/${folder}/${file}`);
                        buttons.set(button.data.name, button);
                        if (config.debugger.handler.components) console.log(`Component (Button): ${button.data.name} Passed through the handler.`);
                    }
                    break;
                case "modals":
                    for (const file of componentFiles){
                        const modal = require(`../../components/${folder}/${file}`);
                        modals.set(modal.data.name, modal);
                        if (config.debugger.handler.components) console.log(`Component (Modal): ${modal.data.name} Passed through the handler.`);
                    }
                    break;
                case "selectMenus":
                    for (const file of componentFiles){
                        const menu = require(`../../components/${folder}/${file}`);
                        selectMenus.set(menu.data.name, menu);
                        if (config.debugger.handler.components) console.log(`Component (Menu): ${menu.data.name} Passed through the handler.`);
                    }
                    break;

                default:
                    break;
            }
        }

    }
}
