<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;
    //  //One to MAny polymorphic
    //  public function comments(){
    //     //dd('as'.$this);
    //     return $this->morphMany(commentforonetomanypoly::class,'commentable');
    // }
       //Many to MAny polymorphic (post vs Tags)and(Video vs Tags)
       public function tags(){
        //dd('as'.$this);
        return $this->morphToMany(Tag::class,'taggable');
    }
}
