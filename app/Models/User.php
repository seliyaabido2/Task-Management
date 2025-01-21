<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    // protected $guard = 'web';

    protected $fillable = [
        'f_name',
        'l_name',
        'image',
        'email',
        'password',
        'phone',
        'user_type',
        'region',
        'status',
        'notification',
        'device_type',
        'device_token',
        'otp',
        'verify_email_otp',
        'email_verified_at',
        'remember_token',
    ];

    protected $guarded = [];

    public $timestamps = true;

    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute($value)
    {
        return asset($value ? 'uploads/users/'.$value: 'admin/dist/img/default.png');
    }
}
