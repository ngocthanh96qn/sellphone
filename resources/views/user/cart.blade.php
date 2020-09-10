
@extends('user.layout.master')
@section ('content')

<div class="container" >
	
	<div class="row" style="margin-top: 20px; margin-bottom: 100px">
		@if (Session::get('cart')->items==null)		
		<h4 class="text-center" style="margin-top: 20px;">Hiện giỏ hàng Rỗng tiếp tục mua hàng</h4>
		<div class="text-center" style="margin-top: 30px"><a href="{{route('user.home')}}" class="btn" style="background-color:#D10024;color:#fff"><i class="fa fa-shopping-cart"></i> &nbsp; Tiếp Tục Mua Hàng</a></div>	
		@else
		<div class="col-sm-7">
			<h3 class="text-center" style="margin-top: 20px;">Giỏ Hàng</h3>
			<table id="cart" class="table table-hover table-condensed">
				<thead>
					<tr>
						<th style="width:50%">Sản Phẩm</th>
						<th style="width:10%">Giá</th>
						<th style="width:8%">Số Lượng</th>
						<th style="width:22%" class="text-center">Tổng</th>
						<th style="width:10%"></th>
					</tr>
				</thead>
				<tbody>

					@foreach ($products as $key=>$value)
					<tr>
						<td data-th="Product">
							<div class="row">
								<div class="col-sm-2 hidden-xs"><img src="{{$value['item']->image}}" alt="..." class="img-responsive"/></div>
								<div class="col-sm-10">
									<h4 class="nomargin">{{$value['item']->name}}</h4>
									
								</div>
							</div>
						</td> 
						<td data-th="Price">{{number_format($value['item']->price)}}</td>
						{{-- <form action="{{ route('user.cartUpdate') }}" method="GET" > --}}
							<td data-th="Quantity">
								<div class="input-number" style="width: 70px">
									<input type="number" value="{{$value['qty']}}" name="quantity">
									
									
									@if ($value['stocking']=='true')
									<a href="{{route('user.cartUpdate',['id'=>$value['item']->id,'action'=>'asc'])}}" ><span class="qty-up"  >+</span></a>
									@else
									<a  data-toggle="modal" data-target="#Qtyup{{$key}}"><span class="qty-disup " >+</span></a>
									@endif

									@if ($value['minimum']=='true')
									<a  data-toggle="modal" data-target="#Qtydown"><span class="qty-disdown " >-</span></a>
									@else
									<a href="{{route('user.cartUpdate',['id'=>$value['item']->id,'action'=>'desc'])}}"><span class="qty-down" >-</span></a>
									@endif

									
								</div>
							</td>
							
							<td data-th="Subtotal" class="text-center">{{number_format($value['price'])}}</td>
							<td class="actions" data-th="">
								<a href="{{route('user.deleteProduct',$value['item']->id)}}"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
							</td>
						</tr>

						<div class="container" >

							<div class="modal fade" id="myModal" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header" style="background-color: #81F7F3">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Xin chào quý khách hiện bạn chưa đăng nhập!!!</h4>
										</div>
										<div class="modal-body">
											<p>Để quản lí đơn hàng bạn cần  </p> <a href="{{ route('user.ViewLogin',['role'=>'cart']) }}"><button class="btn" style="background-color:#B40431;color: white; margin-left: 250px;">Đăng nhập tại đây</button></a>
											<p>hoặc </p> <a href="{{ route('guest.Checkout') }}"><button class="btn" style="background-color:#8A0808;color: white;margin-left: 250px;">Tiếp tục thanh toán</button></a> 
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
										</div>
									</div>

								</div>
							</div>
							<div class="modal fade" id="Qtyup{{$key}}" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header" style="background-color: #D10024; ">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h3 class="text-center" style="color: #fff"><i class="fa fa-times" aria-hidden="true"></i> Hết Hàng!!</h3>
										</div>
										<div class="modal-body">
											<h4 class="modal-title text-center">{{$value['item']->name}} Hiện Hết Hàng. Xin thông cảm!! </h4>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
										</div>
									</div>

								</div>
							</div>
							<div class="modal fade" id="Qtydown" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header" style="background-color: #D10024; ">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h3 class="text-center" style="color: #fff">Thông báo!!</h3>
										</div>
										<div class="modal-body">
											<h4 class="modal-title text-center"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Tối thiểu mua 1 sản phẩm.</h4>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
										</div>
									</div>

								</div>
							</div>
						</div>
						@endforeach

					</tbody>
					
				</table>
				

			</div>

			<div class="col-sm-4 col-sm-offset-1">	
				<div class="text-center" style="margin-top: 70px">Tổng Đơn Hàng: <strong> {{number_format($totalPrice)}} VNĐ</div>

					<div class="text-center" style="margin-top: 30px"><a href="{{route('user.home')}}" class="btn" style="background-color:#333;color:#fff"><i class="fa fa-shopping-cart"></i> &nbsp; Tiếp Tục Mua Hàng</a></div>							
					@auth
					<div class="text-center" style="margin-top:10px"><a href="{{route('user.Checkout')}}" class="btn btn-block" style="background-color:#D10024;color:#fff" data-target="#myModal"> <i class="fa fa-usd"></i> &nbsp; Thanh Toán</a></div>
					@endauth	
					
					@guest
					<div class="text-center" style="margin-top:10px"><button type="button" class="btn btn-block" style="background-color:#D10024;color:#fff" data-toggle="modal" data-target="#myModal"> <i class="fa fa-usd"></i>&nbsp; Thanh Toán</button></div>	
					@endguest


				</div>
				@endif
			</div>

			

		</div>

		@endsection