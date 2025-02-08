<?php

use App\Http\Controllers\rekeningController;
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
    return view('welcome');
});

Route::get('rekening', [rekeningController::class, 'index'])->name('rekening.index');
Route::get('rekening/create',[rekeningController::class, 'create'])->name('rekening.create');
Route::post('rekening/create', [rekeningController::class, 'store'])->name('rekening.store');
Route::get('rekening/{id}/edit', [rekeningController::class, 'edit'])->name('rekening.edit');
Route::put('rekening/{id}', [rekeningController::class, 'update'])->name('rekening.update');
Route::delete('rekening/delete/{id}', [rekeningController::class, 'destroy'])->name('rekening.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
