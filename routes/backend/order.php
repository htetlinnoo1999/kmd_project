<?php
Route::get('dashboard', 'OrderController@index')->name('order.index');

Route::get('order-delivered/{id}', 'OrderController@delivered')->name('order.delivered')->middleware('role:Super Admin|Admin');
