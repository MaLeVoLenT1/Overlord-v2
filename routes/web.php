<?php

use Illuminate\Support\Facades\Route;

/**
Web Routes
| Here is where you can register web routes for your application. These
routes are loaded by the RouteServiceProvider within a group which
contains the "web" middleware group. Now create something great! */
Route::get('/', 'HomeController@landing');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/** Profile Endpoints */
Route::prefix('profile')->group(function(){
    Route::resource('/social-media', 'Profile\SocialMediaController');
    Route::resource('/discord', 'Profile\DiscordAssociationController');
});
Route::resource('/profile', 'Profile\ProfileController');
/** Hub Endpoints */
Route::prefix('hub')->group(function () {
    Route::get('/', 'Hub\HubController@index')->name('hub');
    Route::resource('/individuals', 'Hub\UserController');
    Route::resource('/teams', 'Hub\TeamController');
    Route::resource('/organizations', 'Hub\OrganizationController');
    Route::resource('/communities', 'Hub\CommunityController');
    /** News Endpoints */
    Route::resource('/news', 'Hub\ArticleController');
    /** Calendar Endpoints */
    Route::prefix('calendar')->group(function () {
        Route::resource('/event/review', 'Calendar\EventReviewController');
        Route::resource('/event/rating', 'Calendar\EventRatingController');
        Route::resource('/event/Organizers', 'Calendar\EventOrganizerController');
        Route::resource('/event/logs', 'Calendar\EventLogController');
        Route::resource('/event/invites', 'Calendar\EventInviteController');
        Route::resource('/event/attendees', 'Calendar\EventAttendeeController');
        Route::resource('/event', 'Calendar\CalendarEventController');
    });
    Route::resource('/calendar', 'Calendar\CalendarController');
    /** Game Endpoints */
    Route::prefix('games')->group(function () {
        Route::resource('/reviews', 'Games\GameReviewController');
        Route::resource('/ratings', 'Games\GameRankController');
        Route::resource('/logs', 'Games\GameLogController');
        Route::resource('/invites', 'Games\GameInviteController');
        Route::resource('/players', 'Games\GamePlayerController');
        Route::resource('/events', 'Games\GameEventController');
        Route::resource('/tournaments', 'Games\GameTournamentController');
    });
    Route::resource('/gaming', 'Games\GameController');
    /** Blog Endpoints */
    Route::resource('/blog', 'Hub\BlogController');
    Route::resource('/galleries', 'Hub\GalleryController');
});

/** Cryptocurrency Endpoints */
Route::prefix('crypto')->group(function () {
    Route::get('/live-list', 'Crypto\CryptocurrencyController@liveList')->name('crypto.live-list');
    Route::get('/market-cap', 'Crypto\CryptocurrencyController@marketCap')->name('crypto.market-cap');
    Route::resource('/portfolio', 'Crypto\PortfolioController');
});
Route::resource('/crypto', 'Crypto\CryptocurrencyController');

/** Discord Endpoints */
Route::prefix('discord') -> group(function () {
    Route::get('/', 'Discord\DiscordController@index')->name('discord');
    Route::get('/login', 'Discord\DiscordController@login')->name('discord.login');
    Route::get('/callback', 'Discord\DiscordController@callback')->name('discord.callback');
    Route::get('/logout', 'Discord\DiscordController@logout')->name('discord.logout');

    /** Discord Overlord Bot Endpoints */
    Route::resource('/bot/commands', 'Discord\BotCommandController');
    Route::resource('/bot/events', 'Discord\BotEventController');
    Route::resource('/bot/settings', 'Discord\BotSettingsController');
    Route::get('/bot/chat', 'Discord\DiscordBotController@chat');
    Route::resource('/bot', 'Discord\DiscordBotController');


    Route::resource('/members', 'Discord\DiscordUserController');
    Route::resource('/moderators', 'Discord\DiscordModeratorController');
    Route::resource('/roles', 'Discord\DiscordRoleController');
    Route::resource('/guests', 'Discord\DiscordGuestController');
    Route::resource('/admins', 'Discord\DiscordAdminController');
});

/** AI Endpoints */
Route::prefix('ai') -> group(function () {
    Route::resource('/models/conversations/keywords', 'AI\ConversationKeywordController');
    Route::resource('/models/conversations/messages', 'AI\MessageController');
    Route::resource('/models/conversations', 'AI\ConversationController');
    Route::resource('/models/training-data', 'AI\TrainingDataController');
    Route::resource('/models/settings', 'AI\ModelSettingsController');
    Route::resource('/models', 'AI\IntelligenceModelController');
});
Route::resource('/ai', 'AI\AIController');

/** Story Endpoints */
Route::prefix('story') -> group(function () {
    Route::resource('/setting', 'Story\SettingController');
    Route::resource('/sections', 'Story\SectionController');
    Route::resource('/locations', 'Story\LocationController');
    Route::resource('/environments', 'Story\EnvironmentController');
    Route::resource('/architecture', 'Story\ArchitectureController');
    /** Character Endpoints */
    Route::prefix('character') -> group(function () {
        Route::resource('/nicknames', 'Story\Characters\CharacterNicknameController');
        Route::resource('/roles', 'Story\Characters\CharacterRoleController');
        Route::resource('/traits', 'Story\Characters\CharacterTraitController');
        Route::resource('/psychology', 'Story\Characters\CharacterPsychologyController');
        Route::resource('/sociology', 'Story\Characters\CharacterSociologyController');
        Route::resource('/dialogue', 'Story\Characters\CharacterDialogueController');
        Route::resource('/behavior', 'Story\Characters\CharacterBehaviorController');
        Route::resource('/relationships', 'Story\Characters\CharacterRelationshipController');
        Route::resource('/settings', 'Story\Characters\CharacterSettingsController');
    });
    Route::resource('/characters', 'Story\Characters\CharacterController');
    /** Timeline Endpoints */
    Route::prefix('timeline') -> group(function () {
        Route::resource('/events', 'Story\Timeline\StoryEventController');
        Route::resource('/settings', 'Story\Timeline\TimelineSettingsController');
    });

});
Route::resource('/stories', 'Story\StoryController');
