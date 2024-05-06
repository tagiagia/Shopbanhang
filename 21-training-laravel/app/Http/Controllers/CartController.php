<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class CartController extends Controller
{
         public function shoppingCart(){

        $cart_product = DB::table('giohang')->join('product','product.product_id','=','giohang.product_id')->orderby('cart_id')->get();
        return view('Frontend.shop.cart')->with('cart_product',$cart_product);
        }
        public function save_cart(Request $request,$id)
        {
                $data = array();
                // $data['cart_id'] = $request->cart_id;
                $data['product_id'] =$id;
                // $data['product_name'] = $request->product_name;
                $data['product_price'] = $id;  
                $data['qty'] = $request->qty;  
                DB::table('giohang')->insert($data);
                return Redirect::to('/shopping-cart');
        }
        public function delete_giohang($cart_id){
                DB::table('giohang')->where('cart_id',$cart_id)->delete();    
                //shoppingCart();     
                return Redirect::to('/shopping-cart');
            } 
}
