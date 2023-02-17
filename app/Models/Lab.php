<?php

namespace App\Models;

class Lab extends Install
{
    public function boot()
    {
        parent::boot();
        static::addGlobalScope('lab', function (Builder $builder) {
            $builder->where('type', 'lab');
        });
        static::creating(function ($lab) {
            $lab->forceFill([
                'type' => 'lab',
            ]);
        });

    }
}
