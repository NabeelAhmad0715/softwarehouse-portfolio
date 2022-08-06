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
    Route::get('/services', 'PageController@service')->name('pages.services');
    Route::get('/service/{service:slug}', 'PageController@serviceDetails')->name('pages.service-details');

    Route::get('/blogs', 'PageController@blog')->name('pages.blogs');
    Route::get('/blog/{blog:slug}', 'PageController@blogDetails')->name('pages.blog-details');

    Route::get('/portfolio', 'PageController@portfolio')->name('pages.portfolio');


    Route::get('/latest-news', 'PageController@latestNews')->name('pages.latest-news');
    Route::get('/latest-news/{latestNew:slug}', 'PageController@latestNewsDetails')->name('pages.latest-news-details');

    Route::get('/jobs', 'PageController@jobs')->name('pages.jobs');
    Route::get('/jobs/{career:slug}', 'PageController@jobDetails')->name('pages.job-details');
    Route::get('/careers/{career:slug}/job', 'PageController@careerJob')->name('pages.careers-job');
    Route::post('/careers/{career:slug}/job/apply', 'PageController@careerJobApply')->name('pages.careers-job-apply');

    Route::get('/about-us', 'PageController@aboutUs')->name('pages.about-us');

    Route::get('/contact-us', 'PageController@contactUs')->name('pages.contact-us');
    Route::post('/contact/form-submit', 'PageController@contactEnquiry')->name('pages.contact-form-submit');

});

Route::get('/create-symlink', function () {
    $projectFolder = base_path() . '/../';
    // The file that you want to create a symlink of
    $source = $projectFolder . "/fRjgrudetTGf/storage/app/public";
    // The path where you want to create the symlink of the above
    $destination = $projectFolder . "/storage";

    if (file_exists($destination)) {
        if (is_link($destination)) {
            return "<h1>Symlink already exists</h1>";
        }
    } else {
        symlink($source, $destination);
        return "<h1>Symlink created successfully</h1>";
    }
});

Route::get('/remove-symlink', function () {
    $projectFolder = base_path() . '/../';
    $destination = $projectFolder . "/storage";
    if (file_exists($destination)) {
        if (is_link($destination)) {
            unlink($destination);
            return "<h1>Removed symlink</h1>";
        }
    } else {
        return "<h1>Symlink does not exist</h1>";
    }
});