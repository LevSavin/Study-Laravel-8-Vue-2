<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; //HasApiTokens;


    public static $availableFields = [
        'id',
        'name',
        'lastname',
        'patronymic',
        'email',
        'phone',
        'profession',
        'password',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'patronymic',
        'profession',
        'email',
        'phone',
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

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'user_id', 'id');
    }

    public function workdays(): HasMany
    {
        return $this->hasMany(Workday::class, 'master_id', 'id');
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'master_id', 'id');
    }
}
