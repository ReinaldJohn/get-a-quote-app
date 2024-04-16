<?php

use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;

// Get a Quote Form
Route::get('/wc/showProfessionEntries', [QuoteController::class, 'showProfessionEntries']);

// Route::get('/auto/showAutoVehicleEntries', [QuoteController::class, 'showVehicleEntries']);
// Route::get('/auto/showAutoDriverEntries', [QuoteController::class, 'showDriverEntries']);
// Route::get('/auto/showSpouseInformationForm', [QuoteController::class, 'showSpouseInformationForm']);

Route::post('/clear-session-data', [QuoteController::class, 'clearSessionData']);
Route::post('/set-session-variable', [QuoteController::class, 'setSessionVariable']);
Route::post('/unset-session-variable', [QuoteController::class, 'unsetSessionVariable']);
Route::post('/update-session-variables', [QuoteController::class, 'updateSessionVariables']);
Route::get('/fetch-checkbox-content', [QuoteController::class, 'fetchCheckboxContent']);

Route::get('/', [QuoteController::class, 'index'])->name('quote.index');
Route::post('/quote-form-submit', [QuoteController::class, 'submitQuoteForm']);

Route::get('/quote-details', function() {
    return view('quote.quote-details');
});

Route::get('/thankyou', [QuoteController::class, 'thankyouPage'])->middleware('check.forms.completed', 'reset.forms.completed');

Route::get('/privacy-policy', [QuoteController::class, 'privacyPolicy'])->name('pp-index');
Route::get('/cookie-policy', [QuoteController::class, 'cookiePolicy'])->name('cp-index');
Route::get('/terms-and-conditions', [QuoteController::class, 'termsAndCondition'])->name('tc-index');
