<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
session_start();
class CategoryProduct extends Controller
{
    public function add_category_product(){
        return view('admin.add_category_product');
    }
    public function all_category_product(){
       $all_category_product = DB::table('product_categories')->get();
       $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin.index')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product(Request $request){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_decs'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;       
        
         DB::table('product_categories')->insert($data);
         Session::put('message','Thêm Danh mục thành công');
        return Redirect::to('/ad/all_category_product');
       
    }
    public function unactive_category_product($category_product_id){
     DB::table('product_categories')->where('category_id',$category_product_id)->update(['category_status'=>1]); 
     Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
     return Redirect::to('/ad/all_category_product');
    }
    public function active_category_product($category_product_id){
        DB::table('product_categories')->where('category_id',$category_product_id)->update(['category_status'=>0]); 
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('/ad/all_category_product');
       
    }
    public function edit_category_product($category_product_id){
        $edit_category_product = DB::table('product_categories')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin.index')->with('admin.edit_category_product',$manager_category_product);
    }       
    public function update_category_product(Request $request,$category_product_id){
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_decs'] = $request->category_product_desc;
        DB::table('product_categories')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Update Thành Công');
        return Redirect::to('/ad/all_category_product');
    }
    public function delete_category_product($category_product_id){
        DB::table('product_categories')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa Danh Mục Thành Công');
        return Redirect::to('/ad/all_category_product');
    } 
}
