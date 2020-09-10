@extends('admin.master.master')
	@section ('content')
	<h1 class="text-center" style="font-family: serif; color:red">Thông Số Kĩ Thuật Chi Tiết</h1>
	<div class="container" >
  <div class="row">
  	
          <div class="col-6">
            <div class="abc">
              <label for="">Mã SP:</label>
              <p>No</p>
            </div>
            <div class="abc">
              <label for="">Hãng:</label>
              <p>{{$product->category->name}}</p>
            </div>
            <div class="abc">
              <label for="">Tên sản phẩm:</label>
              <p>{{$product->name}}</p>
            </div>
            <div class="abc">
              <label for="">Số lượng:</label>
              <p>{{$product->quantity}}</p>
            </div>
            <div class="abc">
              <label for="">Giá bán:</label>
              <p>{{$product->price}}</p>
            </div>
            <div class="abc">
              <label for="">Kích cỡ:</label>
              <p>{{$product->size}}</p>
            </div>
            <div class="abc">
              <label for="">Cân nặng:</label>
              <p>{{$product->weight}}</p>
            </div>
            <div class="abc">
              <label for="">Màu:</label>
              <p>{{$product->color}}</p>
            </div>
            <div class="abc">
              <label for="">Màn hình:</label>
              <p>{{$product->display}}</p>
            </div>
          </div>
          <div class="col-6">
            
            <div class="abc">
              <label for="">Hệ điều hành:</label>
              <p>{{$product->os}}</p>
            </div>
            <div class="abc">
              <label for="">Bộ nhớ trong:</label>
              <p>{{$product->storage}}</p>
            </div>
            <div class="abc">
              <label for="">Ram:</label>
              <p>{{$product->ram}}</p>
            </div>
            <div class="abc">
              <label for="">CPU:</label>
              <p>{{$product->cpu}}</p>
            </div>
            <div class="abc">
              <label for="">GPU:</label>
              <p>{{$product->gpu}}</p>
            </div>
            <div class="abc">
              <label for="">Camera trước:</label>
              <p>{{$product->rear_camera}}</p>
            </div>
            <div class="abc">
              <label for="">Camera sau:</label>
              <p>{{$product->primary_camera}}</p>
            </div>
            <div class="abc">
              <label for="">Dung lượng Pin:</label>
              <p>{{$product->battery}}</p>
            </div>
            <div class="abc">
              <label for="">Bảo hành:</label>
              <p>{{$product->warranty}}</p>
             </div>

        </div>
		
	</div>
	@endsection