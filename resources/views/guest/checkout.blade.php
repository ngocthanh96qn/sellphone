
@extends('user.layout.master')
@section ('content')
<!-- SECTION -->
<div class="section" style="background:#FAFAFA">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row" >
			<form action="{{ route('guest.Store') }}" method="POST">
				@csrf
			<div class="col-md-7">
				<!-- Billing Details -->
				<div class="billing-details">
					<div class="section-title">
						<h3 class="title">Địa chỉ của bạn</h3>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="name" placeholder="Tên của bạn" value="{{ old('name') }}">
						@if($errors->has('name'))
                  			 <p style="color:red">{{$errors->first('name')}}</p>
                   		@endif
					</div>

					<div class="form-group">
						<input class="input" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
						@if($errors->has('email'))
                  			 <p style="color:red">{{$errors->first('email')}}</p>
                   		@endif
					</div>
					<div class="form-group">
						<input class="input" type="text" name="address" placeholder="Địa chỉ nhận hàng" value="{{ old('address') }}">
						@if($errors->has('address'))
                  			 <p style="color:red">{{$errors->first('address')}}</p>
                   		@endif
					</div>
					<div class="form-group">
						<input class="input" type="tel" name="phone" placeholder="Số điện thoại của bạn" value="{{ old('phone') }}">
						@if($errors->has('phone'))
                  			 <p style="color:red">{{$errors->first('phone')}}</p>
                   		@endif
					</div>

				</div>
				<!-- /Billing Details -->


				<!-- Order notes -->
				<div class="order-notes">
					<textarea class="input" name="note" placeholder="Chú thích thêm"></textarea>
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

				
				
			</div>
			<!-- /Order Details -->
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

@endsection
