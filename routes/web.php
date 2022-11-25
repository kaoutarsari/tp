<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LangsController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PdfController;






//detail blog
Route::get('/show/{slug}',[OffreController::class,'blogDetail']);
//liste blogs
Route::get('/blogs',[BlogController::class,'index'])->name('blogs');

//pdf
// Route::get('/pdf',[ReservationController::class,'getReservationPdf'])->name('pdf');

Route::get('/pdf/{id}',[ReservationController::class,'getReservationPdf'])->name('pdf');


Route::get('/categories-product/{slug}',[CategoryController::class,'index']);



Route::get('/',[OffreController::class,'index'])->name('welcome');

//Reservation

Route::post('/',[ReservationController::class,'store'])->name('res');

//commentaire
Route::get('show/offre/{slug}',[OffreController::class,'prodDetail'])->name("prod-detail");
Route::post('/prodDetailComm/{id}',[CommentaireController::class,'store'])->name('prodDetailComm');
Route::put('/comments/update/{id}',[CommentaireController::class,'updateComment'])->name('update.comment');
Route::delete('/comments/destroy/{id}',[CommentaireController::class,'destroy'])->name('comment.destroy');


//contact
Route::get('/contact', [\App\Http\Controllers\MailController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\MailController::class, 'send']);


//langue
Route::get('lang/{lang}', [\App\Http\Controllers\LanguageController::class,'switchLang'])->name('lang.switch');
Route::get('/languageDemo', [App\Http\Controllers\OffreController::class,'languageDemo']);





Route::get('/index_api',[OffreController::class,'index_api']);







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'paypal', 'as' => 'paypal.'], function(){
    Route::get('', [\App\Http\Controllers\PayPalController::class, 'index'])->name('index');
    Route::get('/cancel', [\App\Http\Controllers\PayPalController::class, 'cancel'])->name('cancel');
    Route::get('/capture', [\App\Http\Controllers\PayPalController::class, 'capture'])->name('capture');
});












