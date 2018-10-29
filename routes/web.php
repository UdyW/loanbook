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
    return view('home');
})->middleware('auth');
Auth::routes();

Route::get('/useradmin', [
    'uses'=>'AppController@getAdminPage', 
    'roles' => ['admin']
])->name('useradmin')->middleware('auth','roles');

Route::get('/clients', [
    'uses'=>'ClientController@getClients', 
    'roles' => ['admin']
])->name('useradmin')->middleware('auth','roles');


Route::get('client/getClients', [
    'uses'=>'ClientController@getClients', 
    'roles' => ['admin']
])->name('client.getClients')->middleware('auth','roles');

Route::get('client/getClient/{id}', [
    'uses'=>'ClientController@getClient',
    'as' => 'client.getClient',
    'roles' => ['admin']
])->middleware('auth','roles');

Route::post('client/getClient/{id}', [
    'uses'=>'ClientController@storeClient',
    'roles' => ['admin']
])->middleware('auth','roles');
/*Route::get('/client/getClient', [
   'uses'=>'ClientController@getClient',
    'as' => 'client.getClient',
    'roles' => ['admin']
])->name('client.getClient')->middleware('auth','roles');

Route::post('/client/postedClient', [
    'uses'=>'ClientController@postedClient',
    'as' => 'client.postedClient',
    'roles' => ['admin']
])->middleware('auth','roles');
*/
Route::post('/admin/postedituser',[
    'uses' =>'AppController@postedituser',
    'as' => 'admin.postedituser',
    'roles' => ['admin']
])->middleware('auth','roles');

Route::get('/admin/edituser/{id}', [
    'uses' =>'AppController@editUser',
    'as' => 'admin.edituser',
    'roles' => ['admin']
])->middleware('auth','roles');

Route::get('/home', 'HomeController@index')->name('home');
