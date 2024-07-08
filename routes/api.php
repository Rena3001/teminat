<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;

Route::middleware('auth:sanctum')->group(function () {
    // Resource
    Route::resource('brands', BrandController::class)->except(['create', 'edit']);
    Route::delete('brands/delete_selected_brands', [BrandController::class, 'delete_selected_brands'])->name('brands.delete_selected_brands');

    Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
    Route::delete('categories/delete_selected_categories', [CategoryController::class, 'delete_selected_categories'])->name('categories.delete_selected_categories');
});
