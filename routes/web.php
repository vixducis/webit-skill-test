<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth'])->name('dashboard');

Route::get('/item/{id}', [ItemController::class, 'show']);
Route::get('/item/new', [ItemController::class, 'create'])
    ->middleware(['auth.admin']);
Route::post('/item', [ItemController::class, 'store'])
    ->middleware(['auth.admin']);;
Route::get('/item/{id}/edit', [ItemController::class, 'edit'])
    ->middleware(['auth.admin']);
Route::put('/item/{id}', [ItemController::class, 'update'])
    ->middleware(['auth.admin']);
Route::delete('/item/{id}', [ItemController::class, 'destroy'])
    ->middleware(['auth.admin']);

Route::post('/bid', [BidController::class, 'store'])
    ->middleware(['auth.noadmin']);
Route::delete('/bid/{id}', [BidController::class, 'destroy'])
    ->middleware(['auth']);
Route::get('/bid/{id}/thanks', [BidController::class, 'thanks'])
    ->middleware(['auth.noadmin']);

require __DIR__.'/auth.php';
