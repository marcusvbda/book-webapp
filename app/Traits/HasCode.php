<?php

namespace App\Traits;

use Hashids\Hashids;

trait HasCode
{
    public function getCodeAttribute()
    {
        return (new Hashids())->encode($this->id);
    }

    public static function findByCode($code)
    {
        $id = (new Hashids())->decode($code);
        return static::find($id[0]);
    }

    public static function findByCodeOrFail($code)
    {
        $id = (new Hashids())->decode($code);
        return static::findOrFail($id[0]);
    }
}
