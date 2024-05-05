@extends('admin.index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                <b>Cập Nhật Thương HiệuSản Phẩm</b>
                </header>
                <div class="panel-body">        
                    @foreach($edit_brand_product as $key =>$edit_value)     
                    <div class="position-center">
                        <form action="{{URL::to('/ad/updateTH/'.$edit_value->brand_id)}}" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                            <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Thương Hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Thương Hiệu</label>
                            <textarea style="resize: none" rows="3" class="form-control" name="brand_product_desc" id="exampleInputPassword1" >{{$edit_value->brand_decs}}</textarea>
                        </div>                     
                            <?php
                            $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                       
                        <button type="submit" name ="update_brand_product"class="btn btn-info">Update Thương Hiệu</button>
                    </form>
                    </div>
                @endforeach
                </div>
            </section>
    </div>
 @endsection