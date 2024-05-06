<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DatHang;

class DonHangController extends Controller
{
    public function datHang(Request $request,$product_id){
        session_start();
        $data  = DB::table('hoadondathang')->insert(
            ['id_user'=>$_SESSION['user_id'],
            'id_sp'=>$product_id,
            'diachi'=>$request->diachi,
            'sdt' =>$request->phone]);

            // xuat danh sach hoa don

    }
}
