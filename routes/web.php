<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/trang-chu', [HomeController::class, 'index']);
Route::get('/form-thanhtoan', [HomeController::class, 'formThanhToan']);
Route::get('/su-kien', [HomeController::class, 'sukien']);
Route::get('/su-kien/{id}', [HomeController::class, 'chitiet_sukien']); //Xem chi tiết
Route::get('/lien-he', [HomeController::class, 'lienhe']);


Route::post('/send-email', [HomeController::class, 'sendEmail'])->name('send.email');

Route::post('/form-thanhtoan/createPayment',[PaymentController::class, 'createPayment'])->name('payment.online');

Route::get('vnpay/return', [PaymentController::class, 'vnpayReturn'])->name('vnpay.return');
