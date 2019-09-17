<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Messages;
use App\Settings;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required'
            
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $msg = new Messages();
        $msg->name = $request->input('name');
        $msg->email = $request->input('email');
        $msg->subject = $request->input('subject');
        $msg->message = $request->input('message');
        $msg->save();

        $headers = 'From: '. \App\Settings::where('name', 'Contact Email')->first()->value . "\r\n";
        
        mail(
            \App\Settings::where('name', 'Contact Email')->first()->value, 
            $request->input('subject'),
            $request->input('message'),
            $headers
        );

        return redirect()->back();

    }
}
  