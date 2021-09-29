<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{//protected $table='tags';
    use HasFactory;
     //Many to MAny polymorphic (PostforonetomanyPhol vs Tags)and(Video vs Tags)
    public function posts(){
        return $this->morphedByMany(PostforonetomanyPhol::class,'taggable');
    }
    public function videos(){
        return $this->morphedByMany(Video::class,'taggable');
    }
}
