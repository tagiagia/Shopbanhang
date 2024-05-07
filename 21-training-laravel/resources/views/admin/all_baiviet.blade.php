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
                    @foreach ($data as $key =>$value)
                    <option value="0">{{$value->product_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <form action="" method="get">
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
                        <th>Tên Sản Phẩm</th>
                        <th>Tên Bài Viết</th>
                        <th>Nội Dung</th>
                        <th>Hình Ảnh</th>

                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key =>$pro)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td>{{$pro->product_name}}</td>
                        <td>{{$pro->tenbaiviet}}</td>
                        <td>{{$pro->noidung}}</td>
                        <td><img src="/upbaiviet/{{$pro->hinhanh}}" alt="" width="100"></td>
                        <td>
                            <a href="{{URL::to('/ad/edit_baiviet/'.$pro->id)}}" class="active" ui-toggle-class="">
                                <button>Edit Posts</button>
                            </a>
                            <a onclick="return confirm('Bạn Có Chắc Muốn Xóa Bài Viết Này Hay Không?')"
                                href="{{URL::to('/ad/delete_baiviet/'.$pro->id)}}" class="active" ui-toggle-class="">
                                <button>Delete Posts</button>
                            </a>
                            <a href="{{URL::to('/ad/viewposts/'.$pro->id)}}" class="active" ui-toggle-class="">
                                <button>View Posts</button>

                            </a>
                        </td>
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