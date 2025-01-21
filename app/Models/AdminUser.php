<?php

namespace App\Models;

use App\Notifications\AdminResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    use HasFactory , Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['f_name','l_name','email','password','status','image'];

    public $timestamps = true;

    public function sendPasswordResetNotification($token) {
        $this->notify(new AdminResetPassword($token));
    }

    public function getImageAttribute($value)
    {
        return asset($value ? 'uploads/admins/'.$value: 'admin/dist/img/default.png');
    }

}
