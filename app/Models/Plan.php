<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contacts',
        'slug',
        'stripe_plan',
        'price',
        'period',
    ];

    /**
     * Get plan's price.
     */
    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => __('$ :price', ['price' => number_format($value, 0, '.', ',')]),
        );
    }

    /**
     * Get plan's contacts.
     */
    protected function contacts(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => number_format($value, 0, '.', ','),
        );
    }
}
