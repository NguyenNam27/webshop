<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Category;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.layout.header',function($view){
            $danhmuc = Category::all();
            
            $view->with('danhmuc',$danhmuc);

        });
        view()->composer('frontend.cart.index',function($view){

            
            if(Session('cart')){
                $oldCart = Session::get('cart');
                
                $cart = new Cart($oldCart);
                $view->with(['cart'=>Session::get('cart'),
                'product_cart'=>$cart->items,
                'totalPrice'=>$cart->totalPrice,
                'totalQty'=>$cart->totalQty]);
            }   
        });
    
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
