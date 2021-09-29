<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza; //for conecting on the model for detect rows on db
class PizzaController extends Controller
{
public function __construct()
    {
        $this->middleware('auth');
    }
public function index(){
    $pizz11=Pizza::all(); //Collection All
    $pizz11=Pizza::orderBy('name','desc')->get();
    $pizz11=Pizza::where('name','ali')->get();
    $pizz11=Pizza::latest()->get();//the last row created

        $name=request('name');
        $pizzasVar=[['type'=>'holiwan','base'=>'Cheesy crest'],['type'=>'volcano','base'=>'garlic crest'],['type'=>'holiwan','base'=>'thin & crispy'] ];
         return view('pizzas.index',
         ['pizza11'=>$pizz11,'pizza'=> $pizzasVar,'name'=>$name,'age'=>request("age")]); //detecte variable in url/name=dsd&age=34

}
// public function index(){
//     //$pizza=['type'=>'pizzachikhen','size'=>'large','price'=>'110$'];
//     $pizzasVar=[
//        ['type'=>'holiwan','base'=>'Cheesy crest'],
//        ['type'=>'volcano','base'=>'garlic crest'],
//        ['type'=>'holiwan','base'=>'thin & crispy'] ];
//        $name=request('name');
//         return view('pizzas',
//         ['pizza'=> $pizzasVar,'name'=>$name,'age'=>request("age")]); //detecte variable in url/name=dsd&age=34
//        //return "ali";
//        //return ['ali'=>'abodaraa','asem'=>'dribati']; //send Json
// }

public function show($id){
     //detecte variable in url/44  44save in {id}
   //use the $id variable to query the db for a record
//    return view('pizzas.show',['id'=>$id]);
   //return "ali";
   //return ['ali'=>'abodaraa','asem'=>'dribati']; //send Json
   $pizza12=Pizza::findOrFail($id);//Find To The Single Record && OrFail for when 1d isn't exist in db
   return view('pizzas.show',['pizzadetails'=> $pizza12]);
}
public function create(){
    return view('pizzas.create');
}
public function store(){
    // error_log(request('name'));//faild the all
    // error_log(request('type'));
    // error_log(request('base'));
    $pizza=new Pizza();
    $pizza->name=request('name');
    $pizza->type=request('type');
    $pizza->base=request('base');
    $pizza->price=request('price');
    $pizza->tooping=request('tooping');
   // error_log($pizza);
   $pizza->save();
    return redirect('/')->with("mssg","thanks for giving your Order");
  // return request('tooping'); for json
}
public function destroy($id){
$pizzadel=Pizza::findOrFail($id);
$pizzadel->delete();
return redirect('/pizzas');
}
}
