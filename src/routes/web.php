<?php

Route::group(['as' => 'overwatch.', 'middleware' => ['web']], function () {

    $namespaceprefix = 'Longmancode\\OverWatch\\Http\\Controllers\\';

    Route::get('login', ['uses' => $namespaceprefix.'OverWatchAuthController@login',     'as' => 'login']);
    Route::post('login', ['uses' => $namespaceprefix.'OverWatchAuthController@postLogin', 'as' => 'postlogin']);
    Route::get('logout', ['uses' => $namespaceprefix.'OverWatchDashController@logout',  'as' => 'logout']);


    Route::get('overwatch-assets', ['uses' => $namespaceprefix.'OverWatchController@assets', 'as' => 'overwatch_assets']);

    Route::group([ 'prefix' => 'admin', 'middleware' => ['admin.user', 'web']], function () use ($namespaceprefix) {
        Route::get('/', ['uses' => $namespaceprefix.'OverWatchDashController@index', 'as' => 'dashboard']);

        Route::get('users', ['uses' => $namespaceprefix.'OverWatchUserContoller@index', 'as' => 'users']);
        Route::get('allusers', ['uses' => $namespaceprefix.'OverWatchUserContoller@getUsers', 'as' => 'allusers']);
    });
});


