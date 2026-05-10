<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;

// Home Page - Consolidated to use the Controller
Route::get('/', [HomeController::class, 'index'])->name('home');

// Audit Form Submission - THIS WAS MISSING
Route::post('/submit-audit', [HomeController::class, 'submitAudit'])->name('audit.submit');

// Dynamic Service Details Route
Route::get('/service/{slug}', [ServiceController::class, 'show'])->name('service.show');

// Static Fallback
Route::get('/static-service', function () {
    return view('frontend.home.servicedetails');
});