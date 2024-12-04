<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocaleFromHeader
{
    public function handle(Request $request, Closure $next)
    {
        $availableLocales = ['en', 'pt_BR'];
        $locale = $request->get('lang');
        if (is_null($locale)) {
            $preferredLanguage = $request->getPreferredLanguage($availableLocales);
            $locale = in_array($preferredLanguage, $availableLocales) ? $preferredLanguage : 'en';
            return redirect()->to($request->fullUrlWithQuery(['lang' => $locale]));
        }
        if (!in_array($locale, $availableLocales)) {
            $locale = 'en';
            return redirect()->to($request->fullUrlWithQuery(['lang' => $locale]));
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
