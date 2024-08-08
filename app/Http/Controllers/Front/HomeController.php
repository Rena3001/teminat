<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $models = Service::all();  // Ensure $models is defined here
        $categories = Category::all();
        $settings = Setting::first(); // Make sure to fetch settings for iframe_map
        // Pass $settings to the view as well
        return view('client.home', compact('contacts', 'models', 'categories', 'settings'));
    }
}

