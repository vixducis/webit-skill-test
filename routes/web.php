<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', IndexController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/item/new', [ItemController::class, 'create']);
Route::post('/item', [ItemController::class, 'store']);
Route::get('/item/{id}', [ItemController::class, 'show']);
Route::get('/item/{id}/edit', [ItemController::class, 'edit']);
Route::put('/item/{id}', [ItemController::class, 'update']);
Route::delete('/item/{id}', [ItemController::class, 'destroy']);

require __DIR__.'/auth.php';
