<?php

namespace App\Enums;

enum ServiceType: string
{
    case BeautySalon = 'Beauty salon';
    case BarberShop = 'Barber shop';
    case ManicuristAndNailDesigner = 'Manicurist and nail designer';
    case OtherServices = 'Other services';
}
