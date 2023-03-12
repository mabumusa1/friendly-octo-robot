<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Demo extends Install
{
    protected static function booted(): void
    {
        static::addGlobalScope('demo', function (Builder $builder) {
            $builder->where('type', 'demo');
        });
    }
}
