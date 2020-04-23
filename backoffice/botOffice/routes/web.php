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

// Index
Route::get('/', 'SentenceController@list')->name('index');
// Route::get('/', function () {
//     return view('wit.index');
// })->name('index');
// Add
Route::get('/add', 'SentenceController@create')->name('form_create_sentence');
Route::post('/add', 'SentenceController@store')->name('create_sentence');
//Update
Route::get('/update/{id}', 'SentenceController@update')->name('form_update_setence');
Route::post('/update', 'SentenceController@modify')->name('update_setence');
//Remove
Route::get('/remove/{id}', 'SentenceController@delete')->name('form_remove_setence');
// List
Route::get('/list', 'SentenceController@list')->name('list_sentences');
