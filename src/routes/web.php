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

Menu::make('OverWatchNav', function ($menu) {
    $dashboard = $menu->add('Dashboard', ['route'  => 'overwatch.dashboard', 'class' => 'nav-item', 'linkClass' => 'nav-link']);
    $dashboard->link->attr(['class'=>'nav-link']);
    $dashboard->prepend('<i class="icon-group-outline"></i>');

    $users = $menu->add('Users', ['route'  => 'overwatch.users', 'class' => 'nav-item', 'linkClass' => 'nav-link']);
    $users->link->attr(['class'=>'nav-link']);
    $users->prepend('<i class="icon-group-outline"></i>');
});
