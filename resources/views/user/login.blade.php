@extends('user.layout.master')
@section ('content')

<div class="limiter">
	<div class="container-login100" style="background-image: url('{{ asset('img/bg-01.jpg') }}');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

			<span class="login100-form-title p-b-49" style="font-family:'Montserrat';">
				ĐĂNG NHẬP
			</span>

			@if($errors->any())
			<h5 class="text-center" style="color:red">{{$errors->first('msg')}}</h5>
			@endif

			<form action="{{ route('user.login',$role) }}" method="POST" >
				@method('POST')
				@csrf

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Nhập email của bạn"  value="{{ old('email') }}">
					<span class="focus-input100 "  data-symbol="&#xf206;" ></span>
					@if($errors->has('email'))
					<p style="color:red">{{$errors->first('email')}}</p>
					@endif
				</div>

				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<span class="label-input100">Mật khẩu</span>
					<input class="input100" type="password" name="password" placeholder="Nhập mật khẩu">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
					@if($errors->has('password'))
					<p style="color:red">{{$errors->first('password')}}</p>
					@endif
				</div>

				<div class="text-right p-t-8 p-b-31">

					<a href="{{ route('user.formReset') }}">Quên mật khẩu</a>
					
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button type="submit"  class="login100-form-btn">
							Đăng Nhập
						</button>
					</div>
				</div>

				<div class="flex-col-c p-t-25">
					<span class="txt1 p-b-17">
						Nếu bạn chưa có tài khoản
					</span>

					<a href="{{ route('user.ViewSingUp',$role)}}" class="txt2">
						Đăng kí tại đây!!
					</a>
				</div>

			</form>

		</div>
	</div>
</div>

@endsection