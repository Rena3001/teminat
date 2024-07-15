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
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\ContactController as AdminContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\Front\ProductsDetailController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Front
Route::group(['prefix' => LaravelLocalization::setLocale() . '', 'as' => 'client.'], function(){
    Route::get('/',[HomeController::class, 'index'])->name('home');
    Route::get('/about',[AboutController::class, 'index'])->name('about');
    Route::get('/contact',[AdminContactController::class, 'index'])->name('contact');
    Route::get('/products/{id}', [ProductsDetailController::class, 'index'])->name('client.product.detail');
    Route::get('/products',[ProductsController::class, 'index'])->name('products');
    Route::get('/wires_and_fluxes',[FrontCategoryController::class, 'index'])->name('wires_and_fluxes');

});
// Admin
Route::post('/set-timezone', [TimezoneController::class, 'setTimezone']);
Route::group(['middleware' => 'auth', 'prefix' => LaravelLocalization::setLocale() . '/control', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Resource
    Route::resource('language_line', LanguageLineController::class);
    Route::delete('api/language_line/bulk-delete', [LanguageLineController::class, 'delete_selected_language_line'])->name('language_line.bulk-delete');
    Route::resource('langs', LangController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('brands', BrandController::class);
    // Route::post('brands/changeOrder', [BrandController::class, 'changeOrder'])->name('brands.changeOrder');
    Route::delete('api/brands/bulk-delete', [BrandController::class, 'delete_selected_brands'])->name('brands.bulk-delete');
    Route::resource('products', ProductController::class);
    Route::delete('api/products/bulk-delete', [ProductController::class, 'delete_selected_products'])->name('products.bulk-delete');
    // Route::post('products/changeOrder', [ProductController::class, 'changeOrder'])->name('products.changeOrder');
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
