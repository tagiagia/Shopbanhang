@extends('admin.index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                <b>Update Sản Phẩm</b>
                </header>
                <div class="panel-body"> 
                    <?php
                    $message = Session::get('message');
            if($message){
                echo $message;
                Session::put('message',null);
            }
            ?>                        
                    <div class="position-center">
                        @foreach($edit_product as $key => $pro)
                        <form action="/ad/updateSP/{{$pro->product_id}}" method="post" enctype="multipart/form-data">
                           @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value ="{{$pro->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                            <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value ="{{$pro->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
                            <br><img src="/up/{{$pro->product_image}}" alt="" width="100">
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                            <textarea style="resize: none" rows="3" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Mô Tả Sản Phẩm">{{$pro->product_decs}}</textarea>
                        </div>  
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
                            <textarea style="resize: none" rows="3" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Nội Dung Sản Phẩm">{{$pro->product_content}}</textarea>
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1"><b>Danh Mục Sản Phẩm</b></label>
                            <select name="product_cate" class="form-control input-lg m-bot15">
                            @foreach($cate_product as $key=>$cate)
                            @if($cate->category_id == $pro->category_id)
                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>   
                                @else   
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>   
                                @endif   
                            @endforeach                               
                            </select>
                        </div>      
                        <div class="form-group">
                            <label for="exampleInputPassword1"><b>Thương Hiệu</b></label>
                            <select name="product_brand" class="form-control input-lg m-bot15">
                                @foreach($brand_product as $key=>$brand)
                                @if($cate->category_id == $pro->category_id)
                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @else
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                @endif
                                @endforeach                                 
                            </select>
                        </div>                
                        <div class="form-group">
                            <label for="exampleInputPassword1"><b>Hiển Thị</b></label>
                            <select name="product_status" class="form-control input-lg m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển Thị</option>
                                                                
                            </select>
                        </div>
                        <button type="submit" name ="update_product"class="btn btn-info">Update</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>
    </div>
 @endsection