@extends('admin.master.master')
	@section ('content')
	<!-- Edit -->
	
	<div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Sửa</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
            <form  action="{{route('userAuth.update', $user->id)}}" method="POST" role="form">
            	@method('PUT')
				@csrf

				<div class="block_1" style="width: 400px; float:left;  margin-right: 30px">
				<div class="form-group">
					<label for="">Họ và Tên:</label>
					<input type="text" name="fullname" value="{{$user->fullname}}" class="form-control" id="" placeholder="Input field">
					@if( $errors->has('fullname'))
            			<p style ="color: red;">{{$errors->first('fullname')}}</p>
        			@endif

					
				<div class="form-group">
					<label for="">Email:</label>
					<input type="text" name="email" value="{{$user->email}}" class="form-control" id="" placeholder="Input field">
					@if( $errors->has('email'))
            			<p style ="color: red;">{{$errors->first('email')}}</p>
        			@endif
					
				</div>
				<div class="form-group">
					<label for="">Password:</label>
					<input type="password" name="password"  class="form-control" id="" placeholder="Input field">
					@if( $errors->has('password'))
            			<p style ="color: red;">{{$errors->first('password')}}</p>
        			@endif
					
				</div>
				</div>
				<div class="block_2" style="width: 400px;float:left;">
					<div class="form-group">
					<label for="">Địa chỉ:</label>
					<input type="text" name="address" value="{{$user->address}}"class="form-control" id="" placeholder="Input field">
					@if( $errors->has('address'))
            			<p style ="color: red;">{{$errors->first('address')}}</p>
        			@endif
					
				</div>
				<div class="form-group">
					<label for="">Số điện thoại:</label>
					<input type="text" name="phone" value="{{$user->phone}}"  class="form-control" id="" placeholder="Input field">
					@if( $errors->has('phone'))
            			<p style ="color: red;">{{$errors->first('phone')}}</p>
        			@endif
					
				</div>
				 
				<div class="form-group" >
						<label >Phân quyền:</label>

						@foreach($roles as $rel)
					<div class="form-check" >
    					<input type="checkbox" name="roles[]" value="{{$rel->id}}"  class="form-check-input" {{ $getRole_id->contains($rel->id) ? 'checked' : ''}}>
    					<label class="form-check-label">{{$rel->name}}</label>
  					</div>
						@endforeach
				</div>
				<button type="submit" class="btn btn-primary">Cập nhật</button>
				</div>
				
				
			</form>
              
            </div>
            <!-- /.card-body -->
          </div>
@endsection     