<?php

use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => 'auth'], function () {
    /********************************  ******************************************/
    // Route::get('/', 'DossierCorporelController@index');
    Route::view('/', 'pages.index')->name('index')->middleware('assistant');
    Route::view('/index', 'pages.index')->name('index')->middleware('assistant');
    /******************************** End  **************************************/

    /******************************** Users **********************************************/
    Route::view('users', 'pages.Utilisateurs.utilisateurs')->name('users')->middleware('admin');
    /******************************** End Users ******************************************/

    /******************************** Clients **********************************************/
    Route::resource('clients', 'ClientController');
    Route::post('/clients/check-exists', 'ClientController@checkExists')->name('clients.check-exists');
    Route::view('/liste.clients', 'pages.Clients.pdf')->name('liste.clients');
    Route::get('/getVille', 'ClientController@getVilles')->name('get.ville');
    /******************************** End Clients ******************************************/

    /******************************** Véhicule  **********************************************/
    Route::resource('vehicules', 'VehiculeController');
    Route::post('/vehicules/check-exists', 'ClientController@checkExists')->name('vehicules.check-exists');
    Route::view('/liste.vehicules', 'pages.vehicules.pdf')->name('liste.vehicules');
    /******************************** End Véhicule  ******************************************/
});
/******************************** Login and disabled register ****************************/
Auth::routes(['register' => false]);
/******************************** End Login and disabled register ************************/
