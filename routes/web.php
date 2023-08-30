<?php

use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

// Get a Quote Form
Route::get('/', [QuoteController::class, 'index'])->name('quote.index');
// Route::middleware(['ajaxMethod'])->group(function () {
    Route::get('/wc/showProfessionEntries', [QuoteController::class, 'showProfessionEntries']);
    Route::get('/auto/showAutoVehicleEntries', [QuoteController::class, 'showVehicleEntries']);
    Route::get('/auto/showAutoDriverEntries', [QuoteController::class, 'showDriverEntries']);
    Route::get('/auto/showSpouseInformationForm', [QuoteController::class, 'showSpouseInformationForm']);
    Route::post('/quote-form-submit', [QuoteController::class, 'submitQuoteForm']);
    Route::get('/quote-details', function() {
        return view('quote.quote-details');
    });
// });
Route::get('/thankyou', [QuoteController::class, 'thankyouPage'])->middleware('check.forms.completed', 'reset.forms.completed');
// reset.forms.completed