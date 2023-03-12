<?php

use App\Http\Controllers\GangasController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/gangas/{id}/delete', [GangasController::class, 'destroy'])->name('gangas.destroy');
Route::get('/gangas/me', [GangasController::class, "me"])->name("gangas.me");
Route::get('/gangas/new', [GangasController::class, "new"])->name("gangas.new");
Route::get('/gangas/best', [GangasController::class, "best"])->name("gangas.best");
Route::get('/logout', [GangasController::class, 'logout'])->name("gangas.logout");

Route::resource('gangas', GangasController
::class)->only([
    'index', 'show', 'create', 'edit', 'store', 'update',
]);
