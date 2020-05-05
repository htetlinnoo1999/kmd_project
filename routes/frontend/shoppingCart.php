<?php

Route::get('/cart','ShoppingCartController@index');

Route::get('/cart/add/{id}','ShoppingCartController@add');

Route::post('/cart/update','ShoppingCartController@update')->name('cart.update');

Route::get('/cart/remove/{id}', 'ShoppingCartController@remove');

Route::get('/cart/cancel','ShoppingCartController@cancel');
