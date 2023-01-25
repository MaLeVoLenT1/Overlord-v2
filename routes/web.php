<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');});

Route::get('/', 'HomeController@landing');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/news', 'NewsArticleController');
Route::resource('/games', 'GameController');

// Profile Pages
Route::prefix('profile')->group(function(){
    Route::resource('/blog', 'Profile\BlogController');
    Route::resource('/galleries', 'Profile\GalleryController');
    Route::resource('/social-media', 'Profile\SocialMediaController');
    Route::resource('/discord', 'Profile\DiscordAssociationController');
    Route::resource('/portfolio', 'Profile\PortfolioController');
});
Route::resource('/profile', 'Profile\ProfileController');

// Hub Pages
Route::prefix('hub')->group(function () {
    Route::get('/', 'Hub\HubController@index')->name('hub');
    Route::resource('/individuals', 'Hub\UserController');
    Route::resource('/teams', 'Hub\TeamController');
    Route::resource('/organizations', 'Hub\OrganizationController');
    Route::resource('/communities', 'Hub\CommunityController');

    // Calendar Pages
    Route::prefix('calendar')->group(function () {
        Route::resource('/event/review', 'Calendar\EventReviewController');
        Route::resource('/event/rating', 'Calendar\EventRatingController');
        Route::resource('/event/Organizers', 'Calendar\EventOrganizerController');
        Route::resource('/event/logs', 'Calendar\EventLogController');
        Route::resource('/event/invites', 'Calendar\EventInviteController');
        Route::resource('/event/comments/replies', 'Calendar\EventCommentReplyController');
        Route::resource('/event/comments', 'Calendar\EventCommentController');
        Route::resource('/event/attendees', 'Calendar\EventAttendeeController');
        Route::resource('/event', 'Calendar\CalendarEventController');
    });
    Route::resource('/calendar', 'Calendar\CalendarController');
});

// Cryptocurrency Pages
Route::prefix('crypto')->group(function () {
    Route::get('/live-list', 'Crypto\CryptocurrencyController@liveList')->name('crypto.live-list');
    Route::get('/market-cap', 'Crypto\CryptocurrencyController@marketCap')->name('crypto.market-cap');
});
Route::resource('/crypto', 'Crypto\CryptocurrencyController');

// Discord Endpoints
Route::prefix('discord') -> group(function () {
    Route::get('/', 'Discord\DiscordController@index')->name('discord');
    Route::get('/login', 'Discord\DiscordController@login')->name('discord.login');
    Route::get('/callback', 'Discord\DiscordController@callback')->name('discord.callback');
    Route::get('/logout', 'Discord\DiscordController@logout')->name('discord.logout');

    // Discord Overlord Model Endpoints
    Route::resource('/bot/commands', 'Discord\BotCommandController');
    Route::resource('/bot/events', 'Discord\BotEventController');
    Route::resource('/bot/settings', 'Discord\BotSettingsController');
    Route::resource('/bot', 'Discord\DiscordBotController');
    Route::resource('/discord-members', 'Discord\DiscordUserController');
    Route::resource('/discord-moderators', 'Discord\DiscordModeratorController');
    Route::resource('/discord-roles', 'Discord\DiscordRoleController');
    Route::resource('/discord-guests', 'Discord\DiscordGuestController');
    Route::resource('/discord-admins', 'Discord\DiscordAdminController');
});

