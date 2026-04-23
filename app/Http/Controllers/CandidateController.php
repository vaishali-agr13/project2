<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;   // ✅ required
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CandidateProfile;
use App\Models\Application;
use Illuminate\Support\Facades\Hash;

class CandidateController extends Controller
{
    public function dashboard()
    {

            $userId = auth()->id();

            $appliedCount = Application::where('user_id', $userId)->count();

            $applications = Application::with('job')
                ->where('user_id', $userId)
                ->latest()
                ->get();

            // simple logic for profile %
            $profileComplete = 70; // abhi static, baad me dynamic karenge

            return view('candidate.dashboard', compact(
                'appliedCount',
                'applications',
                'profileComplete'
            ));
        return view('candidate.dashboard');
    }

    public function showForm()
    {
        return view('auth.register');
    }

     public function register(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'candidate',
        ]);

        // auto login
        Auth::login($user);

        if (session()->has('pending_apply')) {

        $data = session('pending_apply');

       

        // application save
        Application::create([
            'job_id' => $data['job_id'],
            'full_name' => $data['full_name'],
            'email' =>  Auth::user()->email,
            'resume' => $data['resume'],
            'user_id' => $user->id,
            'cover_letter' => $data['cover_letter'],
        ]);

            session()->forget('pending_apply');

            return redirect('/jobs/'.$data['job_id'])
                ->with('success', 'Application submitted successfully!');
        }

        return redirect('/')
            ->with('success', 'Registration successful!');

    }


     public function index()
    {
        $profile = CandidateProfile::where('user_id', auth()->id())->first();
        return view('candidate.profile', compact('profile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'skills' => 'required',
            'experience' => 'required',
            'education' => 'required',
            'name'=>'required',
            'profile_photo'=>'required',
            'email'=>'required',
            'resume'=>'required',
            'portfolio'=>'required',
        ]);

        $profile = CandidateProfile::updateOrCreate(
            ['user_id' => auth()->id()],
            [    
                'name' => $request->name,
                'email' => $request->email,
                'profile_photo' => $request->profile_photo,
                'portfolio' => $request->portfolio,
                'resume' => $request->resume,
                'phone' => $request->phone,
                'skills' => $request->skills,
                'experience' => $request->experience,
                'education' => $request->education,
            ]
        );

        return back()->with('success', 'Profile updated successfully');
    }


}