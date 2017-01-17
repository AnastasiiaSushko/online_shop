<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        if ($product = Product::find($id)) {

            $comments = Product::find($id)->comments()->whereNull('not_recommend')->orwhere('recommend',1)->orwhere('confirm',1)->orderBy('likes', 'desc')->get();

            return view('product', ['product' => $product, 'comments' => $comments]);
        }

        return abort(404);

    }

       /*CART*/
    
    public function cart()
    {

        return view('cart', ['count' => 1]);
    }


    public function add_to_cart($id)
    {

        $product = Product::find($id);
        Cart::add(['id' => $product->id, 'name' => $product->title, 'price' => $product->price, 'new_price'=>$product->new_price,'sale'=>$product->sale, 'qty' => 1]);
        return redirect("/product/$id");
    }


    public function clear_cart()
    {
        Cart::destroy();

        return redirect("/cart");
    }

    public function delete_from_cart($id)
    {
        Cart::remove($id);

        return redirect("/cart");
    }

    
}
