<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ShopController extends Controller
{
      public function show($id)
    {
        $product = Product::findOrFail($id);
        $menProducts = Product::Where('featured',true)->Where('product_category_id',1)->get();
        $womenProducts = Product::where('featured',true)->where('product_category_id',2)->get();
        return view('Frontend.shop.show',compact('product'));
    }

}
