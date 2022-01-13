<?php

namespace App\Http\Middleware;

use App\Models\UserSettings;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $record = UserSettings::where(['customer_id' => $user->customer_code])->first();
        //if (Session::has('locale')) {
        App::setLocale(Session::get('locale', $record->language));
        //}
        return $next($request);
    }
}