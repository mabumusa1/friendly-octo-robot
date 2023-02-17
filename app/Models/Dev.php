<?php

namespace App\Models;

class Dev extends Install
{
    public function boot()
    {
        parent::boot();
        static::addGlobalScope('dev', function (Builder $builder) {
            $builder->where('type', 'dev');
        });
        static::creating(function ($dev) {
            $dev->forceFill([
                'type' => 'dev',
            ]);
        });

    }
}
