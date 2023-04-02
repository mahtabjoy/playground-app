<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendAdmin\AdminController;
use App\Http\Controllers\BackendAdmin\PlayGroundController;

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

//Route::get('/dashboard', function () {
//    return view('backend_admin.dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('/admin')->name('admin')->group(function (){

    Route::match(['get','post'],'login',[AdminController::class,'login']);

    Route::get('logout',[AdminController::class,'logout']);

    Route::group(['middleware'=>['admin']],function (){
        //Admin Dashboard Route
        Route::get('dashboard',[AdminController::class,'dashboard']);
    });
});

Route::prefix('new_admin')->name('new_admin.')->group(function (){
    Route::get('create',[AdminController::class,'create'])->name('new_admin.create');
    Route::post('store',[AdminController::class,'store'])->name('new_admin.store');
    Route::get('list',[AdminController::class,'list'])->name('new_admin.list');
    Route::get('edit/{id}',[AdminController::class,'edit'])->name('new_admin.edit');
    Route::post('update/{id}',[AdminController::class,'update'])->name('new_admin.update');
    Route::delete('destroy/{id}',[AdminController::class, 'destroy'])->name('new_admin.destroy');
});

Route::prefix('play_ground')->name('play_ground')->group(function (){
    Route::get('create',[PlayGroundController::class,'create'])->name('play_ground.create');
    Route::post('store',[PlayGroundController::class,'store'])->name('play_ground.store');
    Route::get('list',[PlayGroundController::class,'list'])->name('play_ground.list');
    Route::get('edit/{id}',[PlayGroundController::class,'edit'])->name('play_ground.edit');
    Route::post('update/{id}',[PlayGroundController::class,'update'])->name('play_ground.update');
    Route::delete('destroy/{id}',[PlayGroundController::class,'destroy'])->name('play_ground.destroy');
});

require __DIR__.'/auth.php';
