<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'service' => 'required|string',
            'message' => 'required|string',
        ]);

        Booking::create($data);

        // Redirect back with a success message
        return back()->with('success', 'Your message has been sent successfully!');
    }
}