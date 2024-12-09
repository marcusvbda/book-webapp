<?php

namespace App\Models;

use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class File extends Model
{
    use HasCode;

    protected $fillable = [
        'description',
        'default',
        'url',
        'fileable_id',
        'fileable_type',
    ];

    protected $casts = [
        'default' => 'boolean',
    ];

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
