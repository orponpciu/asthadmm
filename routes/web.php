<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Models\WorkPortfolio;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PostController;
use Spatie\Sitemap\SitemapGenerator;


// Home Page - Consolidated to use the Controller
Route::get('/', [HomeController::class, 'index'])->name('home');

// Audit Form Submission
Route::post('/submit-audit', [HomeController::class, 'submitAudit'])->name('audit.submit');

// Insights Post Route (Added for the insight cards)
Route::get('/insight-post', [HomeController::class, 'showPost'])->name('post.show');

// Dynamic Service Details Route (Fixed name to 'services.show' to match Filament)
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

// Static Fallback
Route::get('/static-service', function () {
    return view('frontend.home.servicedetails');
});

Route::get('/workdetails', function () {
    return view('frontend.home.workdetails');
});

Route::get('/work/{slug}', function ($slug) {
    // Fetch the specific portfolio item using the slug from the URL
    $portfolio = WorkPortfolio::where('slug', $slug)->firstOrFail();

    // Pass the $portfolio variable to your view
    return view('frontend.home.workdetails', compact('portfolio'));
})->name('work.details');

// Contact form Submission
Route::post('/contact-submit', [BookingController::class, 'store'])->name('contact.store');

Route::get('/insights/{slug}', [PostController::class, 'show'])->name('posts.show');


Route::get('/sitemap.xml', function () {
    return SitemapGenerator::create('https://asthadmm.oslaravel.com')
        ->getSitemap()
        ->toResponse(request());
});