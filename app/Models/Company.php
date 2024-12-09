<?php

namespace App\Models;

use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    use HasCode;

    protected $fillable = [
        'service_type'
    ];

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function serviceTypes(): HasMany
    {
        return $this->hasMany(ServiceType::class, 'company_id');
    }

    public function getLogoAttribute(): string
    {
        $logo = $this->files()->where('default', true)->where("description", "logo")->first();
        return $logo?->url ?? asset("images/no-image.png");
    }

    public function getInlineAddressAttribute(): string
    {
        $address = $this->addresses()->where('default', true)->first();
        $addressText = __("No address found");
        if (!$address) return $addressText;
        $addressText = "{$address->street}, {$address->number}, {$address->city}";
        return $addressText;
    }

    public function getPageUrlAttribute(): string
    {
        return "http://www.google.com";
    }
}
