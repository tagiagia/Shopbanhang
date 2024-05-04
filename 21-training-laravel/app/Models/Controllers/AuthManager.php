<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }
    function registration(){
        return view('registration');
    }
    function loginPost(Request $request){
        session_start();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentianls = $request->only('email','password');
        if (Auth::attempt($credentianls)) {        
            $category = DB::table('product_categories')->where('category_status',0)->orderBy('category_name','ASC')->get();
            $all_product = DB::table('product')->where('product_status','0')->orderby('category_id','desc')->limit(12)->get(); 
            // return redirect()->intended(route('Front.index'));
            $_SESSION['user_id'] = Auth::user()->id;
            return view('Frontend.index')->with('category',$category)->with('all_product',$all_product);
        }
        return redirect(route('login'))->with("Error","Login details are not valid");
    }
    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (!$user) {
            return redirect(route('registration'))->with("Error","Registration failed , try again.");
        }
        return redirect(route('login'))->with("Success","Registration success , Login to access");
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
    public function findAuth_id($id){
        $data = DB::table('users')->where('id', '=',$id)->get();
        return $data;
   }
}
