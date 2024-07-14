<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [TransactionController::class, 'dashboard'])->name('dashboard');
Route::resource('transactions', TransactionController::class)->middleware('auth');
Route::resource('transactions', TransactionController::class);
Route::resource('categories', CategoryController::class);
Route::get('/reports/monthly', [ReportController::class, 'monthly'])->name('reports.monthly');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
