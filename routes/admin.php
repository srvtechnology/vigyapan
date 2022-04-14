<?php

use Illuminate\Support\Facades\Route;



// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
// Verify Email
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


 // forget-password
    Route::get('forget-password','Auth\ForgotPasswordController@index')->name('forget.password');
    Route::post('forget-password/email','Auth\ForgotPasswordController@forgetpassword')->name('forget.password.email');
    Route::get('reset-password/{id}/{vcode}','Auth\ForgotPasswordController@resetPassowrd')->name('forget.password.email.verify');
    Route::post('reset-new-password','Auth\ForgotPasswordController@newPassword')->name('reset.new.password');

    // cutomer-registration
    Route::get('/', 'Modules\Customer\CustomerController@index')->name('home');
    Route::get('/add-customer', 'Modules\Customer\CustomerController@addView')->name('customer.add.view');
    Route::post('/add-customer/insert', 'Modules\Customer\CustomerController@add')->name('customer.add.insert');
    Route::post('/add-customer/check-email', 'Modules\Customer\CustomerController@checkEmail')->name('customer.check.email');
    Route::get('/add-customer/delete-customer/{id}', 'Modules\Customer\CustomerController@delete')->name('customer.delete');
    Route::get('/add-customer/status-customer/{id}', 'Modules\Customer\CustomerController@status')->name('customer.status');
    Route::get('/edit-customer/{id}', 'Modules\Customer\CustomerController@edit')->name('customer.edit');
    Route::post('/edit-customer/update-customer', 'Modules\Customer\CustomerController@update')->name('customer.update');
