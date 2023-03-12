<?php

namespace App\Models;

use App\Traits\InstallProperties;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Install extends Model
{
    use HasFactory, SoftDeletes, InstallProperties;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'properties' => AsArrayObject::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'data_center_id',
        'user_id',
        'type',
        'name',
        'properties',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'installs';

    /**
     * Get the user that owns the install.
     */
    public function user()
    {
        return $this->belongsTo(App\Models\User::class);
    }

    /**
     * Get the data center that owns the install.
     */
    public function dataCenter()
    {
        return $this->belongsTo(App\Models\DataCenter::class);
    }
}
