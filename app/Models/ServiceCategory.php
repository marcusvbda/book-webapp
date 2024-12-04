<?php

namespace App\Models;

use App\Traits\HasCode;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use  HasCode;

    protected $table = 'service_categories';
    protected $fillable = ['name'];
}
