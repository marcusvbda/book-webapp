<?php

namespace App\Http\Middleware;

use App\Enums\LanguagesEnum;
use App\Helper;
use Closure;
use Illuminate\Http\Request;

class SetLocaleConfig
{
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route();
        $parameters = $route->parameters();
        $locale = @$parameters['lang'] ?? null;
        if (!$locale) {
            $locale = Helper::getRouterLocale();
            app()->setLocale($locale);
            return redirect()->to(Helper::routeLocaled($route->getName(), ['lang' => $locale]));
        }
        if (!in_array($locale, LanguagesEnum::values())) {
            $locale = LanguagesEnum::en->value;
            app()->setLocale($locale);
            return redirect()->to(Helper::routeLocaled($route->getName(), ['lang' => $locale]));
        }

        app()->setLocale($locale);
        $route->forgetParameter('lang');
        return $next($request);
    }
}
