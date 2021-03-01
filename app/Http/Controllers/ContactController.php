<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;



class ContactController extends Controller
{
    /**
     * Retrieve and validate input data and send an email to contact
     *
     * @param ContactRequest $request
     * @return view
     */
    public function send(ContactRequest $request)
    {
        $name = utf8_decode($request->name);
        $email = utf8_decode($request->email);
        $subject = utf8_decode($request->subject);
        $msg = utf8_decode($request->message);

        $data = compact('name', 'email', 'subject', 'msg');

        Mail::send('emails.contact', $data, function($message){
            $message->to('contact@naturelcoquin.com', 'Blog.naturelCoquin')->subject('Contact mail blog');   
        });

        return back();
    
    }
}
