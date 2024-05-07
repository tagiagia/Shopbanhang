@extends('admin.index')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt Kê Bài Viết
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0"></option>
                </select>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <?php
        $message = Session::get('message');
if($message){
    echo $message;
    Session::put('message',null);
}
?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên Thương Hiêu</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Tên Bài Viết</th>
                        <th>Nội Dung</th>
                        <th>Hình Ảnh</th>
                        <th>Ảnh Sản Phẩm</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $key =>$value)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$value->brand_name}}</td>
                        <td>{{$value->product_name}}</td>
                        <td>{{$value->tenbaiviet}}</td>
                        <td>{{$value->noidung}}</td>
                        <td><img src="/upbaiviet/{{$value->hinhanh}}" alt="" width="100"></td>
                        <td><img src="/up/{{$value->product_image}}" alt="" width="100"></td>
                        <!-- <td>
                            <a href="{{URL::to('/ad/edit_baiviet/'.$value->id)}}" class="active" ui-toggle-class=""><i
                                    class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a onclick="return confirm('Bạn Có Chắc Muốn Xóa Bài Viết Này Hay Không?')"
                                href="{{URL::to('/ad/delete_baiviet/'.$value->id)}}" class="active" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i></a>
                            <a href="{{URL::to('/ad/edit_baiviet/'.$value->id)}}" class="active" ui-toggle-class=""><i
                                    class="fa-solid fa-eye"></i></a>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection