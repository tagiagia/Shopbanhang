<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function all_user(){
        $all_user = DB::table('users')->get();
        $manager_user = view('admin.all_user')->with('all_user',$all_user);
        return view('admin.index')->with('admin.all_user',$manager_user);
    }
    public function delete_user($id){
        DB::table('users')->where('id',$id)->delete();
        Session::put('message','Xóa Người Dùng Thành Công');
        return Redirect::to('/ad/all_user');
    } 
    public function searchUser(Request $request){
        $keywords = $request->keywords_submit; 
        $search_user = DB::table('users')->where('name','like','%'.$keywords.'%')->get();
        return view('admin.all_search_user')->with('search_user',$search_user);
    }
}
