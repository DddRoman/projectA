<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\IndustriaController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->middleware(['auth'])->name('index');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/structures/select/{ind}', [StructureController::class, 'select_industria'])->name('structures.select');
    Route::get('/structures/select', [StructureController::class, 'select_other'])->name('structures.other');
    Route::get('/positions/select/{ind}', [PositionController::class, 'select_structure'])->name('positions.select');
    Route::get('/positions/select', [PositionController::class, 'select_other'])->name('positions.other');
    Route::get('/ses', [StructureController::class, 'ses'])->name('ses');
});
Route::resource('/positions',PositionController::class);
Route::resource('/structures',StructureController::class);

Route::resource('/industria',IndustriaController::class);
require __DIR__.'/auth.php';
