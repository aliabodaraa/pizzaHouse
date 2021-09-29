<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //One to One User vs Photo
    // public function photo(){//هالشي بخليني اوصل للصوره من خلال اليوزر
    //     return $this->hasOne('App\Models\Photo');//لو انو الاسم الفورن كي الحظيناه بالفوتو ماكان  user_id وقتا لازم نمرق هون وسيط تاني بالاسم الفورن لحطيناه هنيك
    // }
 //one to many user vs role User vs Comment
//  public function comments(){
//     return $this->hasMany('App\Models\Comment');
// }

//     //Many to many User vs Role
//     public function roles(){
//         return $this->belongsToMany('App\Models\Role');
//     }
    //One to One polymorphic (User vs Photo) and (Post vs Photo) and ....
    public function photo(){
        //dd('as'.$this);
        return $this->morphOne(Photo::class,'photoable');
    }
    //Accessors
    public function getNameAttribute($value){
        //Suppose  function getFirstNameAttribute when we used in route (first_name)
        return strtoupper($value); }
//Mutators
public function setNameAttribute($value){//ايا قيمه رح تفوت عالنييم رح تطبق هالتابع
    $this->attributes['name'] =strtoupper($value);
}

}


