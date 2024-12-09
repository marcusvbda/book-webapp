<?php

namespace App;

use App\Enums\LanguagesEnum;
use Illuminate\Support\Facades\App;

class Helper
{
    public static function addQueryParams($url, $params)
    {
        $parsedUrl = parse_url($url);
        parse_str($parsedUrl['query'] ?? '', $existingParams);
        $mergedParams = array_merge($existingParams, $params);
        $baseUrl = explode('?', $url)[0];
        $queryString = http_build_query($mergedParams);
        return $baseUrl . ($queryString ? '?' . $queryString : '');
    }

    public static function getRouterLocale()
    {
        $availableLocales = LanguagesEnum::values();
        $locale = request()->get('lang');
        if (!$locale) {
            $preferredLanguage = request()->getPreferredLanguage($availableLocales);
            $locale = in_array($preferredLanguage, $availableLocales) ? $preferredLanguage : LanguagesEnum::en->value;
            return $locale;
        }
        if (!in_array($locale, $availableLocales)) {
            $locale = LanguagesEnum::en->value;
            return $locale;
        }
        return $locale;
    }


    public static function routeLocaled($route, $params = [])
    {
        $params["lang"] = App()->getLocale();
        return route($route, $params);
    }
}
