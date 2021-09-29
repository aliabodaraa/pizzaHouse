<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class addUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('User.index');
    }

    public function create()
    {
        return view('User.CreateUser');
    }

    public function store(Request $request)
    {

        User::create(
            ['name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
            ]);
             return redirect('/User')->with("mssg","thanks for Added A New User");
          }


}
