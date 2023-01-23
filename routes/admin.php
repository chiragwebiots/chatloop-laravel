<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Auth::routes(['verify' => false, 'register' => false]);

Route::group(['middleware' => ['auth', 'demo'], 'namespace' => 'Admin', 'as' => 'admin.'], function () {

    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Account
    Route::get('account/profile', 'AccountController@profile')->name('account.profile');
    Route::put('account/profile/update', 'AccountController@updateProfile')->name('account.profile.update');
    Route::put('account/password/update', 'AccountController@updatePassword')->name('account.password.update');

    // Roles
    Route::resource('role', 'RoleController', ['except' => ['show']]);
    Route::delete('delete-roles', 'RoleController@deleteRows')->name('delete.roles');

    // Users
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::put('user/{id}/password/update', 'UserController@updatePassword')->name('user.password.update');
    Route::delete('delete-users', 'UserController@deleteRows')->name('delete.users');

    // Media
    Route::resource('media', 'MediaController', ['except' => ['edit', 'update'], 'parameters' => ['media' => 'media']]);
    Route::get('media/ajax/get', 'MediaController@ajaxGetMedia')->name('media.ajax');
    Route::get('media/ajax/filter', 'MediaController@ajaxFilterMedia')->name('media.filter-media');

    // Pages
    Route::resource('page', 'PageController', ['except' => ['show']]);
    Route::delete('delete-pages', 'PageController@deleteRows')->name('delete.pages');

    // Blog
    Route::resource('blog', 'BlogController', ['except' => ['show']]);
    Route::delete('delete-blogs', 'BlogController@deleteRows')->name('delete.blogs');

    // Category
    Route::resource('category', 'CategoryController', ['except' => ['show']]);

    // Tag
    Route::resource('tag', 'TagController', ['except' => ['show']]);

    // Team
    Route::resource('team', 'TeamController', ['except' => ['show']]);
    Route::delete('delete-teams', 'TeamController@deleteRows')->name('teams.delete');

    // Pricing Plan
    Route::resource('pricing-plan', 'PricingPlanController', ['except' => ['show']]);
    Route::delete('delete-plans', 'PricingPlanController@deleteRows')->name('delete.pricing-plan');

    // Testimonial
    Route::resource('testimonial', 'TestimonialController', ['except' => ['show']]);

    // Faq
    Route::resource('faq', 'FaqController', ['except' => ['show']]);

    // Section
    Route::get('section/{name?}', 'SectionController@index')->name('section.index');
    Route::resource('section', 'SectionController', ['except' => ['index']]);

    // Setting
    Route::get('setting/{name?}', 'SettingController@index')->name('setting.index');
    Route::put('setting/update', 'SettingController@update')->name('setting.update');

    // Theme Options
    Route::get('themes/{name?}', 'ThemeOptionController@index')->name('theme.index');
    Route::put('themes/update', 'ThemeOptionController@update')->name('theme.update');

    Route::resource('social-links', 'SocialLinkController', ['except' => ['show']]);

    // Clear Cache
    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        Artisan::call('optimize:clear');
        Artisan::call('clear-compiled');
        return back()->with('message', 'cache cleared successfully');
    })->name('clear-cache');
});
