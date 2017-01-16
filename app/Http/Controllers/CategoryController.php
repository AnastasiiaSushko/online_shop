<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index( $id)
    {


        if ($category = Category::find($id)) {
            $products = $category->products()->orderBy('id', 'desc')->paginate(5);
            
            $categories = Category::all();

            return view('category', ['products' => $products, 'category' => $category, 'categories'=>$categories]);
        }

        return abort(404);
    }  

}
