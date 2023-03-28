<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;


Route::get('/', function () {
    return redirect()->route('qrcode.index');
});
Route::resource('qrcode', CardController::class);
Route::get('qrcode/show-details/{id}', [CardController::class, 'showDetails'])->name('qrcode.showDetails');