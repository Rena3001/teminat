<?php

namespace App\Http\Controllers;

use App\Mail\ContactMsg;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendContactEmail(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fullname' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'text' => 'required|string',
        ]);


        // Debug the validated data
        // dd($validatedData);

        // Create a new contact entry
        // Contact::create($validatedData);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMsg($validatedData));
        $subject = "New Contact Message";
        $siteEmail = env('MAIL_FROM_ADDRESS');



        Mail::send(
            'emails.mail',
            $validatedData,
            function ($msg) use ($subject, $siteEmail) {
                $msg->to($siteEmail)->subject($subject);
            }
        );

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
