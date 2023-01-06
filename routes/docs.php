<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocController;
use Inertia\Inertia;

Route::get('/docs/{id}/{type}/select', [DocController::class, 'selectSession'])->name('docs.select');
/////document
Route::get('/docs', [DocController::class, 'index'])->name('docs.index');
Route::get('/docs/otheri', [DocController::class, 'select_otherIndustria'])->name('docs.otheri');
Route::get('/docs/others', [DocController::class, 'select_otherStructure'])->name('docs.others');
Route::get('/docs/create', [DocController::class, 'create'])->name('docs.create');
Route::get('/docs/{id}/edit', [DocController::class, 'edit'])->name('docs.edit');
Route::put('/docs/{id}/update', [DocController::class, 'update'])->name('docs.update');
Route::delete('/docs/{id}/destroy', [DocController::class, 'destroy'])->name('docs.destroy');
Route::post('/docs/store', [DocController::class, 'store'])->name('docs.store');

///////items
Route::get('/docs/{id}/items', [DocController::class, 'items'])->name('docs.items');
Route::delete('/docs/{id}/destroyitem', [DocController::class, 'destroyitem'])->name('docs.destroyitem');
Route::get('/docs/createItem/{doc}', [DocController::class, 'createItem'])->name('docs.createItem');
Route::get('/edit/{id}/edit', [DocController::class, 'editItem'])->name('docs.item.edit');
Route::post('/item/store', [DocController::class, 'ItemStore'])->name('item.store');

