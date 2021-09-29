<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pizza; //for conecting on the model for detect rows on db


class MainController extends Controller
{
    //public  $casts=['tooping'=>'array'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deletePizza()
    {
        dd('delete the row has id=122');
        DB::table('pizzas')->where('id',122)->delete();
        //DB::table('pizzas')->delete();//لما بتتنفذ وبعدا بعمل انسيرت رح يبلش الايدي من بعد اعلى ايدي
        //DB::table('pizzas')->truncate();//لما بتتنفذ وبعدا بعمل انسيرت رح يبلش الايدي من 0
    }
    public function updateInsert()
    {
        DB::table('pizzas')->where('id',2)->updateOrInsert(['id'=>5]
       ,[
        'id'=>233,
        'created_at'=>'2021-08-29 11:13:03',
        'updated_at'=>'2023-02-19 11:03:03',
        'name'=>'alinew',
        'tooping'=>'["aa","aliiiiiiiiiiiiiiiiddd"]',
        'base'=>'chickenew',
        'type'=>'pizzaabodaraa','price'=>13124
    ]);
    }

    public function updatePizza()
    {dd("Done update 3 Rows");
        DB::table('pizzas')->where('id',2)->update(['name'=>'AliRamadanAbodaraa']);
    }
    public function insert()
    {
        dd("Done insert 3 Rows");
        DB::table('pizzas')->insert(
          [
    [
        'id'=>23,
        'created_at'=>'2021-08-29 11:13:03',
        'updated_at'=>'2023-02-19 11:03:03',
        'name'=>'ali',
        'tooping'=>'["aa","aliiiiiiiiiiiiiiiiddd"]',
        'base'=>'chicke',
        'type'=>'pizzaabodaraa','price'=>13124
    ],
    [
        'id'=>24,
        'created_at'=>'2013-08-29 11:13:03',
        'updated_at'=>'2021-02-19 11:03:03',
        'name'=>'ali23',
        'tooping'=>'["aa","sdfdf"]',
        'base'=>'qwed',
        'type'=>'eqwe','price'=>24
    ],
    [
        'id'=>25,
        'created_at'=>'2013-08-29 11:13:03',
        'updated_at'=>'2023-02-19 11:03:03',
        'name'=>'ali24',
        'tooping'=>'["aa","addd"]',
        'base'=>'sdftbettb',
        'type'=>'asd','price'=>14
    ]
    ]
);
    }
    public function index()
    {//invode when url /UDM
       // dd("invoke /posts");
       //  $posts= DB::table('pizzas')->get();
        //$posts= DB::table('pizzas')->where('id',4)->get();
        // $user=DB::table('users')->where('name','aliabodaraa')->get();
       // return $user; // return $posts;
        // $post= DB::table('pizzas')->where('name','uu')->first();
        // $post= DB::table('pizzas')->Pluck('name');//property name only
        // $post= DB::table('pizzas')->select('name','id')->get();
        //$posts=Pizza::all();
        $posts=Pizza::withTrashed()->get();//الاسطر الممسوحه وغير الممسوحه
        //$posts=Pizza::onlyTrashed()->get();// الاسطر الممسوحه فقط
         return view('UDM.index',['posts'=>$posts]);

         //return view('welcome',compact('post'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {//invode when url /UDM/create
        return view('UDM.createPosts');
        //dd("createasadksd");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//next insert the method create
    //return $request;// after click submit in create.blade will go to action and write this information in $request
       // dd("storeasadksd");
    //    $pizza=new Pizza();
    //    $pizza->name=$request -> name;
    //    $pizza->type=$request -> type;
    //    $pizza->base=$request -> base;
    //    $pizza->price=$request -> price;
    //    $pizza->tooping=$request -> tooping;
      //$pizza->save();
         // error_log($pizza);
      Pizza::create(
      ['name'=>$request->name, //go to model Pizza and see the $fillable for protection on input
      'price'=>$request->price,
      'type'=>$request->type,
      'base'=>$request->base,
      'tooping'=>$request->tooping]);
       return redirect('/UDM')->with("mssg","thanks for giving your Order");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {//invode when write /posts/{id}
      // dd("Showasadksd");
      $postshow=Pizza::findOrFail($id);
      return view('UDM.show', ['postshow'=>$postshow]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {//invode when write /posts/{id}/edit
      //  dd("Editasadksd");
      $posts=Pizza::findOrFail($id);
      return view('UDM.update', ['posts'=>$posts]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    //next update the method edit
    {//بعد مابعمل تعديل من خلال PATCH
        // after click submit in edit.blade will go to action and write this information in $request
        //dd("Updateasadksd");
        $posts=Pizza::findOrFail($id);
        // $posts->name=$request->name;
        // $posts->price=$request->price;
        // $posts->type=$request->type;
        // $posts->tooping=$request->tooping;
        // $posts->save();
        $posts->update(
        ['name'=>$request->name, //go to model Pizza and see the $fillable for protection on input
        'price'=>$request->price,
        'type'=>$request->type,
        'base'=>$request->base,
        'tooping'=>$request->tooping]);
        return redirect('/UDM')->with("mssg","Update Done");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // dd("Destroyasadksd");
        $postshow=Pizza::findOrFail($id);
    //    $postshow->delete();//1
    //Pizza::destroy($id);//2 //بتعطي احتمال انو الحقل الدليت ات ياحد قيمه لما بتتنفذ هي التعليمه هوي رح ينجذف من الراوزر بس مارح ينحذف من الداتا كل البصير انو هالحقل بياخد قيمه تاريخ الحذف ومابعود فيني احذفو الا لما رجع قيمتو نل والحذف بصير بالدليت فورس
    $postshow->forceDelete();//   هي مارح اقدر امسح الاسطر يلي ممسوحه قبل (يعني يلي قيمهالعمود الدليت_ات  مانها نل) الحل هوي بالراوت منعمل ري ستور بهالحاله بتصير قيمه الدليت ات نل بترجع نل من خلال الريستور
       return redirect('/UDM')->with("mssg","Delete Done");//الدليت فورس بتنجح بالحذ بما بكون قيمه الدليت ات نل اذا ماكانت نل رح يعطي404 والحل بهالحاله الريستور
    }




}
