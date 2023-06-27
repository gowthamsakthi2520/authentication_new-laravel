<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Razorpayment 
Route::get('/create-payment',[\App\Http\Controllers\backend\RazorpayController::class,'payment_handler'])->name('create_payment');
Route::post('/payment-transaction',[\App\Http\Controllers\backend\RazorpayController::class,'handlePayment'])->name('payment_transaction');

// Text Notification
Route::get('/notification',[App\Http\Controllers\backend\TwilioSMSController::class,'index'])->name('notifiction');

Route::middleware(['auth'])->group(function(){

    Route::resource('/index',(App\Http\Controllers\backend\IndexController::class));//admin dashboard
});


