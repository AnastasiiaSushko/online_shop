<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product');
        
        
    }
    
    public function all_products(){

       $main_products =  $this->products()->where('sale','=','0')->inRandomOrder()->limit(3)->get()->toArray();
        //$main_products =  $this->products()->where('sale',0)->random(3)->get()->toArray();
        $sale_products = $this->products()->where('sale',1)->limit(2)->get()->toArray();

        $all_products =  array_merge($main_products,$sale_products);
        return $all_products;


       // return $this->products()->where('sale','=',1)->limit(3)->get()->toArray();
    }

    
  



}
