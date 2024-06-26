@extends('admin.index')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading"> 
       Liệt Kê Danh Mục & Sản Phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
                 
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <!-- <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div> -->
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
              <th>Tên Danh Mục</th>
              <th>Hiển Thị</th>
              
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_category_product as $key =>$cate_pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$cate_pro->category_name}}</td>
              <td><span class="text-ellipsis">
                <?php
                if($cate_pro->category_status == 0){
                  ?>
                  <a href="{{URL::to('/ad/unactive-category-product/'.$cate_pro->category_id)}}"><span class ="fa-thumb-styling fa fa-thumbs-up" style="color: rgb(0, 255, 81)"></span></a>
                  <?php
                  }else{
                  ?>               
                  <a href="{{URL::to('/ad/active-category-product/'.$cate_pro->category_id)}}"><span class ="fa-thumb-styling fa fa-thumbs-down" style="color: red"></span></a>
                  <?php
                }
                ?>
                </span></td>
              
              <td>
                <a href="{{URL::to('/ad/edit_category_product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Bạn Có Chắc Muốn Xóa Danh Mục Không?')" href="{{URL::to('/ad/delete_category_product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>
                
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