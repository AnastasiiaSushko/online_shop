<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Comment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('moderator');
    }

    public function index(){
        return view('admin.main');
    }


    public function settings(){
        $settings_map = [];
        foreach (Setting::all() as $setting) {
            $settings_map[$setting->name] = $setting->value;
        }
        return view('admin.settings',['settings'=>$settings_map]);
    }

    public function save_background_color(Request $request){
        if(!empty($request->input('background_color'))){
            $background_color = Setting::where('name', '=', 'background_color')->first();
            if ($background_color) {
                $background_color->value = $request->input('background_color');
            } else {
                $background_color = new Setting;
                $background_color->name = 'background_color';
                $background_color->value = $request->input('background_color');
            }
            $background_color->save();
        }
        return redirect('/admin/settings');
    }

    public function comments(){
        return view('admin.comments',['comments'=>Comment::all()]);
    }

    public function save_comment($id, Request $request){
        if(!empty($request->input('comment'))){
            $comment = Comment::find($id);
            $comment->comment =  $request->input('comment');
            $comment->not_recommend = $request->input('not_recommend') ? 1 : 0;
            $comment->confirm = $request->input('confirm') ? 1 : 0;
            $comment->save();
        }
        return redirect('/admin/comments');
    }
}
