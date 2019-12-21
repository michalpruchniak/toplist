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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'ajax'], function(){
    Route::get('/displayelements/{id}', [
        'uses' => 'AjaxController@getElements',
        'as' => 'ajax.getElements'
    ]);
    Route::post('/vote', [
        'uses' => 'AjaxController@addVote',
        'as' => 'ajax.addVote'
    ]);
    Route::get('/count-votes/{id}', [
        'uses' => 'AjaxController@countVotes',
        'as' => 'ajax.countVotes'
    ]);
    Route::get('/top/{id}', [
        'uses' => 'AjaxController@toplist',
        'as' => 'ajax.top'
    ]);
});
Route::get('/toplist/{id}', [
    'uses' => 'ToplistsController@index',
    'as' => 'toplist.index'
]);
Route::get('/top/{id}', [
    'uses' => 'ToplistsController@top',
    'as' => 'toplist.top'
]);
