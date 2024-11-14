<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;


Route::get('add',[BlogController::class,'create'])->name('create');
Route::post('add',[BlogController::class,'add'])->name('add.store');
Route::get('/',[BlogController::class,'list'])->name('list');
Route::get('delete/{id}',[BlogController::class,'delete'])->name('delete');
Route::get('edit/{id}',[BlogController::class,'edit'])->name('edit');
Route::put('update/{id}',[BlogController::class,'update'])->name('update');
// Route::get('blog_list',[BlogController::class,'blog_list']);
