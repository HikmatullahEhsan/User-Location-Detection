<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;
class LanguageChange
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        App::setLocale(Session::has('lang') ? Session::get('lang') : Config::get('app.locale'));

        return $next($request);
    }
}
