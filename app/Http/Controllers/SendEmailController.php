<?php

namespace App\Http\Controllers;

use App\Booking;
use App\House;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
     public function index()
    {
        return view('send_email');
    }
    public function send(Request $request, $id)
    {
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
        ]);
        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );

        Mail::to('phamduychelsea@gmail.com')->send(new SendMail($data));
        return back()->with('success', 'Thanks for contacting us!');

    }
}
