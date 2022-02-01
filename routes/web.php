
<?php

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

Route::get('/', 'WebsiteController@index');
Route::get('/home', 'WebsiteController@index');
Route::get('/about', 'WebsiteController@about');
Route::get('/wall', 'WebsiteController@wall');
Route::get('/faqs', 'WebsiteController@faqs');
Route::get('/competition', 'WebsiteController@competition');
Route::get('/schedule', 'WebsiteController@schedule');
Route::get('/downloadRegulation/', 'WebsiteController@downloadRegulation')->name('download.regulation');

Route::group(['prefix' => 'json'], function(){
    Route::get('searchShifters', 'JsonController@searchShifters')->name('json.searchShifters');
});

Route::group(['prefix' => 'platform', 'middleware' => 'web'], function(){
    
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users', 'UsersController');
    // Route::resource('badges', 'BadgesController');
    // Route::resource('partners', 'PartnersController');
    Route::resource('events', 'EventsController');
    Route::resource('contests', 'ContestsController');
    Route::resource('editions', 'EditionsController');
    Route::resource('shifters', 'ShiftersController');
    Route::resource('teams', 'TeamsController');
    Route::resource('applications', 'ApplicationsController');
    Route::put('applications/{application}/evaluate', 'ApplicationsController@evaluate')->name('applications.evaluate');
    // Route::resource('roadshows', 'RoadshowsController');
    // Route::resource('roadtrips', 'RoadTripsController');
    // Route::resource('quizes', 'QuizesController');
    Route::resource('projects', 'ProjectsController');
    Route::resource('faqs', 'FAQsController');
    Route::get('roadshows/{roadshow}/play', 'RoadshowsController@playGet')->name('roadshows.play.get');
    Route::post('roadshows/{roadshow}/play', 'RoadshowsController@playPost')->name('roadshows.play.post');
    Route::get('403', 'ErrorsController@code403')->name('403');
    Route::get('profile', 'UsersController@profile')->name('platform.profile');
    Route::get('changePassword', 'UsersController@changePassword')->name('platform.changePassword');
    Route::post('{user}/setRole', ['as' => 'setRole', 'uses' => 'UsersController@setRole']);
});

Route::group(['prefix' => 'auth'], function(){
    Auth::routes();
    Route::get('github', 'Auth\SocialAuthController@github');
    Route::get('github/callback', 'Auth\SocialAuthController@githubCallback');
    Route::get('facebook', 'Auth\SocialAuthController@facebook');
    Route::get('facebook/callback', 'Auth\SocialAuthController@facebookCallback');
    Route::get('google', 'Auth\SocialAuthController@google');
    Route::get('google/callback', 'Auth\SocialAuthController@googleCallback');
	Route::get('logout', 'Auth\LoginController@logout');
});
