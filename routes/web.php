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

Route::get('/account',function(){
    return view('account');
});

Route::get('/account/{acc_number}','App\Http\Controllers\StudentController@get');


Route::get('/transaction',function () {
    return view('transaction');
});
