<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponseController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ResponseController::class, 'index'])->name('home');
Route::get('/create', [ResponseController::class, 'create'])->name('create');
Route::post('/store', [ResponseController::class, 'store'])->name('store');
Route::get('/show/{response}', [ResponseController::class, 'show'])->name('show');
Route::get('/edit/{response}', [ResponseController::class, 'edit'])->name('edit');
Route::put('/update/{response}', [ResponseController::class, 'update'])->name('update');
Route::get('/delete/{response}', [ResponseController::class, 'destroy'])->name('delete');



