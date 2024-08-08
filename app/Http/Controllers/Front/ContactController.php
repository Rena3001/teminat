<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller

{
    public function index(){
        return view('client.contact.contact');
    }
    public function submit(Request $request)
    {
        // Validate request
        $request->validate([
            'fname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'proffession' => 'nullable|string|max:255',
            'number' => 'required|string|max:20',
            'file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048',
            'note' => 'nullable|string',
        ]);

        // Save contact
        $contact = new Contact();
        $contact->fname = $request->fname;
        $contact->email = $request->email;
        $contact->proffession = $request->proffession;
        $contact->number = $request->number;
        if ($request->hasFile('file')) {
            $contact->file = $request->file('file')->store('files');
        }
        $contact->note = $request->note;
        $contact->save();
        // dd($contact);


        // Redirect back with a success message
        return redirect()->back()->with('success', 'Contact information submitted successfully!');
    }
}
