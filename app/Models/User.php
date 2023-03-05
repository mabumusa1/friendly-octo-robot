<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Lab;
use App\Models\Demo;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
class User extends Authenticatable implements FilamentUser, HasName
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get the lab that belongs to this user.
     */
    public function lab()
    {
        return $this->hasOne(Lab::class);
    }

    /**
     * Get the lab that belongs to this user.
     */
    public function demos()
    {
        return $this->hasMany(Demo::class);
    }


    /**
     * Print the user's name.
     */
    public function getFilamentName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * General rule to determine if a user can access Filament.
     */
    public function canAccessFilament(): bool
    {
        return $this->hasVerifiedEmail();
    }
}
