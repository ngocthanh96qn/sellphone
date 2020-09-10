@extends('admin.master.master')
		@section ('content')
		<div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">SỬA SẢN PHẨM</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
            </div>
            </div>
            <div class="card-body" style="display: block;  " >
        <form action="{{route('product.update', $product->id)}}" method="POST" role="form" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	
		<div class="row">
			<div class="col-6">
			<div class="form-group">
				<label for="">Tên sản phẩm</label>
				<input type="text" name="name" class="form-control" value="{{old('name') ? old('name') : $product->name}}">
			</div>
			<div class="form-group">
				<label for="">Hãng sản xuất</label>
		
				<select name="category_id" id="" required="required" class="form-control">
				<option value="{{$product->category->id}}">{{$product->category->name}}</option>
				<option value="">-- Lựa Chọn --</option>}
			
				@foreach ($categoryID as $value)
			
				<option value="{{$value->id}}">{{$value->name}}</option>
				@endforeach
			
		</select>
	</div>
			<div class="form-group">
				<label for="">Tiêu đề</label>
				<input type="text" name="title" value="{{old('titel') ? old('titel') :$product->title}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Mô tả</label>
				<textarea name="description"  class="form-control" rows="4" >{{old('description') ? old('description') :$product->description}}</textarea>
				
			</div>
			<div class="form-group">
				<label for="">Giá sản phẩm</label>
				<input type="text" name="price" value="{{old('price') ? old('price') :$product->price}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Số lượng</label>
				<input type="text" name="quantity" value="{{old('quantity') ? old('quantity') :$product->quantity}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Kích thước</label>
				<input type="text" name="size" value="{{old('size') ? old('size') :$product->size}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Cân nặng</label>
				<input type="text" name="weight" value="{{old('weight') ? old('weight') :$product->weight}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Màu sắc</label>
				<input type="text" name="color" value="{{old('color') ? old('color') :$product->color}}" class="form-control" id="" placeholder="Input field">
			</div>
			<label for="">Hình ảnh</label>
			<div class="form-group">
				<div class="custom-file">
				<input type="file" name="image" class="custom-file-input" value="{{$product->image}}" >
				<label class="custom-file-label" >Chọn file</label>
				</div>
			</div>
			
		
		</div>
		<div class="col-6">
			<div class="form-group">
				<label for="">Màn hình</label>
				<input type="text" name="display" value="{{old('display') ? old('display') :$product->display}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Hệ điều hành</label>
				<input type="text" name="os" value="{{old('os') ? old('os') :$product->os}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Bộ nhớ trong</label>
				<input type="text" name="storage" value="{{old('storage') ? old('storage') :$product->storage}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">RAM</label>
				<input type="text" name="ram" value="{{old('ram') ? old('ram') :$product->ram}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">CPU</label>
				<input type="text" name="cpu" value="{{old('cpu') ? old('cpu') :$product->cpu}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">GPU</label>
				<input type="text" name="gpu" value="{{old('gpu') ? old('gpu') :$product->gpu}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Camera trước</label>
				<input type="text" name="primary_camera" value="{{old('primary_camera') ? old('primary_camera') :$product->primary_camera}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Camera sau</label>
				<input type="text" name="rear_camera" value="{{old('rear_camera') ? old('rear_camera') :$product->rear_camera}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Dung lượng pin</label>
				<input type="text" name="battery" value="{{old('battery') ? old('battery') :$product->battery}}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">Bảo hành</label>
				<input type="text" name="warranty" value="{{old('warranty') ? old('warranty') :$product->warranty}}" class="form-control" id="" placeholder="Input field">
			</div>
			
			<button type="submit" style="float:right" class="btn btn-primary">Cập nhật</button>

		</div>

	</div>

</form>
              
            </div>
            <!-- /.card-body -->
          </div>
		
		
@endsection