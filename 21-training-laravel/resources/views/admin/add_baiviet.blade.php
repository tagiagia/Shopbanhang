@extends('admin.index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <b>Thêm Bài Viết</b>
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form action="/ad/save_baiviet/{{$id}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Bài Viết</label>
                            <input type="text" name="tenbaiviet" class="form-control" id="exampleInputEmail1"
                                placeholder="Tên bài viết">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội Dung Bài Viết</label>
                            <textarea style="resize: none" rows="15" class="form-control" name="noidung"
                                id="exampleInputPassword1" placeholder="Nội dung bài viết"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh</label>
                            <input type="file" name="hinhanh" class="form-control" id="exampleInputEmail1">
                        </div>
                        <button type="submit" name="add_baiviet" class="btn btn-info">Thêm Bài Viết</button>
                    </form>
                </div>

            </div>
        </section>
    </div>
    @endsection