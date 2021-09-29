<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pizza extends Model
{use SoftDeletes;//go to migration and add column delete_at
    //use HasFactory;

    //protected $table='some-thing;
    protected $casts=['tooping'=>'array']; //must be $casts because it do cast json to array

    protected $fillable=[
    'name',
    'base',
    'price',
    'type',
    'tooping'];//what must i fill on insert new row

  //  protected $gard=[];//what must'nt i fill on insert new row
}
