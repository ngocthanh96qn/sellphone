@extends('user.layout.master')
@section ('content')

<div class="limiter">
	<div class="container-login100" style="background-image: url('{{ asset('img/bg-01.jpg') }}');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

			<span class="login100-form-title p-b-49" style="font-family:'Montserrat';font-size: 20px">
				NHẬP MẬT KHẨU MỚI!
			</span>
			@if (session('flash_message'))
			<div class="alert alert-success">{{session('flash_message')}}</div>
			@else 
			<form action="{{ route('user.updatePassword') }}" method="POST" >
				@method('POST')
				@csrf

				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<span class="label-input100">Mật khẩu mới</span>
					<input class="input100" type="password" name="password" placeholder="Nhập mật khẩu">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
					@if($errors->has('password'))
					<p style="color:red">{{$errors->first('password')}}</p>
					@endif
				</div>
				<input type="hidden" name="token" value="{{$token}}">
				<div class="text-right p-t-8 p-b-31">
					
					
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button type="submit"  class="login100-form-btn">
							Gửi Yêu Cầu
						</button>
					</div>
				</div>
				<div class="text-right p-t-8 p-b-25">					
				</div>
			</form>
			@endif

		</div>
	</div>
</div>
@endsection