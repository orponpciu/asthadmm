<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial; // Import your model

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials on the frontend.
     */
    public function index()
    {
        // Fetch testimonials ordered by the sort_order column
        $testimonials = Testimonial::orderBy('sort_order', 'asc')->get();

        // Return the view and pass the data to it
        return view('welcome', compact('testimonials'));
    }
}