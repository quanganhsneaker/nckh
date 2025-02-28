<?php

use App\Http\Controllers\qa;
use Illuminate\Support\Facades\Route;


Route::get('/', [qa:: class,'index'])->name('index');
Route::get('/lienhe',[qa::class,'lienhe'])->name('lienhe');
Route::get('/info',[qa::class,'info'])->name('info');
Route::get('/lienket',[qa::class,'lienket'])->name('lienket');