<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        if (($user = Auth::user())) {
            $id = Auth::user()->id;
            $user = User::find($id);
            return view('user',['user'=>$user]);
        }

        return redirect('/main');

    }


    public function change($id, Request $request){

        if(!empty($request->input('name'))){
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->save();
            return redirect('/user/' . $id);
        }

        elseif (!empty($request->input('password'))){
            $user = User::find($id);
            $user->password = md5($request->input('password'));
            $user->save();
            return redirect('/user/' . $id);
        }


        return redirect('/user/' . $id);

    }

    

}
