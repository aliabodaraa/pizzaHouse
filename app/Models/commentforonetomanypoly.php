<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentforonetomanypoly extends Model
{
    use HasFactory;
    public function commentable(){
        //  dd('as'.$this);
          return $this->morphTo();
      }
}
