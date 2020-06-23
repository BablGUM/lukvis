<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

    Route::get('products','ProductsController@index'); // список продуктов ( с категориями и изображениями)
    Route::get('services','ServicesController@index'); // список услуг ( с категориями и изображениями)
    Route::get('products/{id}','ProductsController@show'); // товар подробнее
    Route::get('services/{id}','ServicesController@show'); // услуга подробнее
    Route::get('file/check', 'FileController@fileCheck'); // посмотреть файл
    Route::get('category','ProductsController@indexCategory'); //
    Route::post('send','MailController@send'); // отправка почты

