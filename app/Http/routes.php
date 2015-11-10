<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Races
Route::get('/races', "RaceController@getRaces");

Route::get('/races/{id}', "RaceController@getRaceDetails");

Route::get('/races/{id}/theracers', "RaceController@getRaceRacers");

// Add Race
Route::get('/addrace', "RaceController@addRaceView");

Route::post('/addrace', "RaceController@addNewRace");

// Remove Race
Route::post('/api/removeRace', "RaceController@removeRace");

// Edit Racer
Route::get('/races/{id}/editrace', "RaceController@editRaceView");

Route::post('/races/{id}/editrace', "RaceController@updateRace");



// Racers
Route::get('/racers', "RacerController@getRacers");

Route::get('/racers/{id}', "RacerController@getRacerDetails");

// Add Racer
Route::get('/addracer', "RacerController@addRacerView");

Route::post('/addracer', "RacerController@addNewRacer");

// Remove Racer
Route::get('/racers/{id}/delete', "RacerController@deleteRacer");

// Edit Racer
Route::get('/racers/{id}/editracer', "RacerController@editRacerView");

Route::post('/racers/{id}/editracer', "RacerController@updateRacer");