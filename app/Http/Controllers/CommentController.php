<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $comment->comment = $request->input('comment');

            if($request->input('recommend')=='recommend'){
                $comment->recommend = 1;
            }
            if($request->input('recommend')=='not_recommend'){
                $comment->not_recommend = 1;
            }


            $comment->save();
            return redirect('/product/' . $id);
        }

        return redirect('/product/' . $id);
        
    }


    public function likes($id, $plusMinus)
    {
        $comment = Comment::find($id);
        $comment->likes += ($plusMinus == 'minus' ? -1 : 1);
        $comment->save();
        return 'ok';
    }
    
}
