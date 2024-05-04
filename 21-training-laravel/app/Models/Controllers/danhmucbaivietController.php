<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
session_start();

class danhmucbaivietController extends Controller
{
    public function add_danhmuc_baiviet(){
        return view('admin.add_danhmuc_baiviet');
    }
    public function all_danhmuc_baiviet(){
       $all_danhmuc_baiviet = DB::table('danhmucbaiviet')->get();
       $manager_danhmuc_baiviet = view('admin.all_danhmuc_baiviet')->with('all_danhmuc_baiviet',$all_danhmuc_baiviet);
        return view('admin.index')->with('admin.all_danhmuc_baiviet',$manager_danhmuc_baiviet);
    }
    public function save_danhmuc_baiviet(Request $request){
        $data = array();
        $data['danhmuc_name'] = $request->danhmuc_baiviet_name;
        $data['danhmuc_decs'] = $request->danhmuc_baiviet_mota;
        $data['danhmuc_status'] = $request->danhmuc_baiviet_status;       
        
         DB::table('danhmucbaiviet')->insert($data);
         Session::put('message','Thêm Danh mục thành công');
        return Redirect::to('/ad/all_danhmuc_baiviet');
       
    }
    public function unactive_danhmuc_baiviet($danhmuc_baiviet_id){
        DB::table('danhmucbaiviet')->where('danhmuc_id',$danhmuc_baiviet_id)->update(['danhmuc_status'=>1]); 
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('/ad/all_danhmuc_baiviet');
       }
       public function active_danhmuc_baiviet($danhmuc_baiviet_id){
        DB::table('danhmucbaiviet')->where('danhmuc_id',$danhmuc_baiviet_id)->update(['danhmuc_status'=>0]); 
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('/ad/all_danhmuc_baiviet');
       
    }
public function edit_danhmuc_baiviet($danhmuc_baiviet_id){
        $edit_danhmuc_baiviet = DB::table('danhmucbaiviet')->where('danhmuc_id',$danhmuc_baiviet_id)->get();
        $manager_danhmuc_baiviet = view('admin.edit_danhmuc_baiviet')->with('edit_danhmuc_baiviet',$edit_danhmuc_baiviet);
        return view('admin.index')->with('admin.edit_danhmuc_baiviet',$manager_danhmuc_baiviet);
    }
public function update_danhmuc_baiviet(Request $request,$danhmuc_baiviet_id){
        $data = array();
        $data['danhmuc_name'] = $request->danhmuc_baiviet_name;
        $data['danhmuc_decs'] = $request->danhmuc_baiviet_desc;
        DB::table('danhmucbaiviet')->where('danhmuc_id',$danhmuc_baiviet_id)->update($data);
        Session::put('message','Update Thành Công');
        return Redirect::to('/ad/all_danhmuc_baiviet');
    }
public function delete_danhmuc_baiviet($danhmuc_baiviet_id){
        DB::table('danhmucbaiviet')->where('danhmuc_id',$danhmuc_baiviet_id)->delete();
        Session::put('message','Xóa Danh Mục Thành Công');
        return Redirect::to('/ad/all_danhmuc_baiviet');
    }
    public function search_baiviet(Request $request){
        $keywords = $request->keywords_submit; 

        $search_baiviet = DB::table('danhmucbaiviet')->where('danhmuc_name','like','%'.$keywords.'%')->get();
        return view('admin.all_search_dmbaiviet')->with('search_baiviet',$search_baiviet);
    }
}
