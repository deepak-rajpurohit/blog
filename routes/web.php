<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;


Route::get('add',[BlogController::class,'create'])->name('create');
Route::post('add',[BlogController::class,'add'])->name('add.store');
Route::get('/',[BlogController::class,'list'])->name('list');
// Route::get('blog_list',[BlogController::class,'blog_list']);
