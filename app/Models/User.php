<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The CalculatedBeam Model Relationships.
     *
     */
    public function CalculatedBeam()
    {
        return $this->hasMany('App\Models\CalculatedBeam', 'user_id', 'id');
    }

    public function CalculatedColumn()
    {
        return $this->hasMany('App\Models\CalculatedColumn', 'user_id', 'id');
    }

    public function CalculatedEangle()
    {
        return $this->hasMany('App\Models\CalculatedEangle', 'user_id', 'id');
    }
}
