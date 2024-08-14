<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $contacts=Contact::all();
        $settings = Setting::first();
        return view('client.about.about' , compact('contacts','settings'));
    }
}
