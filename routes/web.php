<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('email/verify/{token}', ['as' => 'email.verify', 'uses' => 'EmailController@verify']);
