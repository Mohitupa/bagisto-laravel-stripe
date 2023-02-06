<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\StripePaymentController;
  
// Route::controller(StripePaymentController::class)->group(function(){
//     Route::get('stripe', 'stripe');
//     Route::post('stripe', 'stripePost')->name('stripe.post');
// });


// Route::get('/checkout/onepage/stripe',[StripePaymentController::class, 'stripe']);
// Route::post('/checkout/onepage/stripe-payment',[StripePaymentController::class, 'stripePost']);