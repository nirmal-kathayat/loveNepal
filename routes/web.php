<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


//login
Route::group(['middleware' => 'admin'], function () {
      Route::get('/register', [AuthController::class, 'register'])->name('register');
      Route::post('register', [AuthController::class, 'registerProcess'])->name('admin.register');
      Route::get('/login', [AuthController::class, 'login'])->name('login');
      Route::post('login', [AuthController::class, 'loginProcess'])->name('admin.login');
});

Route::group(['middleware' => 'auth'], function () {
      Route::get('/home', [DashboardController::class, 'index'])->name('home');
      Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

//  category
Route::group(['middleware' => 'auth'], function () {
      Route::get('Category', [App\Http\Controllers\CategoryController::class, 'index'])->name('Category.index');

      Route::get('Category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('Category.create');
      Route::post('Category/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('Category.store');
      Route::get('Category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('Category.edit');
      Route::put('Category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('Category.update');
      Route::get('Category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('Category.delete');
});



//activity
Route::group(['middleware' => 'auth'], function () {
      Route::get('activity', [App\Http\Controllers\ActivityController::class, 'index'])->name('activity.index');

      Route::get('activity/create', [App\Http\Controllers\ActivityController::class, 'create'])->name('activity.create');
      Route::post('activity/create', [App\Http\Controllers\ActivityController::class, 'store'])->name('activity.store');
      Route::get('activity/edit/{id}', [App\Http\Controllers\ActivityController::class, 'edit'])->name('activity.edit');
      Route::put('activity/edit/{id}', [App\Http\Controllers\ActivityController::class, 'update'])->name('activity.update');
      Route::get('activity/delete/{id}', [App\Http\Controllers\ActivityController::class, 'delete'])->name('activity.delete');
});

// wildlifelist
Route::group(['middleware'=>'auth'],function(){
      Route::get('wildLife',[App\Http\Controllers\WildlifeListController::class,'index'])->name('wildLife.index');

      Route::get('wildLife/create',[App\Http\Controllers\WildlifeListController::class,'create'])->name('wildLife.create');
      Route::post('wildLife/store',[App\Http\Controllers\WildlifeListController::class,'store'])->name('wildLife.store');
      Route::get('wildLife/edit/{id}',[App\Http\Controllers\WildlifeListController::class,'edit'])->name('wildLife.edit');
      Route::put('wildLife/edit/{id}',[App\Http\Controllers\WildlifeListController::class,'update'])->name('wildLife.update');
      Route::get('wildLife/delete/{id}',[App\Http\Controllers\WildlifeListController::class,'delete'])->name('wildLife.delete');
});

// wildspecies
Route::group(['middleware'=>'auth'],function(){
      Route::get('wildSpecies',[App\Http\Controllers\WildSpeciesController::class,'index'])->name('wildSpecies.index');


      Route::get('wildSpecies/create',[App\Http\Controllers\WildSpeciesController::class,'create'])->name('wildSpecies.create');
      
      Route::post('wildSpecies/store',[App\Http\Controllers\WildSpeciesController::class,'store'])->name('wildSpecies.store');
      
      Route::get('wildSpecies/edit/{id}',[App\Http\Controllers\WildSpeciesController::class,'edit'])->name('wildSpecies.edit');
      
      Route::put('wildSpecies/edit/{id}',[App\Http\Controllers\WildSpeciesController::class,'update'])->name('wildSpecies.update');
      
      Route::get('wildSpecies/delete/{id}',[App\Http\Controllers\WildSpeciesController::class,'delete'])->name('wildSpecies.delete');
});

// National park
Route::group(['middleware'=>'auth'],function(){
      Route::get('nationalPark',[App\Http\Controllers\NationalParkController::class,'index'])->name('nationalPark.index');

      Route::get('nationalPark/create',[App\Http\Controllers\NationalParkController::class,'create'])->name('nationalPark.create');
      
      Route::post('nationalPark/create',[App\Http\Controllers\NationalParkController::class,'store'])->name('nationalPark.store');
      
      Route::get('nationalPark/edit/{id}',[App\Http\Controllers\NationalParkController::class,'edit'])->name('nationalPark.edit');
      
      Route::put('nationalPark/edit/{id}',[App\Http\Controllers\NationalParkController::class,'update'])->name('nationalPark.update');
      
      Route::get('nationalPark/delete/{id}',[App\Http\Controllers\NationalParkController::class,'delete'])->name('nationalPark.delete');
});



