<?php

namespace App\Http\Controllers;

use App\Mail\SendDemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendDemoMail()
    {
        $email = 'positronx@gmail.com';

        $maildata = [
            'title' => 'Laravel 8|7 Mail Sending Example with Markdown',
            'url' => 'https://www.positronx.io'
        ];

        Mail::to($email)->send(new SendDemoMail($maildata));

        dd("Mail has been sent successfully");
    }
}
