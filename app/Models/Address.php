<?php

namespace App\Models;

use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasCode;
    public $table = 'addresses';

    protected $fillable = [
        'description',
        'default',
        'country',
        'zipcode',
        'city',
        'neighborhood',
        'number',
        'complement',
        'addressable_id',
        'addressable_type',
    ];

    protected $casts = [
        'default' => 'boolean',
    ];
}
