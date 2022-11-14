<?php

use App\Models\Apartment;
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
    return view('home');
});

// landlords
Route::get('/landlord/create',[App\Http\Controllers\LandlordController::class,'create'])->name('create');
Route::post('/landlord',[App\Http\Controllers\LandlordController::class,'store'])->name('store');
Route::get('/landlord/{landlord}/edit',[App\Http\Controllers\LandlordController::class,'edit'])->name('edit');
Route::put('/landlord/{landlord}',[App\Http\Controllers\LandlordController::class,'update'])->name('update');
Route::delete('/landlord/{landlord}',[App\Http\Controllers\LandlordController::class,'destroy'])->name('delete');

Route::get('/landlord/{landlord}',[App\Http\Controllers\LandlordController::class,'show'])->name('show');

// Apartments
Route::get('/apartment/create',[App\Http\Controllers\ApartmentController::class,'create'])->name('create');
Route::post('/apartment',[App\Http\Controllers\ApartmentController::class,'store'])->name('store');
Route::get('/apartment/{apartment}/edit',[App\Http\Controllers\ApartmentController::class,'edit'])->name('edit');
Route::put('/apartment/{apartment}',[App\Http\Controllers\ApartmentController::class,'update'])->name('update');
Route::delete('/apartment/{apartment}',[App\Http\Controllers\ApartmentController::class,'destroy'])->name('delete');

Route::get('/apartment/{apartment}',[App\Http\Controllers\ApartmentController::class,'show'])->name('show');

// tenants
Route::get('/tenant/create',[App\Http\Controllers\TenantController::class,'create'])->name('create');
Route::post('/tenant',[App\Http\Controllers\TenantController::class,'store'])->name('store');
Route::get('/tenant/{tenant}/edit',[App\Http\Controllers\TenantController::class,'edit'])->name('edit');
Route::put('/tenant/{tenant}',[App\Http\Controllers\TenantController::class,'update'])->name('update');
Route::delete('/tenant/{tenant}',[App\Http\Controllers\TenantController::class,'destroy'])->name('delete');

Route::get('/tenant/{tenant}',[App\Http\Controllers\TenantController::class,'show'])->name('show');

// houses
Route::get('/house/create',[App\Http\Controllers\HouseController::class,'create'])->name('create');
Route::post('/house',[App\Http\Controllers\HouseController::class,'store'])->name('store');
Route::get('/house/{house}/edit',[App\Http\Controllers\HouseController::class,'edit'])->name('edit');
Route::put('/house/{house}',[App\Http\Controllers\HouseController::class,'update'])->name('update');
Route::delete('/house/{house}',[App\Http\Controllers\HouseController::class,'destroy'])->name('delete');

Route::get('/house/{house}',[App\Http\Controllers\HouseController::class,'show'])->name('show');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
