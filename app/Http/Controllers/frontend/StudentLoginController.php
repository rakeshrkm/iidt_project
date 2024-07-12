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
use App\Models\User;
use Hash;
use Mail;


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



    public function changePassword(){
        return view('front.change-password');
    }

    public function saveChangePassword(Request $request){

        $validate = $request->validate([
            'password' => 'required',
            'new_password' => 'required|same:password_confirm|min:6',
            'password_confirm' => 'required|min:6',
        ]);

        $datapassword = User::where('id', auth()->user()->id)->first();

        $hashedPassword =  $datapassword->password;

        if (Hash::check($request->password, $hashedPassword)) {
            $datapassword->password = Hash::make($request->new_password);
            $datapassword->save();

            $data = [
                'name' => $datapassword->name,
                'password' => $request->new_password,
            ];

            Mail::send('send-mail.change-password', $data, function($message) use($datapassword){
                $message->to($datapassword->email)->subject('Password Change');
            });

            return redirect()->back()->with('success', 'Your password has been changed successfully, Please check your mail');

        }else{
            return redirect()->back()->with('error', 'Your old password does not match !');
        }
    }

    public function logout(Request $request){
    
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');

    }

    public function profile(){
        $userData = auth()->user()->load('RegisterUser');
        // dd($userData->RegisterUser->email);



        return view('front.profile', [
            'data' => $userData 
        ]);
    } 
}




