<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Product;
use App\Cart;

use Cart2;

use Session;
class CartController extends GeneralController
{
   
    // thêm sản phẩm vào giỏ hàng
    public function  addtoCart(Request $request,$id)
    {
        // $product = Product::find($id);
       
        
        // //thêm thông tin giỏ hàng

        //  $cartInfo = [
        //     'id'=>$product->id,
        //     'name'=>$product->name,
        //     'qty'=> 1,
        //     'price'=>$product->sale,
        //     'options'=>[
        //         'image'=>$product->image,
        //     ]
        
        // ];
        
        // // // gọi đến thư viện thêm giỏ hàng
        // $data =Cart::add($cartInfo);
        

        

        // dd($data);

        // session(['totalItem' => Cart::count()]);

        // // chuyển về trang danh sách sản phảm trong giỏ hàng
        // return redirect()->route('cart.index');

        $product = Product::find($id);

        $oldCart = Session('cart')?Session::get('cart') : null;
       
        $cart = new Cart($oldCart);

        $cart->add($product,$id);
       
        
        $request->session()->put('cart',$cart);
        
        return redirect()->back();

    }
    public function DeleteCart($id)
    {
        $oldCart = Session('cart')?Session::get('cart') : null;
        $cart = new Cart($oldCart);
        
        $cart->reduceByOne($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }
    public function updateCart( Request $request) {
            $id = $request->input('id');
            dd($id);
            $qty = (int)$request->input('qty');

        
    }
     public function destroy(request $request) {

      
       
         $request->session()->flush();

        return redirect()->back();
     }
}
