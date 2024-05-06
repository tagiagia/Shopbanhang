@extends('admin.index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                <b>Cập Nhật Danh Mục Sản Phẩm</b>
                </header>
                <div class="panel-body">        
                    @foreach($edit_category_product as $key =>$edit_value)     
                    <div class="position-center">
                        <form action="{{URL::to('/ad/updateDM/'.$edit_value->category_id)}}" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục</label>
                            <input type="text" value="{{$edit_value->category_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Danh Mục</label>
                            <textarea style="resize: none" rows="3" class="form-control" name="category_product_desc" id="exampleInputPassword1" >{{$edit_value->category_decs}}</textarea>
                        </div>                     
                            <?php
                            $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                       
                        <button type="submit" name ="update_category_product"class="btn btn-info">Update Danh Mục</button>
                    </form>
                    </div>
                @endforeach
                </div>
            </section>
    </div>
 @endsection