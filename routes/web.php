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
    Route::resource('/calendar/events', 'Hub\CalendarEventController');
    Route::resource('/calendars', 'Hub\CalendarController');
    Route::resource('/teams', 'Hub\TeamController');
    Route::resource('/organizations', 'Hub\OrganizationController');
    Route::resource('/communities', 'Hub\CommunityController');
});

// Cryptocurrency Pages
Route::prefix('crypto')->group(function () {
    Route::get('/live-list', 'Crypto\CryptocurrencyController@liveList')->name('crypto.live-list');
    Route::get('/market-cap', 'Crypto\CryptocurrencyController@marketCap')->name('crypto.market-cap');
});
Route::resource('/crypto', 'Crypto\CryptocurrencyController');

// Discord Endpoints
Route::prefix('discord') -> group(function () {

});

