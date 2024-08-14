<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LanguageLineController;
use App\Http\Controllers\Admin\ProductController;

Route::middleware('auth:sanctum')->group(function () {
    // Resource


    // Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
    Route::delete('categories/delete_selected_categories', [CategoryController::class, 'delete_selected_categories'])->name('categories.delete_selected_categories');

    // Route::resource('language_line', LanguageLineController::class)->except(['create', 'edit']);
    Route::delete('language_line/delete_selected_language_line', [LanguageLineController::class, 'delete_selected_language_line'])->name('language_line.delete_selected_language_line');

    // Route::resource('products', LanguageLineController::class)->except(['create', 'edit']);
    // Route::delete('products/delete_selected_products', [ProductController::class, 'delete_selected_products'])->name('products.delete_selected_products');
    // Route::delete('model_products/delete_selected_model_products', [ModelProductController::class, 'delete_selected_products'])->name('products.delete_selected_model_products');


});


// Route::post('products/changeOrder', [ProductController::class, 'changeOrder'])->name('admin.products.changeOrder');

Route::post('categories/changeOrder', [CategoryController::class, 'changeOrder'])->name('admin.categories.changeOrder');
