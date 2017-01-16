<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {



        if ($product = Product::find($id)) {

            $comments = Product::find($id)->comments()->get();

            return view('product', ['product' => $product, 'comments'=>$comments]);
        }

        return abort(404);

    }

}
