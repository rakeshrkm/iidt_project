<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactUsController extends Controller
{

    public function index(){

        return view('front.contact');

    }

    public function save(Request $request){

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'min:10',

        ]);

        $contact = new Contact();
        $contact->fill($request->all());
        $contact->save();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'remarks' => $request->message,
        ];

        $email = $request->email;

        Mail::send('send-mail.contacts', $data, function($message){
            $message->to('idea@iitdrone.com')->subject('Contact Us');
        });

        if($contact){
            return redirect()->back()->with('success', 'Thanks for contact, Team will contact you soon !');
        }else{
            return redirect()->back()->with('error', 'Your record not created');
        }
    }
}
