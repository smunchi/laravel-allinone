<?php

/**
 * Admin routes
 */
Route::prefix('admins')->group(function () {
    Route::get('/', 'Admin\HomeController@home')->name('admin.home');
});