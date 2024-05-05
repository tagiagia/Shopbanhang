@extends('admin.index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                <b>Thêm Thương Hiệu Sản Phẩm</b>
                </header>
                <div class="panel-body">               
                    <div class="position-center">
                        <form action="{{URL::to('/ad/saveTH')}}" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                            <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Thương Hiệu</label>
                            <textarea style="resize: none" rows="3" class="form-control" name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô Tả Danh Mục"></textarea>
                        </div>                     
                        <div class="form-group">
                            <label for="exampleInputPassword1"><b>Hiển Thị</b></label>
                            <select name="brand_product_status" class="form-control input-lg m-bot15">
                                <option value="1">Ẩn</option>
                                <option value="0">Hiển Thị</option>
                                                                
                            </select>
                            <?php
                            $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                        </div>
                        <button type="submit" name ="add_brand_product"class="btn btn-info">Thêm Thương Hiệu</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
 @endsection