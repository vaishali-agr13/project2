<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job; // Job model ko import karein
use App\Models\Category; // Job model ko import karein

class HomeController extends Controller
{
    public function index()
    {
        // Database se sirf wahi jobs lein jo active hain (status = 1) 
        // aur latest jobs ko upar dikhayein. Limit humne 6 rakhi hai.

        $categories = Category::with('jobs')->withCount('jobs')->get();
       
        $featuredJobs = Job::where('status', 1)
                           ->orderBy('created_at', 'desc')
                           ->get();
    
        return view('home', compact('featuredJobs','categories'));
    }
}
