<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TimezoneController extends Controller
{
    public function setTimezone(Request $request){ 
        $request->validate(['timezone' => 'required|string|timezone']);
        Session::put('user_timezone', $request->timezone);
        return response()->json(['status' => 'Timezone set']);
    }
}
