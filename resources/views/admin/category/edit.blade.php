@extends('admin.master.master')
		@section ('content')
		<div class="card card-info category" >
    <div class="card-header">
      <h3 class="card-title">SỬA</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
  </div>
             
     <div class="card-body category-2" >
        
		<form  action="{{route('category.update', $category->id)}}" method="POST" role="form">
			@method('PUT')
			@csrf
			<div class="form-group">
				<label for="">Tên hãng sản xuất</label>
				<input type="text" name="name" class="form-control" value="{{old('name') ? old('name') : $category->name}}">
				@if( $errors->has('name'))
            			<p style ="color: red;">{{$errors->first('name')}}</p>
        		@endif
			</div>
			

			<button type="submit" class="btn btn-primary">Cập nhật</button>
		</form>
  </div>
		

	@endsection