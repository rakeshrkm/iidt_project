<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\ReCaptcha;
use Illuminate\View\View;



class StudentLoginController extends Controller
{
    public function LoginPageLoad(){
        return view('front.login');
    }

    public function authenticateStudent(Request $request){ 
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            // 'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('student.dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
    
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');

    }
}




