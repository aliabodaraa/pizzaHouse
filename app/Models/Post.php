<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
      //One to One polymorphic (User vs Photo) and (Post vs Photo) and ....
      public function photo(){
        //dd('as'.$this);
        return $this->morphOne(Photo::class,'photoable');
    }
}
