<?php 

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job; 
use App\Models\Application;
use App\Models\Category;
// Model ko import karna na bhoolein

class JobController extends Controller
{

    public function index()
    {
        // Database se saari jobs fetch karein (Latest pehle)
       $jobs = Job::with('categoryData')->get(); // IMPORTANT
       
        // admin/jobs/index.blade.php file ko data bhejien
        return view('admin.jobs.index', compact('jobs'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.jobs.create', compact('categories'));
    }


    public function edit($id)
    {
        $job = Job::findOrFail($id);
        $categories = Category::all();

        return view('admin.jobs.edit', compact('job', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $job->update([
            'title' => $request->title,
            'category' => $request->category, // tumhara column name
            'company_name' => $request->company_name,
            'location' => $request->location,
            'company_email' => $request->company_email,
            'salary_min' => $request->salary_min,
            'salary_max' => $request->salary_max,
            'experience' => $request->experience,
            'description' => $request->description,
            'job_type' => $request->job_type,
            'status' => $request->status,
            /*'posted_by_type'=>$request->posted_by_type,*/
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job Updated Successfully');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job Deleted Successfully');
    }

    public function store(Request $request)
    {

        // 1. Data Validate karein
        $data = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary_min' => 'nullable',
            'salary_max' => 'nullable',
            'company_name' => 'nullable',
            'company_email' => 'nullable',
            'experience' => 'required', // Isse mandatory banaya hai
             'posted_by_type' => 'required'  ,
        ]);

        // 2. Database mein save karein
        Job::create($data);
        if ($request->posted_by_type == 'admin') {
            return redirect()->route('admin.jobs.create')->with('success', 'Job Successfully Post ho gayi hai!');

        }
        else {
            return back()->with('success', 'Job posted successfully');
        }
    }

    public function applications()
        {
            // Eager loading use kar rahe hain taaki pata chale kis job ke liye apply kiya gaya hai
            $applications = Application::with('job')->latest()->get();

            return view('admin.applications.index', compact('applications'));
        }


    public function apply(Request $request, $id)
        {
            // 1. Validation
            $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email',
                'resume' => 'required|mimes:pdf|max:2048', // Max 2MB PDF
            ]);

            // 2. Resume Upload
            if ($request->hasFile('resume')) {
                $fileName = time().'_'.$request->resume->getClientOriginalName();
                $filePath = $request->file('resume')->storeAs('resumes', $fileName, 'public');
            }

            // 3. Save to Database
            Application::create([
                'job_id' => $id,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'resume' => $filePath,
                'cover_letter' => $request->cover_letter,
            ]);

            return back()->with('success', 'Application submitted successfully!');
        }

    public function show($id)
        {
            // 1. Database se job find karein
            $job = Job::find($id);

            // 2. Check karein agar job nahi mili toh 404 error dikhayein
            if (!$job) {
                abort(404);
            }

            // 3. 'job' variable ko view mein bhejien (Ye sabse zaroori step hai)
            return view('jobs.show', compact('job')); 
        }


    public function find_job(Request $request)
        {
            // $categories = Category::with(['jobs' => function ($query) {
            //         $query->latest();
            //     }])
            //     ->withCount('jobs')
            //     ->get();



            $categories = Category::with(['jobs' => function ($query) {
                    $query->where(function ($q) {
                        $q->where('posted_by_type', 'admin')
                        ->orWhere(function ($q2) {
                            $q2->where('posted_by_type', 'company')
                                ->where('approval_status', 'approved');
                        });
                    })->latest();
                }])
                ->withCount(['jobs' => function ($query) {
                    $query->where(function ($q) {
                        $q->where('posted_by_type', 'admin')
                        ->orWhere(function ($q2) {
                            $q2->where('posted_by_type', 'company')
                                ->where('approval_status', 'approved');
                        });
                    });
                }])
                ->get();
            $query = Job::with('categoryData');

            // ✅ IMPORTANT: Admin + Company Approved Logic
            $query->where(function ($q) {
                $q->where('posted_by_type', 'admin')
                ->orWhere(function ($q2) {
                    $q2->where('posted_by_type', 'company')
                        ->where('approval_status', 'approved');
                });
            });

            // 🔍 Search Filters
            $query->where(function ($q) use ($request) {

                // TITLE search
                if ($request->filled('title')) {
                    $q->where('title', 'like', "%{$request->title}%");
                }

                // LOCATION search
                if ($request->filled('location')) {
                    $q->where('location', 'like', "%{$request->location}%");
                }

                // CATEGORY search
                if ($request->filled('category')) {
                    $q->whereHas('categoryData', function ($cat) use ($request) {
                        $cat->where('name', 'like', "%{$request->category}%");
                    });
                }
            });

            // Job Type
            if ($request->has('job_type')) {
                $query->whereIn('job_type', $request->job_type);
            }

            // Sidebar Location
            if ($request->has('locations')) {
                $query->whereIn('location', $request->locations);
            }

            // Salary Filter
            if ($request->filled('salary')) {

                $ranges = [
                    '0-3' => [0, 300000],
                    '3-6' => [300000, 600000],
                ];

                if (isset($ranges[$request->salary])) {
                    [$min, $max] = $ranges[$request->salary];

                    $query->where('salary_min', '>=', $min)
                        ->where('salary_max', '<=', $max);
                }
            }

            $jobs = $query->latest()->get();

            return view('jobs.find-job', compact('jobs', 'categories'));
        }

    public function updateStatus($id, $status)
        {
            // Valid status check (security + bug avoid)
            if (!in_array($status, ['approved', 'rejected'])) {
                return redirect()->back()->with('error', 'Invalid status');
            }

            $job = Job::find($id);

            if (!$job) {
                return redirect()->back()->with('error', 'Job not found');
            }

            // Update status
            $job->approval_status = $status;
            $job->save();

            return redirect()->back()->with('success', 'Job status updated successfully');
        }
                
}