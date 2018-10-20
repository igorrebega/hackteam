<?php

/*
|--------------------------------------------------------------------------
| Service - Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for this service.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'dashboard', 'middleware' => ['web']], function () {

    /**
     * Part of app that requires authentication
     */
    Route::group([
        'middleware' => [\App\Services\Dashboard\Http\Middleware\Authenticate::class]
    ], function () {

        Route::get('/', function () {
            return view('dashboard::welcome');
        })->name('home');

        /**************************************************************************/

        Route::group(['prefix' => 'admin'], function () {

            Route::get('/', 'AdminController@index')->name('admins');
            Route::get('/create', 'AdminController@create')->name('admins.create');
            Route::get('/edit/{id}', 'AdminController@edit')->name('admins.edit');
            Route::post('/store', 'AdminController@store')->name('admins.store');
            Route::put('/update/{id}', 'AdminController@update')->name('admins.update');
            Route::delete('/delete/{id}', 'AdminController@delete')->name('admins.delete');

        });

        Route::group(['prefix' => 'profile'], function () {
            Route::get('edit', 'ProfileController@edit')->name('profile.edit');
            Route::put('update', 'ProfileController@update')->name('profile.update');
        });

        Route::post('/logout', 'AuthController@logout')->name('auth.logout');
    });

    /**
     * Part of app available for guest
     */
    Route::group([
        'middleware' => [\App\Services\Dashboard\Http\Middleware\RedirectIfAuthenticated::class]
    ], function () {

        Route::get('/login', 'AuthController@login')->name('auth.login');
        Route::post('/authenticate', 'AuthController@authenticate')->name('auth.authenticate');

        Route::get('/password-recovery/{token}', 'AuthController@passwordRecovery')->name('auth.password-recovery');
        Route::post('/accept-password-recovery/{token}',
            'AuthController@acceptPasswordRecovery')->name('auth.accept-password-recovery');

        Route::get('/password-recovery-request',
            'AuthController@passwordRecoveryRequest')->name('auth.password-recovery-request');
        Route::post('/accept-password-recovery-request',
            'AuthController@acceptPasswordRecoveryRequest')->name('auth.accept-password-recovery-request');

    });

});
