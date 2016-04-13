<?php


Route::get('/', [
    'as' => 'gallery',
    'uses' => 'GalleryController@index'
]);

Route::get('show/{id}', [
    'as' => 'show',
    'uses' => 'GalleryController@show'
]);

Route::resource('catalogo','CatalogImageController');
