<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\LanguageLineController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\TimezoneController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\BlogsController as FrontBlogsController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\ContactController as FrontContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ServicesController as FrontServicesController;
use App\Http\Controllers\MailController as ControllersMailController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Set language
Route::get('/language/{locale}', function($locale){
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

// Frontend Routes
Route::group(['as' => 'client.'], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/blogs', [FrontBlogsController::class, 'index'])->name('blogs');
    Route::get('/categories', [FrontCategoryController::class, 'index'])->name('categories');
    Route::post('/categories', [FrontCategoryController::class, 'index'])->name('categories.post');
    Route::get('/services', [FrontServicesController::class, 'index'])->name('services');
    Route::get('/contact', [FrontContactController::class, 'index'])->name('contact');

    // Add POST route for contact form submission
    Route::post('/contact/submit', [FrontContactController::class, 'submit'])->name('contact.submit');
});

// Admin Routes
Route::post('/set-timezone', [TimezoneController::class, 'setTimezone']);

Route::group(['middleware' => 'auth', 'prefix' => '/control', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Resourceful routes
    Route::resource('language_line', LanguageLineController::class);
    Route::delete('api/language_line/bulk-delete', [LanguageLineController::class, 'delete_selected_language_line'])->name('language_line.bulk-delete');

    Route::resource('langs', LangController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('categories', CategoryController::class);
    Route::delete('api/categories/bulk-delete', [CategoryController::class, 'delete_selected_category'])->name('categories.bulk-delete');
    Route::resource('services', ServicesController::class);
    Route::delete('api/services/bulk-delete', [ServicesController::class, 'delete_selected_service'])->name('services.bulk-delete');
    Route::resource('blogs', BlogsController::class);
    Route::delete('api/blogs/bulk-delete', [BlogsController::class, 'delete_selected_blog'])->name('blogs.bulk-delete');

    // Contacts routes
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    Route::resource('tags', TagsController::class);
    Route::delete('api/tags/bulk-delete', [TagsController::class, 'delete_selected_tag'])->name('tags.bulk-delete');

    // Settings routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings/update', [SettingController::class, 'update'])->name('settings.update');
});

// Admin Login Routes
Route::get('/control/login', [AuthController::class, 'login'])->name('login');
Route::post('/control/login', [AuthController::class, 'login'])->name('login_login');
