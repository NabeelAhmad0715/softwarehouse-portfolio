<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('clear-cache', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    return "<h1>Cache Cleared</h1>";
});

Auth::routes();

Route::group(["namespace" => "Frontend"], function () {
    Route::get('/', 'PageController@index')->name('pages.home');
    Route::get('/about/who-we-are', 'PageController@about')->name('pages.about');

    Route::get('/services', 'PageController@service')->name('pages.services');

    Route::get('/blogs', 'PageController@blog')->name('pages.blogs');
    Route::get('/blog/{blog:slug}/details', 'PageController@blogDetails')->name('pages.blog-details');

    Route::get('/projects/{city:slug}', 'PageController@project')->name('pages.projects');
    Route::get('/project/{project:slug}/details', 'PageController@projectDetails')->name('pages.project-details');

    Route::get('/latest-news', 'PageController@latestNews')->name('pages.latest-news');
    Route::get('/latest-news/{latestNew:slug}/details', 'PageController@latestNewsDetails')->name('pages.latest-news-details');

    Route::get('/careers', 'PageController@careers')->name('pages.careers');
    Route::get('/careers/{career:slug}/job', 'PageController@careerJob')->name('pages.careers-job');
    Route::post('/careers/{career:slug}/job/apply', 'PageController@careerJobApply')->name('pages.careers-job-apply');

    Route::get('/maps', 'PageController@maps')->name('pages.maps');
    Route::get('/map/{map}/view', 'PageController@mapDetail')->name('pages.map-detail');

    Route::get('/contact-us', 'PageController@contactUs')->name('pages.contact-us');
    Route::post('/contact-enquiry', 'PageController@contactEnquiry')->name('pages.contact-enquiry');
});
