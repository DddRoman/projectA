<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\IndustriaController;
use App\Http\Controllers\UnitController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Models\Structure;
use Inertia\Inertia;
use App\Services\FactoryService;
use App\Models\Position;
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
<<<<<<< HEAD
    Route::get('/ses', function(){
        $ind=FactoryService::getRandomIndustriaId();
        $struct=FactoryService::getRandomStructureId($ind);
        $data=[
            'dependence'=>FactoryService::getRandomPositionId($struct),
            'ind_id'=>$ind,
            'struct_id'=> $struct,
            'name'=>fake()->text(10),
            'abv'=>Str::random(3),
            'discription'=>fake()->text(500),
        ];
        $pos=Position::create($data);
        return $pos;
    }
    )->name('ses');
=======

>>>>>>> f2daec8fe72e69ba5ceee91c4baa7fc5798b9bc6
});
Route::resource('/positions',PositionController::class);
Route::resource('/structures',StructureController::class);
Route::resource('/industria',IndustriaController::class);
Route::resource('/unit',UnitController::class);
require __DIR__.'/auth.php';
require __DIR__.'/docs.php';
Route::get('/ses/{ind}', function($ind){
    if(Structure::where('ind_id','=',$ind)->count()==0)
    return 0;
  else
    return Structure::query()->where('ind_id','=',$ind)->pluck('id')->random();
}
)->name('ses');