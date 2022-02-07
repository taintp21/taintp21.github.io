<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/su-kien', [HomeController::class, 'sukien']);
Route::get('/lien-he', [HomeController::class, 'lienhe']);
Route::post('/send-email', [HomeController::class, 'sendEmail'])->name('send.email');
