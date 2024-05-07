@extends('admin.index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                <b>Cập Nhật Danh Mục Bài Viết</b>
                </header>
                <div class="panel-body">        
                    @foreach($edit_danhmuc_baiviet as $key =>$edit_baiviet)     
                    <div class="position-center">
                        <form action="{{URL::to('/ad/updateDMBV/'.$edit_baiviet->danhmuc_id)}}" method="post">
                            {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Danh Mục Bài Viết</label>
                            <input taype="text" value="{{$edit_baiviet->danhmuc_name}}" name="danhmuc_baiviet_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục Bài Viết">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Danh Mục Bài Viết</label>
                            <textarea style="resize: none" rows="3" class="form-control" name="danhmuc_baiviet_desc" id="exampleInputPassword1" >{{$edit_baiviet->danhmuc_decs}}</textarea>
                        </div>                     
                            <?php
                            $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>
                       
                        <button type="submit" name ="update_danhmuc_baiviet"class="btn btn-info">Update Danh Mục Bài Viết</button>
                    </form>
                    </div>
                @endforeach
                </div>
            </section>
    </div>
 @endsection