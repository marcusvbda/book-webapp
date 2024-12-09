<?php

namespace App\Models;

use App\Enums\ServiceType as EnumsServiceType;
use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasCode;

    public $timestamps = false;
    protected $table = 'company_service_types';
    protected $fillable = [
        'company_id',
        'service_type'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getServiceAttribute()
    {
        return EnumsServiceTypeEnum::from($this->service_type);
    }
}
