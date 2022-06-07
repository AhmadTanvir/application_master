<?php

namespace App\Http\Controllers;

use App\Mail\MailSending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request) {
        $toEmail    =   Auth::user()->email;
        $data       =   array(
            "message"    =>   'Hello How Are You??'
        );

        // pass dynamic message to mail class
        Mail::to($toEmail)->send(new MailSending($data));

        if(Mail::failures() !== 0) {
            return back()->with("success", "E-mail sent successfully!");
        }

        else {
            return back()->with("failed", "E-mail not sent!");
        }
    }
}
