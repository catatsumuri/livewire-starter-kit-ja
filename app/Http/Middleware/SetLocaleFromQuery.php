<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleFromQuery
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('_locale')) {
            App::setLocale($request->query('_locale'));
        }

        return $next($request);
    }
}
