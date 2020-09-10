@extends('admin.master.master')
    @section ('content')
    <!-- create -->
          <div class="card card-secondary" style="width: 400px;">
            <div class="card-header">
              <h3 class="card-title">SỬA</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
              <form  action="{{route('role.update',$role->id)}}" method="POST" role="form">
        @method('PUT')
				@csrf
				<div class="form-group">
					<label for="">Tên phân quyền:</label>
					<input type="text" name="name" value="{{old('name') ? old('name') : $role->name}}" class="form-control" id="" placeholder="Input field">
					@if( $errors->has('name'))
            			<p style ="color: red;">{{$errors->first('name')}}</p>
        			@endif
					
				</div>
				<button type="submit" class="btn btn-primary">Cập nhật</button>
			</form>
              
            </div>
            <!-- /.card-body -->
          </div>
  @endsection