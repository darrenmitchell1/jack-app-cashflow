<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CashflowItemController;

Route::inertia('/', 'Welcome')->name('home');

Route::get('/cashflow/create', [CashflowItemController::class, 'create'])->name('cashflow.create');
Route::get('/cashflow/index', [CashflowItemController::class, 'index'])->name('cashflow.index');
Route::post('/cashflow/store', [CashflowItemController::class, 'store'])->name('cashflow.store');
