<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banners';

    protected $fillable = ['page','name','image'];

    public $timestamps = true;

    public function getImageAttribute($value)
    {
        return asset($value ? 'uploads/banners/'.$value: 'admin/dist/img/no_photo.png');
    }
}
