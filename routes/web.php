<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CastingController;
use App\Http\Controllers\Admin\ContactCardController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DirectorController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\LanguageLineController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TimeLineController;
use App\Http\Controllers\Admin\ValveCategoryController;
use App\Http\Controllers\Admin\ValveSliderController;
use App\Http\Controllers\Admin\WeldingCategoryController;
use App\Http\Controllers\Admin\WeldingGroupController;
use App\Http\Controllers\Admin\WeldingSliderController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Front
Route::get('/', function () {
    return "Home Page Front";
});

// Admin
Route::group(['middleware' => 'auth', 'prefix' => LaravelLocalization::setLocale() . '/control', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Resource
    Route::resource('language_line', LanguageLineController::class);
    Route::resource('langs', LangController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::resource('welding_categories', WeldingCategoryController::class);
    Route::resource('welding_groups', WeldingGroupController::class);
    Route::resource('valve_categories', ValveCategoryController::class);
    // Route::resource('blogs', BlogController::class);
    // Route::resource('branchs', BranchController::class);
    // Route::resource('castings', CastingController::class);
    // Route::resource('contact_cards', ContactCardController::class);
    // Route::resource('directors', DirectorController::class);
    // Route::resource('pages', PageController::class);
    // Route::resource('time_lines', TimeLineController::class);
    // Route::resource('valve_sliders', ValveSliderController::class);
    // Route::resource('welding_sliders', WeldingSliderController::class);


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