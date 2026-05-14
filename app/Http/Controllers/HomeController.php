<?php

namespace App\Http\Controllers;

use App\Models\ServiceSection;
use App\Models\AuditSection;
use App\Models\AuditContact;
use App\Models\WorkPortfolio; 
use App\Models\TeamMember; 
use App\Models\AiSectionContent;     // Imported AI Section Model
use App\Models\RecognitionSection;   // Imported Recognition Section Model
use App\Models\Post;                 // Imported Post Model
use App\Models\Testimonial;          // <-- ADDED: Imported Testimonial Model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all services and latest portfolios
        $services = ServiceSection::all(); 
        $portfolios = WorkPortfolio::latest()->get();
        
        // Fetch single-row sections
        $auditData = AuditSection::first();
        
        /** * Fetch team data. 
         * Since your model casts 'members' to an array, 
         * we grab the first row which contains the section title and the array.
         */
        $teamData = TeamMember::first(); 

        // Fetch AI Digital World and Recognition Sections (Ensuring they are active)
        $aiSection = AiSectionContent::where('is_active', true)->latest()->first();
        $recognitionSection = RecognitionSection::where('is_active', true)->latest()->first();

        // Fetch the 3 most recent published posts for the Insights section
        $insights = Post::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        // The fallback message to display when there are no published posts
        $noInsightsMessage = "Stay tuned! We are currently brewing some fresh insights for you.";

        // <-- ADDED: Fetch testimonials sorted by the Filament sort_order
        $testimonials = Testimonial::orderBy('sort_order', 'asc')->get();

        return view('frontend.home.index', compact(
            'services', 
            'auditData', 
            'portfolios', 
            'teamData',
            'aiSection',          // Passed to view
            'recognitionSection', // Passed to view
            'insights',           // Passed to view
            'noInsightsMessage',  // Passed to view for the @forelse empty state
            'testimonials'        // <-- ADDED: Passed to view
        ));
    }

    /**
     * Display the specific Insight Post page
     */
    public function showPost()
    {
        return view('frontend.home.post');
    }

    /**
     * Handle Audit Form Submission
     */
    public function submitAudit(Request $request)
    {
        $validated = $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'company_name'  => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
        ]);

        AuditContact::create($validated);

        return redirect()->back()->with('success', 'Thank you! Your audit request has been submitted successfully.');
    }
}