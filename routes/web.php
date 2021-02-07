<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'MessagesController@index')->name('home');

Route::get('/create', 'MessagesController@create')->name('create');

Route::post('/send', 'MessagesController@send')->name('send');

Route::post('/sent', 'MessagesController@sent')->name('sent-messages');

Route::get('read/{id}', 'MessagesController@read');

Route::get('reply/{id}', 'MessagesController@reply');

Route::post('reply', 'MessagesController@replymessage');

