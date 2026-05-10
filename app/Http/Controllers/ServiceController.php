<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; // Make sure your Model matches this

class ServiceController extends Controller
{
    public function show($slug)
    {
        // Find the service by the lowercase slug, or throw a 404 if not found
        $service = Service::where('slug', strtolower($slug))->firstOrFail();

        // Pass the data to your frontend blade file
        return view('frontend.home.servicedetails', compact('service'));
    }
}