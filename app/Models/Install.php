<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Install extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the install.
     */
    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }
}
