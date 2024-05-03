<?php

use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\SubscribeController;
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

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServiceController::class, 'index'])->name('service');
Route::get('/services/show/{country}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/services/detail/{visaOption}', [ServiceController::class, 'detail'])->name('services.detail');
Route::get('/get-option-details', [ServiceController::class, 'getVisaOptionDetails'])->name('get.option.details');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/subscribe', [SubscribeController::class, 'store'])->name('subscribe');