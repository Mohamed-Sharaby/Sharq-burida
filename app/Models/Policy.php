<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $guarded = [];
   // protected $casts = ['files'=>'array'];


    public function files()
    {
        return $this->morphMany(File::class,'model');
    }

//    public function setFilesAttribute($files)
//    {
//        if (count($files) > 0) {
//            $results = [];
//            foreach ($files as $file) {
//                $fileName = $file->getClientOriginalName();
//                $file->move(storage_path("app/public/uploads"), $fileName);
//                $results[] =  'uploads/'.$fileName;
//            }
//            $this->attributes['files'] = json_encode($results);
//        }
//    }

}
