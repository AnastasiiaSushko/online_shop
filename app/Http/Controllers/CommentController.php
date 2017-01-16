<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Comment;
use Illuminate\Support\Facades\Input;
use Auth;


class CommentController extends Controller
{
    public function add_comment($id, Request $request){

        if(!empty($request->input('comment'))){
            $comment = new Comment();
            $comment->user_id = Auth::user()->id;
            $comment->product_id =$id;

            $comment->comment = $request->input('comment');;

            $comment->save();
            return redirect('/product/' . $id);
        }

        return redirect('/product/' . $id);
        
    }
    
}
