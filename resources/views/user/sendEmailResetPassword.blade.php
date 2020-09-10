@extends('user.layout.master')
@section ('content')

<div class="limiter">
	<div class="container-login100" style="background-image: url('{{ asset('img/bg-01.jpg') }}');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

			<span class="login100-form-title p-b-49" style="font-family:'Montserrat';font-size: 20px">
				THAY ĐỔI MẬT KHẨU!
			</span>

			@if($errors->any())
			<h5 class="text-center" style="color:red">{{$errors->first('exist')}}</h5>
			@endif
			
			@if (session('flash_message'))
			<div class="alert alert-success">{{session('flash_message')}}</div>
			<div class="container-login100-form-btn">
				<div class="wrap-login100-form-btn">
					<div class="login100-form-bgbtn"></div>
					<a href="https://mail.google.com/"><button type="submit"  class="login100-form-btn" style="background-color: #B40404">
						Go to Email
					</button></a>
				</div>
			</div>
			<div class="text-right p-t-8 p-b-25">					
			</div>
			@else
			<form action="{{ route('user.sendMail') }}" method="POST" >
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
			<a href="{{ route('user.Account') }}">
				<div class="container-login100-form-btn ">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button type="submit"  class="login100-form-btn" style="background-color: #0A2229">
							Quay Lại
						</button>
					</div>
				</div>
			</a>
			@endif

			
			





		</div>
	</div>
</div>
@endsection