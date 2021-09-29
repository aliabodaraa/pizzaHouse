<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable=['user_id','fileName'];
    // public function user(){//هالشي بخليني اوصل لليوزر من خلال الصوره
    //  return $this->belongsTo('App\Models\User');
    // }

     //One to One polymorphic (User vs Photo) and (Post vs Photo) and ....
     public function photoable(){
      //  dd('as'.$this);
        return $this->morphTo();
    }
}
