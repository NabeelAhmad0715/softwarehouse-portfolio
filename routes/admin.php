<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', "namespace" => "AdminAuth", "as" => "admin."], function () {
    Route::get('/', function () {
        return redirect(route("admin.login"));
    });
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
});

Route::group(['prefix' => 'admin', "middleware" => "auth:admin", "namespace" => "AdminAuth", "as" => "admin."], function () {
    Route::get('/change-password', 'ChangePasswordController@changePassword')->name('change-password.edit');
    Route::put('/change-password', 'ChangePasswordController@updatePassword')->name('change-password.update');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin', "namespace" => "Admin"], function () {
    Route::get('/', 'PageController@index')->name('admin.pages.home');
    Route::get('/profile', 'PageController@editProfile')->name('admin.profile.edit');
    Route::PUT('/profile', 'PageController@updateProfile')->name('admin.profile.update');
    // Users
    Route::resource('users', 'UserController');
    Route::get('/{id}/set-status/{status}', 'UserController@setStatus')->name('admin.user-status');
    Route::get('/user/{user}/change-password', 'UserController@changePassword')->name('admin.users.change-password');
    Route::put('/user/{user}/update-password', 'UserController@updatePassword')->name('admin.users.update-password');

    // Careers
    Route::resource('careers', 'CareerController');
    Route::get('/careers/{career}/jobs', 'CareerController@jobs')->name('careers.jobs');
    // Latest News
    Route::resource('latest-news', 'LatestNewController');
    // Blogs
    Route::resource('blogs', 'BlogController');
    // Blog Sections
    Route::resource('blog/{blog}/sections', 'SectionController');
    // Services
    Route::resource('services', 'ServiceController');
    // Industries
    Route::resource('industries', 'IndustryController');
    // Testimonials
    Route::resource('testimonials', 'TestimonialController');
    //Maps
    Route::resource('maps', 'MapController');

    // Contact Inquiries
    Route::get('/general-settings/create', "GeneralSettingController@create")->name("general-settings.create")->middleware('admin-master-user');
    Route::post('/general-settings', "GeneralSettingController@store")->name("general-settings.store")->middleware('admin-master-user');
    Route::get('/general-settings/edit', "GeneralSettingController@edit")->name("general-settings.edit")->middleware('admin-master-user');
    Route::put('/general-settings', "GeneralSettingController@update")->name("general-settings.update")->middleware('admin-master-user');
    Route::resource('contact-enquiries', 'ContactEnquiryController');
});
