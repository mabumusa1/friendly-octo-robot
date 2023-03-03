<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;

class Lab extends Install
{
    protected static function booted(): void
    {
        static::addGlobalScope('lab', function (Builder $builder) {
            $builder->where('type', 'lab');
        });
    }
}
