@extends('admin.index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                <b>Thêm Danh Mục Bài Viết</b>
                </header>
                <div class="panel-body">               
                    <div class="position-center">
                        <form action="{{URL::to('/ad/saveDMBV')}}" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục Bài Viết</label>
                            <input type="text" name="danhmuc_baiviet_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Danh Mục Bài Viết</label>
                            <textarea style="resize: none" rows="3" class="form-control" name="danhmuc_baiviet_mota" id="exampleInputPassword1" placeholder="Mô Tả Danh Mục Bài Viết"></textarea>
                        </div>                     
                        <div class="form-group">
                            <label for="exampleInputPassword1"><b>Hiển Thị</b></label>
                            <select name="danhmuc_baiviet_status" class="form-control input-lg m-bot15">
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
                        <button type="submit" name ="add_danhmuc_baiviet"class="btn btn-info">Thêm Danh Mục Bài Viết</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
 @endsection