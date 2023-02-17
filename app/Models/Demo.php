<?php

namespace App\Models;

class Demo extends Install
{
    public function boot()
    {
        parent::boot();
        static::addGlobalScope('demo', function (Builder $builder) {
            $builder->where('type', 'demo');
        });
        static::creating(function ($demo) {
            $demo->forceFill([
                'type' => 'demo',
            ]);
        });

    }
}
