<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;   // ✅ required
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\JobController;
use App\Models\CandidateProfile;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

   public function login(Request $request)
    {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt($request->only('email', 'password'))) {

                $request->session()->regenerate(); // ✅ yaha hona chahiye

                $user = Auth::user();

                // 🔹 ADMIN LOGIN
                if ($user->role == 'admin') {
                    return redirect()->intended('admin/jobs/create');
                }

                // 🔹 CANDIDATE LOGIN
                if ($user->role == 'candidate') {


                    $profileExists = CandidateProfile::where('user_id', $user->id)->exists();

                    if (!$profileExists) {
                        CandidateProfile::create([
                            'user_id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                        ]);
                    }

                    $data = session('pending_apply');


                    if ($data) {
                       $data['full_name'] =  $user->name;
                       $data['email'] = $user->email;
                        session()->forget('pending_apply');

                        // 👉 JobController ka method call karo
                        return app(JobController::class)
                            ->storeApplicationFromLogin($data, $data['job_id']);
                    }

                    if($data){
                        return redirect()->route('candidate.profile')->with('success', 'Job applied successfully!');

                       //return redirect()->intended('/');
                    }
                    else {
                        return redirect('/candidate/dashboard');
                    }

                    
                }
            }

    return back()->with('error', 'Invalid credentials');
}

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    

    public function showCanddiateLogin()
    {
        return view('auth.login');
    }
}