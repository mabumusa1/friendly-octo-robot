<?php

namespace App\Models;

class Prod extends Install
{

    protected static function booted(): void
    {
        static::addGlobalScope('prod', function (Builder $builder) {
            $builder->where('type', 'prod');
        });
    }
}
