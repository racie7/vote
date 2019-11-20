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

Route::get('/', 'PageController@index')->name('index');
Route::get('faqs', 'PageController@showFAQsPage')->name('faqs');
Route::get('loading', 'PageController@loadDesignationsForm')->name('loading');
Route::post('loading', 'PageController@loadDesignations')->name('loading');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::middleware('is_admin')->group(function (){
    Route::get('update-user-password', 'HomeController@changePasswordView')->name('update-user-password');
    Route::post('update-user-password', 'HomeController@updateUserPassword')->name('update-user-password');
});


Route::middleware('auth')->group(function (){
	Route::get('search-nominee', 'PageController@searchNominee')->name('search-nominee');

	Route::get('nominations/{slug}', 'PageController@showNominationsForm')
		->name('nominations');

	Route::post('process-nominations', 'PageController@processNominationsForm')
		->name('process-nominations');

	Route::get('upcoming-elections', 'PageController@showTheUpcomingElections')
		->name('upcoming-elections');

	Route::get('team-awards', 'PageController@showTeamAwardForm')->name('team-awards');
	Route::post('team-awards', 'PageController@processTeamNominations')->name('team-awards');

	Route::get('team-awards/results', 'PageController@showTeamAwardsResults')
		->name('team-awards.results');
});
