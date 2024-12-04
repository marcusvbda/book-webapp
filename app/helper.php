<?php

namespace App;

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
}
