<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    
})->name ('welcome');

Route::get('passwordreset', function () {
    return view('requestpasswordreset'); 
})->name ('password.reset');


Route::post('passwordreset', 'RequestPasswordResetController@sendToken')->name('send-token');
Route::get('passwordreset/{token}', 'EnterTokenController@index')->name('enter-token');