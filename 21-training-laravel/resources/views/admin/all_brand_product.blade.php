@extends('admin.index')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading"> 
       Liệt Kê Thương Hiệu & Sản Phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
        <form action="{{URL::to('/ad/timkiemBR')}}" method="post">
            {{csrf_field()}}
          <div class="input-group">
            <input type="text" name ="keywords_submit" class="input-sm form-control" placeholder="Search">
            <input type="submit" name ="search_items" class="btn btn-info btn-sm" value="Tìm Kiếm" style="margin-bottom: -24px;">
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
              <th>Tên Thương Hiệu</th>
              <th>Hiển Thị</th>
              
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_brand_product as $key =>$cate_pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$cate_pro->brand_name}}</td>
              <td><span class="text-ellipsis">
                <?php
                if($cate_pro->brand_status == 0){
                  ?>
                  <a href="{{URL::to('/ad/unactive-brand-product/'.$cate_pro->brand_id)}}"><span class ="fa-thumb-styling fa fa-thumbs-up" style="color: rgb(0, 255, 81)"></span></a>
                  <?php
                  }else{
                  ?>               
                  <a href="{{URL::to('/ad/active-brand-product/'.$cate_pro->brand_id)}}"><span class ="fa-thumb-styling fa fa-thumbs-down" style="color: red"></span></a>
                  <?php
                }
                ?>
                </span></td>
              
              <td>
                <a href="{{URL::to('/ad/edit_brand_product/'.$cate_pro->brand_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Bạn Có Chắc Muốn Xóa Thương Hiệu Này Hay Không?')" href="{{URL::to('/ad/delete_brand_product/'.$cate_pro->brand_id)}}" class="active" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>
               
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