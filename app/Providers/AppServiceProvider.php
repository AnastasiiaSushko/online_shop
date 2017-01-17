<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Setting;
use App\Product;
use DB;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::share('menu', Category::all());

        View::share('top', DB::table('products')->join('comments', 'products.id', '=', 'comments.product_id')
            ->select('products.*')
            ->orderBy('comments.likes','desc')
            ->limit(5)
            ->distinct()
             ->get());

        View::share('background_color', Setting::where('name', '=', 'background_color')->first());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
