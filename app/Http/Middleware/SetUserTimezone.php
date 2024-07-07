<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class SetUserTimezone
{
    public function handle($request, Closure $next)
    {
        if (Session::has('user_timezone')) {
            $timezone = Session::get('user_timezone');
            Config::set('app.timezone', $timezone);
            date_default_timezone_set($timezone);
        }

        return $next($request);
    }
}
