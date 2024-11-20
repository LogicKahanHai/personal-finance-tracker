<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

Route::resource('categories', CategoryController::class);
Route::resource('transactions', TransactionController::class);

Route::get('/', [TransactionController::class, 'index']);
