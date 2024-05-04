<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class ProductController extends Controller
{
    public function add_product(){
        $cate_product = DB::table('product_categories')->orderby('category_id','desc')->get();
        $brand_product = DB::table('brand')->orderby('brand_id','desc')->get();
        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        
    }
    public function all_product(){
       //$product = DB::table('product')->paginate(5);
       $all_product = DB::table('product')
        ->join('product_categories','product_categories.category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')->orderby('product.product_id','desc')->paginate(3);
       $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view('admin.index')->with('admin.all_product',$manager_product);
    }
    public function save_product(Request $request){
        // $data = array();
        // $data['product_name'] = $request->product_name;
        // $data['product_price'] = $request->product_price;  
        // $data['product_decs'] = $request->product_desc;
        // $data['product_content'] = $request->product_content;  
        // $data['category_id'] = $request->product_cate;      
        // $data['brand_id'] = $request->product_brand;  
        // $data['product_status'] = $request->product_status;   
        // $data['product_image'] = $request->product_image;  
        //$get_image =$request->file('product_image');
        if($request->has('product_image')){  
            $file = $request->product_image;      
            $new_image =$file->getClientOriginalName();
            $data = array();
            $data['product_name'] = $request->product_name;
            $data['product_price'] = $request->product_price;  
            $data['product_decs'] = $request->product_desc;
            $data['product_content'] = $request->product_content;  
            $data['category_id'] = $request->product_cate;      
            $data['brand_id'] = $request->product_brand;  
            $data['product_status'] = $request->product_status;   
            $data['product_image'] = $new_image;  
            $file->move(public_path('up'),$new_image);
            $data['product_image'] = $new_image;         
            DB::table('product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('/ad/all_product');
         }
        //  $data['product_image'] == '';        
        //   DB::table('product')->insert($data);
        //   Session::put('message','Thêm sản phẩm thành công');
        //  return Redirect::to('/ad/all_product');
        // $data = $request->all();       
        // $image_name = time().$request->file('product_image')->getClientOriginalName();
        // $path = $request->file('product_image')->storeAs('product_images', $image_name, 'public');
        // $data['product_image'] = 'storage/'.$path;
        
        // Product::create($data);
        // return redirect('/ad/add_product')->with('message', 'Thêm sản phẩm thành công!');
    }

    public function unactive_product($product_id){
     DB::table('product')->where('product_id',$product_id)->update(['product_status'=>1]); 
     Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
     return Redirect::to('/ad/all_product');
    }
    public function active_product($product_id){
        DB::table('product')->where('product_id',$product_id)->update(['product_status'=>0]); 
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('/ad/all_product');
       
    }
    public function edit_product($product_id){
        $cate_product = DB::table('product_categories')
        ->orderby('category_id','desc')->get();
        $brand_product = DB::table('brand')
        ->orderby('brand_id','desc')->get();
        $edit_product = DB::table('product')
        ->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')
        ->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product);
        return view('admin.index')->with('admin.edit_product',$manager_product);
    } 
    public function update_product(Request $request,$product_id){
        if($request->has('product_image')){  
            // print_r($request->product_image);
            $file = $request->product_image; 

            $new_image =$file->getClientOriginalName();
            $data = array();
            $data['product_name'] = $request->product_name;
            $data['product_price'] = $request->product_price;  
            $data['product_decs'] = $request->product_desc;
            $data['product_content'] = $request->product_content;  
            $data['category_id'] = $request->product_cate;      
            $data['brand_id'] = $request->product_brand;  
            $data['product_status'] = $request->product_status;   
            $data['product_image'] = $new_image;  
            $file->move(public_path('up'),$new_image);
            $data['product_image'] = $new_image;         
            DB::table('product')->where('product_id',$product_id)->update($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('/ad/all_product');
         }
        // $data = array();
        // $data['product_name'] = $request->product_name;
        // $data['product_price'] = $request->product_price;  
        // $data['product_decs'] = $request->product_desc;
        // $data['product_content'] = $request->product_content;  
        // $data['category_id'] = $request->product_cate;      
        // $data['brand_id'] = $request->product_brand;  
        // $data['product_status'] = $request->product_status;   
        // $get_image =$request->file('product_image');
        // if($get_image){        
        //     $new_image = rand(0,99).'.'.$get_image->getClientOriginalExtension();
        //     $get_image->move('public/up',$new_image);
        //     $data['product_image'] = $new_image;         
        //     DB::table('product')->where('product_id',$product_id)->update($data);
        //     Session::put('message','Update sản phẩm thành công');   
        //     return Redirect::to('/ad/all_product');
        // }       
        // DB::table('product')->where('product_id',$product_id)->update($data);
        // Session::put('message','Update sản phẩm thành công');
        //  return Redirect::to('/ad/all_product');
    }
    public function delete_product($product_id){
        DB::table('product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa Thành Công');
        return Redirect::to('/ad/all_product');
    } 
    public function search(Request $request){
        $keywords = $request->keywords_submit; 
        // $cate_product = DB::table('product_categories')->orderby('category_id','desc')->get();
        // $brand_product = DB::table('brand')->orderby('brand_id','desc')->get();

        $search_product = DB::table('product')
        ->join('product_categories','product_categories.category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')
        ->where('product.product_name','like','%'.$keywords.'%')
        ->orwhere('brand.brand_name','like','%'.$keywords.'%')
        ->orwhere('product_categories.category_name','like','%'.$keywords.'%')
        ->get();
        return view('admin.all_search_product')->with('search_product',$search_product);
    }

}
