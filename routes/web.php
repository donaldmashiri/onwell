<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('stocks', \App\Http\Controllers\StockController::class );
Route::get('/stock/level', [App\Http\Controllers\StockController::class, 'level'])->name('stocks.level');
Route::get('/stock/reports', [App\Http\Controllers\StockController::class, 'reports'])->name('stocks.reports');
Route::post('/stocks/import', [\App\Http\Controllers\StockController::class, 'import'])->name('stocks.import');


Route::resource('stocksrequests', \App\Http\Controllers\StockRequestController::class );
Route::resource('budgets', \App\Http\Controllers\BudgetController::class );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
