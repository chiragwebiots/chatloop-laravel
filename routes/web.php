<?php

use Spatie\Analytics\Period;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::group(['middleware' => ['setup']], function () {

  Route::get('/', [HomeController::class, 'index'])->name('home');

  // Blog Page
  Route::get('blogs', 'BlogController@index')->name('blogs');
  Route::get('blogs/category/{category}', 'BlogController@category')->name('blogs.category');
  Route::get('blogs/tag/{tag}', 'BlogController@tag')->name('blogs.tag');
  Route::get('blogs/author/{author}', 'BlogController@author')->name('blogs.author');
  Route::get('blog/{slug}', 'BlogController@details')->name('blog.details');

  // Page
  Route::get('page/{slug}', 'PageController@index')->name('page');

});

//Install
Route::group(['middleware' => ['installation', 'prevent_back']], function () {

  Route::prefix('install')->group(function () {

    Route::get('requirements', 'InstallController@loadPHPExtensions')->name('install.requirements');
    Route::get('directories', 'InstallController@directories')->name('install.directories');
    Route::get('database', 'InstallController@databaseSetup')->name('install.database');
    Route::get('license', 'InstallController@license')->name('install.license');
    Route::post('license', 'InstallController@licenseSetup')->name('install.license.setup');
    Route::post('database', 'InstallController@configureDatabaseSetup')->name('install.database.config');
    Route::get('completed', 'InstallController@completed')->name('install.completed');

  });
});
