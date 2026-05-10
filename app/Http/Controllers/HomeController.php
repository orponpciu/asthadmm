<?php

namespace App\Http\Controllers;

use App\Models\ServiceSection;
use App\Models\AuditSection;
use App\Models\AuditContact; // 1. Import the model for saving leads
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch data for the frontend sections
        $services = ServiceSection::all(); 
        $auditData = AuditSection::first();

        return view('frontend.home.index', compact('services', 'auditData'));
    }

    /**
     * 2. Handle the Audit Request Form Submission
     */
    public function submitAudit(Request $request)
    {
        // Validate the inputs to match your audit_contacts migration
        $validated = $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'company_name'  => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
        ]);

        // Save the record to the database
        AuditContact::create($validated);

        // Redirect back with a success flash message for the Blade view
        return redirect()->back()->with('success', 'Thank you! Your audit request has been submitted successfully.');
    }
}