<?php

use App\Http\Controllers\Backend\About\AboutController;
use App\Http\Controllers\Backend\About\AdvantageController;
use App\Http\Controllers\Backend\About\PartnerController;
use App\Http\Controllers\Backend\About\WhyUsController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\Common\ContactUsController;
use App\Http\Controllers\Backend\Common\NetworkController;
use App\Http\Controllers\Backend\Common\PopupController;
use App\Http\Controllers\Backend\Common\SubscribeController;
use App\Http\Controllers\Backend\Contact\ContactController;
use App\Http\Controllers\Backend\Home\FeatureController;
use App\Http\Controllers\Backend\Home\OfferController;
use App\Http\Controllers\Backend\Home\SliderController;
use App\Http\Controllers\Backend\IndexController;
use App\Http\Controllers\Backend\Services\CountryController;
use App\Http\Controllers\Backend\Services\VisaController;
use App\Http\Controllers\Backend\Services\VisaDocumentController;
use App\Http\Controllers\Backend\Services\VisaOptionController;
use App\Http\Controllers\Backend\Services\VisaOptionDetailController;
use App\Http\Controllers\Backend\Services\VisaOptionDocumentController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'loginFrm'])->name('loginFrm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');

    ////////////////////////////////////////////// AUTH ///////////////////////////////////////////////
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/settings', [AuthController::class, 'settings'])->name('settings');
    Route::post('/change-settings/{user}', [AuthController::class, 'change_settings'])->name('change_settings');

    ////////////////////////////////////////////// ABOUT ///////////////////////////////////////////////
    Route::group(['prefix' => 'about', 'as' => 'about.'], function () {
        Route::get('/edit', [AboutController::class, 'edit'])->name('edit');
        Route::put('/update/{about}', [AboutController::class, 'update'])->name('update');

        Route::get('/advantages/destroy/{advantage}',
            [AdvantageController::class, 'destroy'])->name('advantages.destroy');
        Route::resource('advantages', AdvantageController::class)->except(['show', 'destroy']);

        Route::get('/whyus/destroy/{whyu}', [WhyUsController::class, 'destroy'])->name('whyus.destroy');
        Route::resource('whyus', WhyUsController::class)->except(['show', 'destroy']);

        Route::get('/partners/destroy/{partner}', [PartnerController::class, 'destroy'])->name('partners.destroy');
        Route::resource('partners', PartnerController::class)->except(['show', 'destroy']);
    });

    ////////////////////////////////////////////// SERVICES ///////////////////////////////////////////////
    Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
        Route::get('/countries/destroy/{country}', [CountryController::class, 'destroy'])->name('countries.destroy');
        Route::resource('countries', CountryController::class)->except(['show','destroy']);

        Route::get('/countries/choose/visa/{country}',
            [CountryController::class, 'choose_visa'])->name('countries.choose.visa');
        Route::post('/country/visas/{country}', [CountryController::class, 'store_visa'])->name('countries.store.visa');

        Route::group(['prefix' => 'country/{country}/visa/{visa}/options', 'as' => 'countries.visa.'], function () {
            Route::get('/', [VisaOptionController::class, 'index'])->name('options');
            Route::get('/create', [VisaOptionController::class, 'create'])->name('options.create');
            Route::post('/store', [VisaOptionController::class, 'store'])->name('options.store');
            Route::get('/edit/{visaOption}', [VisaOptionController::class, 'edit'])->name('options.edit');
            Route::post('/{visaOption}', [VisaOptionController::class, 'update'])->name('options.update');
            Route::get('/destroy/{visaOption}', [VisaOptionController::class, 'destroy'])->name('options.destroy');
        });

        Route::get('/{visaOption}/detail/info/', [VisaOptionDetailController::class, 'edit'])->name('options.detail.edit');
        Route::post('/{visaOption}/detail/info/{visaOptionDetail?}', [VisaOptionDetailController::class, 'update'])->name('options.detail.update');

        Route::get('/visas/destroy/{visa}', [VisaController::class, 'destroy'])->name('visas.destroy');
        Route::resource('visas', VisaController::class)->except(['show', 'destroy']);

        Route::get('/documents/destroy/{document}', [VisaDocumentController::class, 'destroy'])->name('documents.destroy');
        Route::resource('documents', VisaDocumentController::class)->except(['show', 'destroy']);

        Route::get('/documents/{visaOption}', [VisaOptionDocumentController::class, 'index'])->name('option.documents.index');
        Route::post('/documents/{visaOption}', [VisaOptionDocumentController::class, 'store'])->name('option.documents.store');
    });

    ////////////////////////////////////////////// HOME ///////////////////////////////////////////////
    Route::group(['prefix' => 'home', 'as' => 'home.'], function () {
        Route::get('/sliders/destroy/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');
        Route::resource('sliders', SliderController::class)->except(['show', 'destroy']);

        Route::get('/offers/destroy/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
        Route::resource('offers', OfferController::class)->except(['show', 'destroy']);

        Route::get('/features/destroy/{feature}', [FeatureController::class, 'destroy'])->name('features.destroy');
        Route::resource('features', FeatureController::class)->except(['show', 'destroy']);
    });

    ////////////////////////////////////////////// CONTACT ///////////////////////////////////////////////
    Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('/contact/update/{contact}', [ContactController::class, 'update'])->name('contact.update');

    Route::get('/networks/destroy/{network}', [NetworkController::class, 'destroy'])->name('networks.destroy');
    Route::resource('networks', NetworkController::class)->except(['show', 'destroy']);

    Route::get('/subscribers', SubscribeController::class)->name('subscribe.index');

    Route::get('/popup/edit', [PopupController::class, 'edit'])->name('popup.edit');
    Route::put('/popup/update/{popup}', [PopupController::class, 'update'])->name('popup.update');

    Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contactUs.index');
    Route::get('/contact-us/{contactUs}', [ContactUsController::class, 'show'])->name('contactUs.show');
    Route::get('/contact-us/{contactUs}/delete', [ContactUsController::class, 'delete'])->name('contactUs.delete');
});
