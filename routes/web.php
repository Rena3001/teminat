<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\LanguageLineController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TimezoneController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Front
Route::get('/', function () {
    return "Home Page Front";
});

// Admin
Route::post('/set-timezone', [TimezoneController::class, 'setTimezone']);
Route::group(['middleware' => 'auth', 'prefix' => LaravelLocalization::setLocale() . '/control', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Resource
    Route::resource('language_line', LanguageLineController::class);
    Route::resource('langs', LangController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('brands', BrandController::class);
    Route::delete('api/brands/bulk-delete', [BrandController::class, 'delete_selected_brands'])->name('brands.bulk-delete');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::delete('api/categories/bulk-delete', [CategoryController::class, 'delete_selected_categories'])->name('categories.bulk-delete');


    // Others

    // contacts
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/settings/edit', [SettingController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings/update', [SettingController::class, 'update'])->name('settings.update');
});

// Admin Login
Route::get('/control/login', [AuthController::class, 'login'])->name('login');
Route::post('/control/login', [AuthController::class, 'login'])->name('login_login');
