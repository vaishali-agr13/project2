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


    public function loginAdmin(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'admin'
            ])) {

                $request->session()->regenerate();

                return redirect()->intended('admin/jobs/create');
            }

            return back()->with('error', 'Invalid admin credentials');
        }
//    public function login(Request $request)
//     {
//             $request->validate([
//                 'email' => 'required|email',
//                 'password' => 'required'
//             ]);

//             if (Auth::attempt($request->only('email', 'password'))) {

//                 $request->session()->regenerate(); // ✅ yaha hona chahiye

//                 $user = Auth::user();

//                 // 🔹 ADMIN LOGIN
//                 if ($user->role == 'admin') {
//                     return redirect()->intended('admin/jobs/create');
//                 }

//                 // 🔹 CANDIDATE LOGIN
//                 if ($user->role == 'candidate') {


//                     $profileExists = CandidateProfile::where('user_id', $user->id)->exists();

//                     if (!$profileExists) {
//                         CandidateProfile::create([
//                             'user_id' => $user->id,
//                             'name' => $user->name,
//                             'email' => $user->email,
//                         ]);
//                     }

//                     $data = session('pending_apply');


//                     if ($data) {
//                        $data['full_name'] =  $user->name;
//                        $data['email'] = $user->email;
//                         session()->forget('pending_apply');

//                         // 👉 JobController ka method call karo
//                         return app(JobController::class)
//                             ->storeApplicationFromLogin($data, $data['job_id']);
//                     }

//                     if($data){
//                         return redirect()->route('candidate.profile')->with('success', 'Job applied successfully!');

//                        //return redirect()->intended('/');
//                     }
//                     else {
//                         return redirect('/candidate/dashboard');
//                     }

                    
//                 }
//             }

//     return back()->with('error', 'Invalid credentials');
//    }


        public function loginCandidate(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'candidate'
            ])) {

                $request->session()->regenerate();

                $user = Auth::user();

                // 🔹 Profile create if not exists
                $profileExists = CandidateProfile::where('user_id', $user->id)->exists();

                if (!$profileExists) {
                    CandidateProfile::create([
                        'user_id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ]);
                }

                // 🔹 Pending job apply logic
                $data = session('pending_apply');

                if ($data) {
                    $data['full_name'] = $user->name;
                    $data['email'] = $user->email;

                    session()->forget('pending_apply');

                    return app(JobController::class)
                        ->storeApplicationFromLogin($data, $data['job_id']);
                }

                // 🔹 Normal redirect
                return redirect('/candidate/dashboard');
            }

            return back()->with('error', 'Invalid candidate credentials');
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