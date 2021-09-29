<?php

use App\Http\Controllers\addUserController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Pizza;
use App\Models\User;
use App\Models\Photo;
use App\Models\Role;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostforonetomanyPhol;
use App\Models\Video;

use Illuminate\Auth\AuthenticationException;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome',['name'=>'ali']);
});
Route::get('/pizzas','App\Http\Controllers\PizzaController@index')->name('pizzas.index');//->middleware('auth');
Route::get('/pizzas/create','App\Http\Controllers\PizzaController@create')->name('pizzas.create');//->middleware('auth');//Ordenary run before the next step
Route::get('/pizzas/{id}','App\Http\Controllers\PizzaController@show')->name('pizzas.show');
Route::post('/pizzas','App\Http\Controllers\PizzaController@store')->name('pizzas.store');//->middleware('auth');//when i am in /pizzas and fill the field will run the store function and collaborate with @csrf ,  post /pizza combatableon form action..
Route::delete('/pizzas/{id}','App\Http\Controllers\PizzaController@destroy')->name('pizzas.destroy');//->middleware('auth');
// Route::get('/pizzas', function () {
//     //$pizza=['type'=>'pizzachikhen','size'=>'large','price'=>'110$'];
//     $pizzasVar=[
//     ['type'=>'holiwan','base'=>'Cheesy crest'],
//     ['type'=>'volcano','base'=>'garlic crest'],
//     ['type'=>'holiwan','base'=>'thin & crispy'] ];
//     $name=request('name');
//      return view('pizzas',
//      ['pizza'=> $pizzasVar,
//      'name'=>$name
//     ,'age'=>request("age")]); //detecte variable in url/name=dsd&age=34
//     //return "ali";
//     //return ['ali'=>'abodaraa','asem'=>'dribati']; //send Json
// });



 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::redirect('/pizzas', '/');
Route::get('/home/{name}',function($username,$id=2) {
    $polo=['name'=>'aliabodaraaArray'];
    // return view('ali',compact('username','id')
    // ,['oo'=>$id,'name'=>'aliabodaraaArray','polo'=>$polo]);
    return view('ali',compact('username','id'),['oo'=>$id,'name'=>'mario','polo'=>$polo]);
});
Route::resource('/UDM',MainController::class);
Route::get('/insert',[MainController::class,'insert']);// /insertالى/posts/insertرح بدلstore($id)مشان ما ينفذ ال
Route::get('/update',[MainController::class,'updatePizza']);
Route::get('/updateInsert',[MainController::class,'updateInsert']);
Route::get('/delete',[MainController::class,'deletePizza']);

Route::get('/UDM/restore/{id}',function($id){
    Pizza::withTrashed()->where('id',$id)->restore();
    return redirect('/UDM')->with("mssg","Restore Done Now you can delete thi Row :)");
});
//Relationships
//OneToOne User photo
Route::get('/users',function(){
    return Photo::findOrFail(1)->user;
});

//OneToMany User Comments
 Route::get('/comments',function(){
     $comm= Comment::findOrFail(2);
     return $comm->user;
 });

//ManyToMany User roles
Route::get('/roles',function(){
    $user= User::findOrFail(55);
    return $user->roles;
});
//One to One polymorphic (User vs Photo) and (Post vs Photo) and ....
Route::get('user/{id}',function($id){
    $user=Post::find($id);
   $imagesUser= $user->photo;
   return  $imagesUser;
});
//One to Many polymorphic (Postfor.. vs commentfor..) and (Video vs commentfor..) and ....
Route::get('poly/{id}',function($id){
    $user=PostforonetomanyPhol::find($id);
   return $user->comments;
});
//One to Many polymorphic (Postfor.. vs commentfor..) and (Video vs commentfor..) and ....
Route::get('poly/{id}',function($id){
    $user=PostforonetomanyPhol::find($id);
   return $user->comments;
});
 //Many to MAny polymorphic (PostforonetomanyPhol vs Tags)and(Video vs Tags)
 Route::get('polyMany/{id}',function($id){
    $user=Video::find($id);
   return $user->tags;
});
//Accessors
Route::get('/user/name/{id}',function($id){
    $user=User::findOrFail($id);
   return $user->name;
});

//Mudutors
Route::resource('/User',addUserController::class);

//Auth
Auth::routes();//nessesaryto show register and login you can hide twice
//need use Illuminate\Support\Facades\Auth;
Route::get('/userlogin',function(){
    if(Auth::check()){//لاعرف اذا هوي حاليا مسجل دخول ولا لا
        return Auth::user();
    }else{return "this user not authenticated";}

   //return Auth::id();
});
