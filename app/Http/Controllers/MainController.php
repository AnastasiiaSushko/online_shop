<?php

namespace App\Http\Controllers;

use App\Category;
use DB;
use App\Product;
use Illuminate\Http\Request;


class MainController extends Controller
{

    public function index(){
        
        $categories = Category::all();

        //$products = Product::where('sale',1)->get();
        

        return view('main', ['categories' => $categories]);
    }
    
    public function main(){

        //Slider
        $sliders = DB::table("products")
            ->select("products.*")
            ->orderBy(DB::raw('RAND()'))
            ->take(3)
            ->get();


         //categories+products

        $categories = Category::all();


        return view('main1', ['sliders'=>$sliders, 'categories'=>$categories],compact('data'));
    }
}
