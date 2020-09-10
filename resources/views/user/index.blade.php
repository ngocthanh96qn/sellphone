
@extends('user.layout.master')
@section ('content')

<!-- SECTION--Slide -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row ">
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="carousel-inner">
							<div class="item active ">
								<img src="{{asset("/user/img/banner1.png")}}" class="img-rounded"  alt="banner 1" style="width:100%;">
							</div>

							<div class="item">
								<img src="{{asset("/user/img/banner2.png")}}" class="img-rounded"  alt="banner 2" style="width:100%;">
							</div>

							<div class="item">
								<img src="{{asset("/user/img/banner3.png")}}" class="img-rounded"  alt="banner 3" style="width:100%;">
							</div>
						</div>
					</div> 		
				</div>

			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION--New Product -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Sản Phẩm Mới</h3>

				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row" >
					<div class="products-tabs"  >
						<!-- tab -->
						<div id="tab1" class="tab-pane active" >
							<div class="products-slick" data-nav="#slick-nav-1" >
								
					<!-- product -->										 		
					@foreach ($listProductNew as $value)
					
						<div class="product">
						<div class="product-img">
							<img src="{{asset($value['image'])}}" alt="" style="height: 300px">
							<div class="product-label">
								
								<span class="new">Mới</span>
							</div>
						</div>
						<div class="product-body">
							<p class="product-category">{{$value['category_name']}}</p>
							<h3 class="product-name"><a href="#">{{$value['product_name']}}</a></h3>
							<h4 class="product-price">{{number_format($value['price'])}}</h4>


							

						</div>
						<div class="add-to-cart">
							<a href="{{route('user.product',$value['id'])}}"><button  class="add-to-cart-btn" ><i class="fa fa-eye" ></i>Chi Tiết Sản Phẩm </button></a>
							
						</div>
					</div>
					
					<!-- /product -->
					@endforeach
																													 												
				</div>
				<div id="slick-nav-1" class="products-slick-nav"></div>
			</div>
			<!-- /tab -->
		</div>
	</div>
</div>
<!-- Products tab & slick -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION--Top Selling-->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Sản Phẩm Bán Chạy</h3>

				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								@foreach ($listHotProduct as $value)
									<!-- product -->

								<div class="product">
									<div class="product-img">
										<img src="{{asset($value['image'])}}" alt="" style="height: 300px">
										
									</div>
									<div class="product-body">
										<p class="product-category">{{$value['category_name']}}</p>
										<h3 class="product-name"><a href="#">{{$value['product_name']}}</a></h3>
										<h4 class="product-price">{{number_format($value['price'])}} VND</h4>
										
										
									</div>
									<div class="add-to-cart">
										 <a href="{{route('user.product',$value['id'])}}"><button class="add-to-cart-btn"><i class="fa fa-eye"></i> Chi Tiết Sản Phẩm</button></a>
										
									</div>
								</div>
								<!-- /product -->
								@endforeach
									
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->


@endsection	
