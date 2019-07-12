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


Route::get('/data/logout', 'DataController@logout');
Route::get('/data','DataController@index');
Route::get('/data/data','DataController@data');
Route::post('/data/auth','DataController@auth');
Route::get('/data/tambah','DataController@tambah');
Route::post('/data/stored','DataController@stored');
Route::get('/data/edit/{id}','DataController@edit');
Route::get('/data/hapus/{id}','DataController@hapus');
Route::post('/data/updated/','DataController@updated');

?>

