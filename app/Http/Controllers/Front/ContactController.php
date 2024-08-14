<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();  // Bütün kontaktları yükləyir
        return view('client.contact.contact', compact('contacts'));
    }

    public function submit(Request $request)
    {
        // Form məlumatlarını təsdiqləyin
        $request->validate([
            'fname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'proffession' => 'nullable|string|max:255',
            'number' => 'required|string|max:20',
            'file' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048',
            'note' => 'nullable|string|max:5000',
        ]);

        Contact::create([
            'fname'=>$request->fname,
            'email'=>$request->email,
            'proffession'=>$request->proffession,
            'number'=>$request->number,
            'file'=>($request->hasFile('file'))? $request->file('file')->store('files') : null,
            'note'=>$request->note,
        ]);

        // Yeni kontakt məlumatını bazaya əlavə edin
        // $contact = new Contact();
        // $contact->fname = $request->fname;
        // $contact->email = $request->email;
        // $contact->proffession = $request->proffession;
        // $contact->number = $request->number;
        // if ($request->hasFile('file')) {
        //     $contact->file = $request->file('file')->store('files');
        // }
        // $contact->note = $request->note;
        // $contact->save();
        // dd($request->fname);
        // Uğurlu mesaj ilə geri yönləndirin
        return redirect()->back()->with('success', 'Məlumatınız uğurla göndərildi!');
    }
}
