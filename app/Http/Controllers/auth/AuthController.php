<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentRegister;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    // authentication

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'captcha' => [ 'required', 'captcha'],
        ], [
            'captcha.captcha' => 'Invalid Captcha'
        ]);
        array_pop($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    
    //profile of students

    public function profile(){

        $authUser = auth()->user()->load('RegisterUser');
        $college = StudentRegister::with('getCollegeDetail')->where('id', auth()->user()->seminar_registration_id)->first();
        return view('students.profile', compact('authUser','college'));
    }




    //logout
    
    
    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
