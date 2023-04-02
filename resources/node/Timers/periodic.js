const Discord = require('discord.js');

/*** Time in milliseconds to check for job updates.
 * (in the future we can get this from admin settings or something)
 * @type {number} */
const UPDATE_TIME = 30000;

/*** Time in milliseconds to check for job updates.
 * (in the future we can get this from admin settings or something)
 * @type {[{func: checkCalendar, enabled: string, timeout: string},
 *       {func: checkForUpdates, enabled: string, timeout: string},
 *       {func: checkCrypto, enabled: string, timeout: string},
 *       {func: checkAI, enabled: string, timeout: string}]}
 */
let timer_definition = [
    {"enabled": 'check_calendar', "timeout": 'calendar_timer', "func": checkCalendar},
    {"enabled": 'check_updates', "timeout": 'updates_timer', "func": checkForUpdates},
    {"enabled": 'check_crypto', "timeout": 'crypto_timer', "func": checkCrypto},
    {"enabled": 'check_ai', "timeout": 'ai_timer', "func": checkAI}
];
let jobs = [ /* empty - populated in updateJobs() function */ ];

// ===========================================================================
// Globals
// ===========================================================================
let g_timer;               // timer object
let g_matchUps;            // match-up ids
let g_bot = null;          // this bot instance
let g_lastms = 0;          // system milliseconds for previous task execution
let g_discordBots = null;  // list of discord bots from web server (settings/timers)
let g_busy = false;        // busy flag to prevent updating data while using data
let g_checkTime = 0;       // Time since last job update check

// ===========================================================================
// Start Timer
// ===========================================================================
module.exports.startTimer = function (bot) {
    g_bot = bot;

    updateJobs();

    g_timer = setInterval(checkJobs, 1000);
    console.log(`Started Timer: ${1000} ms`);
}

function updateJobs(){

}

function checkJobs(){
    // Can't check jobs if we're busy updating data
    if (g_busy) return;

    // using date.now instead of our own counter to avoid time drift
    let newms = Date.now();
    let delta = newms - g_lastms;
    g_lastms = newms;

    if (delta < 0){
        // rollover -- reset accumulators
        for (let i in jobs) {
            jobs[i].lastrun = newms;
            g_checkTime = newms;
        }
        return;
    }

    else {

        if ((g_checkTime + UPDATE_TIME) <= newms) {
            // Time to update job list
            updateJobs();
            g_checkTime = newms;
        }

        else {
            // Check jobs
            for (let i in jobs) {
                if ((jobs[i].lastrun + (jobs[i].threshold * 1000)) <= newms) {
                    // Time to run job
                    jobs[i].lastrun = newms;
                    timer_definition[jobs[i].def].func(g_discordBots[jobs[i].bot]);
                }
            }


        }

    }
}


function checkCalendar(bot) {
    console.log(`Checking server Calendar (${bot.owner.name}).`);
}

function checkForUpdates(bot) {
    console.log(`Checking for updates (${bot.owner.name}).`);
}

function checkCrypto(bot, crypto) {
    console.log(`Checking ${crypto.name} for (${bot.owner.name}).`);
}

function checkAI(bot) {
    console.log(`Checking AI for (${bot.owner.name}).`);
}
