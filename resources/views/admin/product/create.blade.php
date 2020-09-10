@extends('admin.master.master')
		@section ('content')



	<div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">THÊM MỚI SẢN PHẨM</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
            </div>
            </div>
            <div class="card-body" style="display: block; margin: 0px auto; " >
            <form  action="{{route('product.store')}}" method="POST" role="form" enctype="multipart/form-data">
			@csrf
           <div class="card-body_1" style="width: 400px; float:left;  margin-right: 100px">
           		<div class="form-group">
					<label for="">Tên sản phẩm</label>
					<input type="text" name="name" value="{{old('name')?old('name'):''}}" class="form-control" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Hãng sản xuất</label>
					<select name="category_id"  required="required" class="form-control">
						
						<option value="">-- Lựa Chọn --</option>
					@foreach ($categoryID as $value)
						<option value="{{$value->id}}">{{$value->name}}</option>
					@endforeach
						
					</select>
				</div>
				<div class="form-group">
					<label for="">Tiêu đề</label>
					<input type="text" name="title" value="{{old('titel')?old('titel'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Mô tả</label>
					<input type="text" name="description" value="{{old('description')?old('description'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Giá sản phẩm</label>
					<input type="text" name="price" value="{{old('price')?old('price'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Số lượng</label>
					<input type="text" name="quantity" value="{{old('quantity')?old('quantity'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Kích thước</label>
					<input type="text" name="size" value="{{old('size')?old('size'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Cân nặng</label>
					<input type="text" name="weight" value="{{old('weight')?old('weight'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Màu sắc</label>
					<input type="text" name="color" value="{{old('color')?old('color'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<label for="">Hình ảnh</label>
				<div class="form-group">
					<div class="custom-file">
					<input type="file" name="file[]"  multiple>
					
					</div>
				</div>
				
           </div>
           <div class="card-body_2" style="width: 400px;float:left;">
           		<div class="form-group">
					<label for="">Màn hình</label>
					<input type="text" name="display" value="{{old('display')?old('display'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">hệ điều hành</label>
					<input type="text" name="os" value="{{old('os')?old('os'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
           		
				<div class="form-group">
					<label for="">Bộ nhớ trong</label>
					<input type="text" name="storage" value="{{old('storage')?old('storage'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">RAM</label>
					<input type="text" name="ram" value="{{old('ram')?old('ram'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">CPU</label>
					<input type="text" name="cpu" value="{{old('cpu')?old('cpu'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">GPU</label>
					<input type="text" name="gpu" value="{{old('gpu')?old('gpu'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Camera trước</label>
					<input type="text" name="primary_camera" value="{{old('primary_camera')?old('primary_camera'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Camera sau</label>
					<input type="text" name="rear_camera" value="{{old('rear_camera')?old('rear_camera'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Dung lượng pin</label>
					<input type="text" name="battery" value="{{old('battery')?old('battery'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				<div class="form-group">
					<label for="">Bảo hành</label>
					<input type="text" name="warranty" value="{{old('warranty')?old('warranty'):''}}" class="form-control" id="" placeholder="Input field">
				</div>
				

				<button type="submit" class="btn btn-primary">Thêm mới</button>

           </div>
            
				
		</form>
			
			

		
              
            </div>
            <!-- /.card-body -->
          </div>
@endsection