<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function setImageAttribute($image)
    {
        if (!is_null($image)) {
            $this->attributes['image'] = uploadImage('uploads', $image);
        }
    }

    public function getImageAttribute($image)
    {
        if (is_null($image)){
            return '';
        }else{
            return url('/').'/storage/'.$image;
        }
    }

    public function scopeActive($query)
    {
        return $query->whereIsActive(1);
    }
}
