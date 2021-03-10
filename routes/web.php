<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\PageController@inicio');

Route::get('/detalle/{id}', 'App\Http\Controllers\PageController@detalle')->name('notas.detalle');

Route::post('/', 'App\Http\Controllers\PageController@crear')->name('notas.crear');

Route::put('crear2', 'App\Http\Controllers\PageController@crear2')->name('notas.crear2');

Route::get('/editar', 'App\Http\Controllers\PageController@editar')->name('notas.editar');

Route::get('blog', 'App\Http\Controllers\PageController@blog')->name('noticias');

Route::get('foto', 'App\Http\Controllers\PageController@fotos')->name('fotoss');

Route::get('nosotros/{nombre?}', 'App\Http\Controllers\PageController@nosotros')->name('nosotros');