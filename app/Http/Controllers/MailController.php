<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Contact;
use Mail;

class MailController extends Controller
{
    public function index(){
        return view('contact');
    }
    
    public function send(Request $request){
        if(!$request['name'] || !$request['email'] || !$request['comments'] || $request['message']) return redirect()->back()->with([
            'status' => 500,
            'message' => "Bad Credentials",
        ]);
        Contact::create($request->only(['name', 'email', 'comments', 'subject']));
        Mail::to($request->email)
        ->send(new \App\Mail\ContactMail($request->only(['name', 'email', 'comments', 'subject'])));
        //return redirect()->back()->with([
          //  'status' => 200,
        //]);
        

        return redirect()->route('contact')->with('message','Contact Send Successfully');
        

    }
}
