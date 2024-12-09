<?php

namespace App\Enums;

enum LanguagesEnum: string
{
    case en = 'en';
    case pt_BR = 'pt_BR';

    public static function values(): array
    {
        return array_map(fn(self $serviceType) => $serviceType->value, self::cases());
    }
}