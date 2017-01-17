<?php

namespace App\Http\Controllers;

use App\Category;
use DB;
use App\Product;
use Illuminate\Http\Request;


class MainController extends Controller
{

   
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



    public function search(Request $request)
    {
        if ($q = $request->input('q')) {
            $products = Product::where('content', 'like', "%$q%")
                ->orWhere('title', 'like', "%$q%")
                ->paginate(5)
                ->appends(['q' => $q])
            ;
            if ($products->count()) {
                return view('products', ['products' => $products]);
            }
        }
        return view('error', ['q' => $q]);
    }
}
