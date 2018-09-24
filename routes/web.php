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
    Route::resource('finances', 'FinancesController');
    Route::resource('configs', 'ConfigController');
    Route::resource('plans', 'PlansController');
});

Route::prefix('admin')->middleware('auth')->namespace('Admin')->group(function () {
   Route::put('invoices/pay/{id}', 'InvoicesController@pay')->name('invoices.pay');
});