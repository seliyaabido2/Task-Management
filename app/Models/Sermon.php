<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    use HasFactory;

    protected $fillable = ['name','author_name','upload_date','image','audio','status'];

    public $timestamps = true;

    public function getImageAttribute($value)
    {
        return asset($value ? 'uploads/sermons/image/'.$value: 'admin/dist/img/no_photo.png');
    }
    public function getAudioAttribute($value)
    {
        return asset($value ? 'uploads/sermons/audio/'.$value: null);
    }
}
