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

Route::get('/', function () {
    return view('welcome');
});

Route::get('welcome/{locale}', 'LanguageController@setLocale')->name('set-locale');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('create/ticket', 'TicketController@create');
Route::post('create/ticket', 'TicketController@store');
Route::get('tickets', 'TicketController@index');