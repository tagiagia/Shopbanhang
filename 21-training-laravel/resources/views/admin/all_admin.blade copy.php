@extends('admin.index')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading"> 
       Liệt Kê Danh Sách Admin
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
        <form action="{{URL::to('/ad/timkiemAdmin')}}" method="post">
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
              <th>ID</th>
              <th>TênAdmin</th>
              <th>Email</th>

              <th>Phone</th>


              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_admin as $key =>$pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$pro->admin_id}}</td>
              <td>{{$pro->admin_name}}</td>
              <td>{{$pro->admin_email}}</td>
              <td>{{$pro->admin_phone}}</td>
             
              <td><span class="text-ellipsis">
                
              </span></td>
              <td>
                <a onclick="return confirm('Bạn Có Chắc Muốn Xóa Người Quản Lý Này Hay Không?')" href="{{URL::to('/ad/delete_admin/'.$pro->admin_id)}}" class="active" ui-toggle-class=""> <i class="fa fa-times text-danger text"></i></a>
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