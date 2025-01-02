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
    /******************************** Dashboard ******************************************/
    // Route::get('/', 'DossierCorporelController@index');
    Route::view('/', 'pages.index')->name('index')->middleware('assistant');
    Route::view('/index', 'pages.index')->name('index')->middleware('assistant');
    /******************************** End Dashboard **************************************/

    /******************************** Users **********************************************/
    Route::view('users', 'pages.Utilisateurs.utilisateurs')->name('users')->middleware('admin');
    /******************************** End Users ******************************************/

    /******************************** Clients **********************************************/
    Route::resource('clients', 'ClientController');
    Route::view('/liste.clients', 'pages.Clients.pdf')->name('liste.clients');
    /******************************** End Clients ******************************************/
});
/******************************** Login and disabled register ****************************/
Auth::routes(['register' => false]);
/******************************** End Login and disabled register ************************/