@extends('admin.index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <b>Cập Nhật Bài Viết</b>
            </header>
            <div class="panel-body">
                @foreach($edit_baiviet as $key =>$edit_value)
                <div class="position-center">
                    <form action="{{URL::to('/ad/updateBH/'.$edit_value->id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Bài Viết</label>
                            <input type="text" value="{{$edit_value->tenbaiviet}}" name="tenbaiviet"
                                class="form-control" id="exampleInputEmail1" placeholder="Tên Bài Viết">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung</label>
                            <textarea style="resize: none" rows="3" class="form-control" name="noidung"
                                id="exampleInputPassword1">{{$edit_value->noidung}}</textarea>
                        </div>
                        <?php
                            $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }
                    ?>

                        <button type="submit" name="update_baiviet" class="btn btn-info">Update Bài Viết</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
    @endsection