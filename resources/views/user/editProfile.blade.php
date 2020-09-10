@extends('user.layout.master')
@section ('content')
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style=" box-shadow: 0 0 20px rgba(0,0,0,.15);">
			<div style="height: 80px; background-color: #0B2F3A; text-align: center; border-radius: 5px;">
				<h4 style="line-height:80px; color: white">Chỉnh sửa thông tin cá nhân</h4>
			</div>
			<div style="margin-top: 40px; margin-bottom: 40px;">
				<form role="form" action="{{ route('user.updateProfile') }}" method="POST">
					@csrf
					<div class="form-group">
						<label > Tên  
							@if ($errors->has('name'))
							<span style="color:red"> {{ $errors->first('name') }}</span>
							@endif
						</label>
						<input class="input" type="text" name="fullname"  value="{{old('fullname')==null ? Auth::user()->fullname : old('fullname') }}" >

					</div>
					<div class="form-group">
						<label > Email  
							@if ($errors->has('email'))
							<span style="color:red"> {{ $errors->first('email') }}</span>
							@endif
						</label>
						<input class="input" type="text" name="email"  value="{{old('email')==null ? Auth::user()->email : old('email') }}" >

					</div>
					<div class="form-group">
						<label > Điện thoại 
							@if ($errors->has('phone'))
							<span style="color:red">{{ $errors->first('phone') }}</span>
							@endif
						</label>
						<input class="input" type="tel" name="phone" value="{{old('phone')==null ? Auth::user()->phone : old('phone') }}">

					</div>

					<div class="form-group">
						<label > Địa chỉ
							@if ($errors->has('address'))
							<span style="color:red">{{ $errors->first('address') }}</span>
							@endif
						</label>
						<input class="input" type="text" name="address" value="{{old('address')==null ? Auth::user()->address : old('address') }}">

					</div>
					{{-- <div class="form-group">
						<label > Mật khẩu  
							@if ($errors->has('password'))
							<span style="color:red"> {{ $errors->first('password') }}</span>
							@endif
						</label>
						<input class="input" type="password" name="password"  >

					</div> --}}
					<button style="margin-left: 35%; background-color:#0A2229; color:white" class=" btn primary-btn order-submit">Cập Nhật</button>
					<a href="{{ route('user.Account') }}" style="margin-left: 39%; margin-top: 10px; background-color:#D10024; color:white" class=" btn primary-btn">Hủy</a>	
					
				</form>
			</div>
			
		</div>
	</div>
</div> 	
@endsection