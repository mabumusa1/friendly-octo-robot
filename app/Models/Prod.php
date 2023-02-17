<?php

namespace App\Models;

class Prod extends Install
{
    public function boot()
    {
        parent::boot();
        static::addGlobalScope('prod', function (Builder $builder) {
            $builder->where('type', 'prod');
        });
        static::creating(function ($prod) {
            $prod->forceFill([
                'type' => 'prod',
            ]);
        });

    }
}
