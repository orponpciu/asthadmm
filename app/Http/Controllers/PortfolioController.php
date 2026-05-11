<?php

namespace App\Http\Controllers;

use App\Models\WorkPortfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function show($slug)
    {
        // Fetch the portfolio item by its slug
        $portfolio = WorkPortfolio::where('slug', $slug)->firstOrFail();

        return view('frontend.work-details', compact('portfolio'));
    }
}