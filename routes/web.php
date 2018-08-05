<?php

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->namespace('Admin')->group(function () {
    Route::resource('clients', 'ClientsController');
    Route::resource('domains', 'DomainsController');
    Route::resource('invoices', 'InvoicesController');
});

Route::prefix('admin')->middleware('auth')->namespace('Admin')->group(function () {
   Route::put('invoices/pay/{id}', 'InvoicesController@pay')->name('invoices.pay');
});