<?php

namespace App\Enums;

enum ServiceTypeEnum: string
{
    case BeautySalon = 'Beauty salon';
    case BarberShop = 'Barber shop';
    case ManicuristAndNailDesigner = 'Manicurist and nail designer';
    case OtherServices = 'Other services';

    public static function fromTranslatedValue(int|string $value, $fallback = null): mixed
    {
        $cases = self::cases();
        $filtered = array_filter($cases, fn(self $serviceType) => __($serviceType->value) === $value);
        return $filtered ? current($filtered) : $fallback;
    }
}
