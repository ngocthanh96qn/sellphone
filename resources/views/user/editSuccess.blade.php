@extends('user.layout.master')
@section ('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 text-center" style=" margin-top: 50px; margin-bottom: 50px; box-shadow: 0 0 20px rgba(0,0,0,.15);">
			<h4 style="margin-top: 30px; color:#00af1d "><i class="fa fa-check-circle-o" aria-hidden="true"></i> CẬP NHẬT THÔNG TIN THÀNH CÔNG</h4>
			<h5>Quay lại <a class="btn btn-default" href="{{ route('user.Account') }}"> Trang quản lí tài khoản</a>  hoặc <a class="btn btn-default" href="{{ route('user.home') }}">Trang chủ</a></h5>
		</div> 
		
	</div>
</div>
@endsection