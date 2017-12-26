<?php

Route::get('/', 'QuestionsController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('email/verify/{token}', ['as' => 'email.verify', 'uses' => 'EmailController@verify']);

Route::resource('questions', 'QuestionsController', [
    'names' => [
        'create' => 'question.create',
        'show' => 'question.show',
    ]
]);

Route::post('questions/{question}/answer', 'AnswersController@store');

Route::get('question/{question}/follow', 'QuestionFollowerController@follow');

Route::get('notifications', 'NotificationsController@index');
