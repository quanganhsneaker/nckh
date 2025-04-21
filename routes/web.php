<?php

use App\Http\Controllers\qa;
use App\Models\WaterQuality;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocationController;

Route::get('/admin', [qa:: class,'admin'])->name('admin');

Route::get('/', [qa:: class,'index'])->name('index');
Route::get('/lienhe',[qa::class,'lienhe'])->name('lienhe');
Route::get('/info',[qa::class,'info'])->name('info');
Route::get('/lienket',[qa::class,'lienket'])->name('lienket');
Route::get('/thuvien',[qa::class,'thuvien'])->name('thuvien');
Route::get('/detailinfo',[qa::class,'detailinfo'])->name('detailinfo');
Route::get('/infosonghong',[qa::class,'infosonghong'])->name('infosonghong');
Route::get('/inforba',[qa::class,'inforba'])->name('inforba');
Route::get('/chitietthuvien',[qa::class,'chitietthuvien'])->name('chitietthuvien');
Route::get('/bieudo',[qa::class,'bieudo'])->name('bieudo');
Route::get('/air_quality', function () {
    return response()->json(WaterQuality::all());
});
// liên hệ \

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('/messages', [ContactController::class, 'index'])->name('messages');
Route::resource('locations', LocationController::class);
Route::get('/api/locations', function () {
    return response()->json(App\Models\Location::all());
});
