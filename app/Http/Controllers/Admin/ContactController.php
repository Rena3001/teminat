<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Services\DataService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function index()
    {
        $contacts = Contact::all();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        if (!empty($contact)) {
            return view('admin.contacts.show', compact('contact'));
        } else {
            abort(404);
        }
    }

    public function destroy(Contact $contact)
    {
        if (!empty($contact)) {
            $deleted = $contact->delete();

            if ($deleted) {
                return redirect()->route('admin.contacts.index')
                    ->with('type', 'success')
                    ->with('message', 'Əlaqə uğurla silindi.');
            } else {
                return redirect()->back()
                    ->with('type', 'danger')
                    ->with('message', 'Əlaqəni silmək mümkün olmadı!');
            }
        } else {
            abort(404);
        }
    }
}
