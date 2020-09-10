
@extends('user.layout.master')
@section ('content')
<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Thông tin đơn hàng</h3>
					</div>
					{{-- <div class="">
						<p class=""><strong>Tên:  &nbsp; </strong>{{$user->fullname}}<span> | </span><span><strong>SĐT:  &nbsp; </strong>  {{$user->phone}}</span></p>
						<p class=""> <strong>Địa chỉ:  &nbsp; </strong>{{$user->address}}</p>
					</div> --}}
				
				</div>
				<!-- /Billing Details -->

				<!-- Shiping Details -->
				<div class="shiping-details">
					<form action="{{ route('user.cartStore') }}" role="form" method="POST">
						@csrf
					<div >
						{{-- <input type="checkbox" id="shiping-address" name="change"  > --}}
						{{-- <label for="shiping-address">
							<span></span>
							Thay đổi địa chỉ nhận hàng?
						</label> --}}
						
						<div class="caption">
							<div class="form-group">
								<label > Tên người nhận hàng <span style="color:red">(*)</span> 
								@if ($errors->has('name'))
									<span style="color:red"> {{ $errors->first('name') }}</span>
								@endif
								</label>
								<input class="input" type="text" name="name"  value="{{old('name')==null ? $user->fullname : old('name') }}" >
								
							</div>
							<div class="form-group">
								<label > Điện thoại <span style="color:red">(*)</span>
									@if ($errors->has('phone'))
									<span style="color:red">{{ $errors->first('phone') }}</span>
								@endif
								</label>
								<input class="input" type="tel" name="phone" value="{{old('phone')==null ? $user->phone : old('phone') }}">
								
							</div>
							
							<div class="form-group">
								<label > Địa chỉ <span style="color:red">(*)</span>
									@if ($errors->has('address'))
									<span style="color:red">{{ $errors->first('address') }}</span>
								@endif
								</label>
								<input class="input" type="text" name="address" value="{{old('address')==null ? $user->address : old('address') }}">
								
							</div>	
						</div>
					</div>
				</div>
				<!-- /Shiping Details -->

				<!-- Order notes -->
				<div class="order-notes">
					<textarea class="input" placeholder="Chú thích thêm" name="note"></textarea>
				</div>
				<!-- /Order notes -->
			</div>

			<!-- Order Details -->
			<div class="col-md-5 order-details">
				<div class="section-title text-center">
					<h3 class="title">Đơn hàng của bạn</h3>
				</div>
				<div class="order-summary">
					<div class="order-col">
						<div><strong>Sản phẩm</strong></div>
						<div><strong>Tổng</strong></div>
					</div>
					<div class="order-products">
						@foreach ($cart->items as $value)
							<div class="order-col">
							<div>{{$value['qty']}} x {{$value['item']->name}}</div>
							<div>{{number_format($value['price'])}}</div>
						</div>
						@endforeach
						
						
					</div>
					<div class="order-col">
						<div>Phí Ship</div>
						<div><strong>Miễn Phí</strong></div>
					</div>
					<div class="order-col">
						<div><strong>Tổng đơn hàng</strong></div>
						<div><strong class="order-total">{{number_format($cart->totalPrice)}}</strong></div>
					</div>
				</div>
				<div class="payment-method">
					
					<p>Quý khách kiểm tra kĩ đơn hàng trước khi thanh toán!!</p>
				</div>
				
				<button style="margin-left: 35%; background-color:#D10024; color:white" class=" btn primary-btn order-submit">Đặt Hàng</button>
				</form>

			</div>
			<!-- /Order Details -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->
@endsection
