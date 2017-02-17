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

Route::get('webServices/musicArtist', 'WebservicesController@getMusicArtists');
Route::get('webServices/getArtistTracks', 'WebservicesController@getArtistTracks');
Route::get('webServices/deleteTrack', 'WebservicesController@deleteTrack');
