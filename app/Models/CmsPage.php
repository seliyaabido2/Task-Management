<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    use HasFactory;

    protected $table = 'cms_pages';

    protected $fillable = ['page_name','title','body',
    'image','address','contact','email','instagram','facebook','youtube','twitter'];

    public $timestamps = true;

    public function getImageAttribute($value)
    {
        return asset($value ? 'uploads/cms_pages/'.$value: 'admin/dist/img/default.png');
    }

}
