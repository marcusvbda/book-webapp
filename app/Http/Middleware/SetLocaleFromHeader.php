<?php

namespace App\Http\Middleware;

use App\Enums\Languages;
use Closure;
use Illuminate\Http\Request;

class SetLocaleFromHeader
{
    public function handle(Request $request, Closure $next)
    {
        $availableLocales = Languages::values();
        $locale = $request->get('lang');
        if (is_null($locale)) {
            $preferredLanguage = $request->getPreferredLanguage($availableLocales);
            $locale = in_array($preferredLanguage, $availableLocales) ? $preferredLanguage : Languages::en->value;
            return redirect()->to($request->fullUrlWithQuery(['lang' => $locale]));
        }
        if (!in_array($locale, $availableLocales)) {
            $locale = Languages::en->value;
            return redirect()->to($request->fullUrlWithQuery(['lang' => $locale]));
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
