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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'UserController@index')->name('home')->middleware('verified');
Route::get('user/account', 'UserController@showAccount')->name('account');

//Route pour les boxes
Route::get('user/singlebox/{boxid}', 'UserController@showSingleBox')->name('singleBox');
Route::get('user/boxform', 'UserController@boxForm')->name('boxForm');
Route::post('user/newbox', 'UserController@newBox')->name('newBox');
Route::get('user/updateboxform/{boxid}', 'UserController@updateBoxForm')->name('updateBoxForm');
Route::post('user/updatebox', 'UserController@updateBox')->name('updateBox');
Route::get('/user/deletebox/{boxid}', 'UserController@deleteBox')->name('deleteBox');

//Route pour les fichiers
Route::get('user/box/{boxid}/fileform', 'UserController@fileForm')->name('fileForm');
Route::post('user/newfile', 'UserController@newFile')->name('newFile');
Route::get('user/updatefileform/{fileid}', 'UserController@updateFileForm')->name('updateFileForm');
Route::post('user/updatefile', 'UserController@updateFile')->name('updateFile');
Route::get('/user/deletefile/{fileid}', 'UserController@deleteFile')->name('deleteFile');