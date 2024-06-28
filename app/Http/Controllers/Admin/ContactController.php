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
            $contact['fullname'] = $contact->getTranslations('fullname');
            $contact['email'] = $contact->getTranslations('email');
            $contact['phone'] = $contact->getTranslations('phone');
            $contact['message'] = $contact->getTranslations('message');
            return view('admin.contacts.show', compact('contact'));
        } else {
            abort(404);
        }
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
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
