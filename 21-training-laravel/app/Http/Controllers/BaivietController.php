<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Session;
use DB;
session_start();
class BaivietController extends Controller
{
    public function add_baiviet(){
        return view('admin.add_baiviet');
    }
    public function all_baiviet(){
      $data = DB::table('table_posts_baiviet') ->join('product','product.product_id', '=','table_posts_baiviet.idsanpham')->get();
      return view('admin.all_baiviet', compact('data'));
    }
    public function save_baiviet(Request $request,$id){
        if($request->has('hinhanh')){  
            $file = $request->hinhanh;      
            $new_image =$file->getClientOriginalName();
            $data = array();
            $data['idsanpham'] = $id;
            $data['tenbaiviet'] = $request->tenbaiviet;
            $data['noidung'] = $request->noidung;
            $data['hinhanh'] = $new_image;
            $file->move(public_path('upbaiviet'),$new_image);
            $data['hinhanh'] = $new_image;     
            DB::table('table_posts_baiviet')->insert($data);    
            return Redirect::to('/ad/all_baiviet');
        }   
    }
    public function update_baiviet(Request $request, $id){
        $data = array();
        $data['tenbaiviet'] = $request->tenbaiviet;
        $data['noidung'] = $request->noidung;
        DB::table('table_posts_baiviet')->where('id',$id)->update($data);
        return Redirect::to('/ad/all_baiviet');
    }
    public function edit_baiviet($id){
        $edit_baiviet = DB::table('table_posts_baiviet')->where('id',$id)->get();
        $manager_baiviet = view('admin.edit_baiviet')->with('edit_baiviet',$edit_baiviet);
        return view('admin.index')->with('admin.edit_baiviet',$manager_baiviet);
    }
    public function delete_baiviet($baiviet){
        DB::table('table_posts_baiviet')->where('id',$baiviet)->delete();
        return Redirect::to('/ad/all_baiviet');
    }
    //Chi tiet
    public function show($id)
    {
        $post = DB::table('table_posts_baiviet')
        ->join('product','product.product_id','=','table_posts_baiviet.idsanpham')
        ->join('product_categories','product_categories.category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')
        ->where('id', $id)->get();
        if (!$post) {
            abort(404); // Hoặc bạn có thể xử lý thông báo lỗi khác tùy thuộc vào yêu cầu của bạn.
        }
        return view('admin.viewposts',compact('post'));
    }
    //Tim kiem
    public function search(Request $request){
        $searchND = $request->query('search');
        $perPage = 5;   
        $page = $request->query('page', 1); // Trang hiện tại, mặc định là trang đầu tiên

        $posts = DB::table('table_posts_baiviet')
            ->join('product','product.product_id', '=','table_posts_baiviet.idsanpham')
            ->join('product_categories','product_categories.category_id','=','product.category_id')
            ->where('table_posts_baiviet.tenbaiviet', 'like', '%' . $request->search . '%')
            ->orWhere('table_posts_baiviet.noidung', 'like', '%' . $request->search . '%')
            ->orWhere('product.product_name', 'like', '%' . $request->search . '%')
            ->paginate($perPage);

        return view('admin.search', compact('posts', 'searchND'));
    }
    public function lietkePost_SP($id){
        $data = DB::table('table_posts_baiviet') 
        ->join('product','product.product_id', '=','table_posts_baiviet.idsanpham')
        ->join('product_categories','product_categories.category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')
        ->where('product.product_id', '=', $id)->get();
        return view('admin.all_baiviet', compact('data'));
        // foreach($data as $value){
        //     echo $value->id;
        // }   
    }
    public function Post_SP($id){
        $data = DB::table('table_posts_baiviet') 
        ->join('product','product.product_id', '=','table_posts_baiviet.idsanpham')
        ->join('product_categories','product_categories.category_id','=','product.category_id')
        ->join('brand','brand.brand_id','=','product.brand_id')
        ->where('product.product_id', '=', $id)->get();
        return view('Frontend.shop.index_posts', compact('data1'));
    }
}