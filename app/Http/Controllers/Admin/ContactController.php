<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){

        $contacts=Contact::all();
        return view('admin.contacts.index');
    }

    public function show(Contact $contact){
        if (!empty($contact)) {
            $contact['fullname'] = $contact->getTranslations('fullname');
            $contact['email'] = $contact->getTranslations('email');
            $contact['phone'] = $contact->getTranslations('phone');
            $contact['message'] = $contact->getTranslations('message');
            return view('admin.contacts.show', compact('contact'));
        } else {
            abort(404);
        }
    }
    public function destroy(Contact $contact)
    {
        if (!empty($contact)) {
            $contact->delete();
            return redirect()->route('admin.contacts.index')
                ->with('type', 'success')
                ->with('message', 'Məhsul uğurla silindi.');
        } else {
            abort(404);
        }
    }
}
