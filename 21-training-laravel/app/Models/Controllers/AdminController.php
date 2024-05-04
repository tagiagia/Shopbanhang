<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();


class AdminController extends Controller
{
     public function AuthLogin(){
         $admin_id = Session::get('admin_id');
         if($admin_id){
            return view('admin.dashboard');
         }
         else{
            return Redirect::to('/ad/login_admin')->send();
         }
     }
    public function index(){
        return view ('admin.login');
    }
    public function show(){
        $this->AuthLogin();
        return view ('admin.dashboard');
    }
    public function dashboard(Request $request){
        
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
      
       
        //$result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
         if($result){
            Session::put('admin_name',$result->admin_name); 
            Session::put('admin_id',$result->admin_id);
            //  return Redirect::to('/ad/dashboard');
            return view('admin.dashboard');
         }else{
             Session::put('message','Tài khoản hoặc mật khẩu không đúng.Xin nhập lại');
             return Redirect::to('/ad/login_admin');
         }
       
    }
    public function logout(Request $request){       
        $this->AuthLogin();
        Session::put('admin_name',null); 
        Session::put('admin_id',null);   
        return Redirect::to('/ad/login_admin');     
    }
    public function all_admin(){
        $all_admin = DB::table('admin')->get();
        $manager_admin = view('admin.all_admin')->with('all_admin',$all_admin);
        return view('admin.index')->with('admin.all_admin',$manager_admin);
    }
    public function delete_admin($id){
        DB::table('admin')->where('id',$id)->delete();
        Session::put('message','Xóa Người Quản Lý Thành Công');
        return Redirect::to('/ad/all_admin');
    } 
    public function searchAdmin(Request $request){
        $keywords = $request->keywords_submit; 
        $search_admin = DB::table('admin')->where('admin_name','like','%'.$keywords.'%')->get();
        return view('admin.all_search_admin')->with('search_admin',$search_admin);
    }
}
