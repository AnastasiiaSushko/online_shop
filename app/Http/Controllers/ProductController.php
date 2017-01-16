<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {

        if ($product = Product::find($id)) {
            return view('product', ['product' => $product]);
        }

        return abort(404);

    }

}
