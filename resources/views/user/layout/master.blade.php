<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Sell Phone</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{asset("user/css/bootstrap.min.css")}}"/>

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{asset("user/css/slick.css")}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset("user/css/slick-theme.css")}}"/>

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{asset("user/css/nouislider.min.css")}}"/>

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{asset("user/css/font-awesome.min.css")}}">
	

	
	{{-- css login --}}
	<link type="text/css" rel="stylesheet" href="{{asset("user/css/util.css")}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset("user/css/main_login.css")}}"/>
	<link type="text/css" rel="stylesheet" href="{{asset("user/css/material-design-iconic-font.min.css")}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset("user/fonts/iconic/css/material-design-iconic-font.min.css")}}">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{asset("user/css/style.css")}}"/>
	{{-- angular --}}
	<link rel="stylesheet" href="{{asset("user/css/angular-material.min.css")}}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body ng-app="myApp"  ng-controller="MyController">
		
		<!-- HEADER -->

		<header  >
			
			<!-- MAIN HEADER -->
			<div id="header" >
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div  class="row" >
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">

								<a href="{{route('user.home')}}" class="logo">
									<img style="width:70px;" src="{{asset("user/img/logo.png")}}" alt="">

								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{route('user.home')}}" method="GET">
									@method('GET')
									@csrf
									<input type="text" name="product_search" id="product_search" class="input" placeholder="Tìm điện thoại ở đây!!" style="border-radius: 5px 0px 0px 5px;">
									<button class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>				
									
									<div id="productList">
									</div>
									{{ csrf_field() }}
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Cart -->
								<div class="dropdown">
									<a href="{{route('user.cart')}}">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ hàng</span>
										<div class="qty">{{Session::has('cart') ? Session::get('cart')->totalQty : 0 }}</div>
									</a>
									
								</div>
								<!-- /Cart -->
								<!-- Account -->
								<div>
									<a href="{{ route('user.Account') }}">
										<i class="fa fa-user-o"></i>
										@auth
										{{Auth::user()->fullname}}
										@endauth
										@guest
										<span>Đăng Nhập</span>
										@endguest
										
										
									</a>
								</div>
								<!-- /Account -->

								

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li ><a href="{{route('user.home')}}">Trang chủ</a></li>
						@foreach ($category as $key=>$value)


						<li><a href="{{route('user.productCategory',['id'=>$value['id'],'level'=>'0','arrange'=>'desc'])}}">{{$value['name']}}</a></li>			
						@endforeach

					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		@section('content')
		@show

		
		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Tư vấn mua hàng </h3>
								
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>92 Quang Trung, Hải Châu</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>

							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Góp ý, khiếu nại dịch vụ (8h00-22h00)</h3>
								<ul class="footer-links">
									<li><a href="#">1800 6616</a></li>
									
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Dịch Vụ</h3>
								<ul class="footer-links">
									<li><a href="#">Hệ thống bảo hành</a></li>
									<li><a href="#">Kiểm tra hàng Apple chính hãng</a></li>
									<li><a href="#">Giới thiệu máy đổi trả</a></li>
									<li><a href="#">Chính sách đổi trả</a></li>
									<li><a href="#">Kiểm tra hóa đơn điện tử</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Liên Hệ</h3>
								<ul class="footer-links">
									<li><a href="#">Gọi mua hàng 1800.1060 (7:30 - 22:00)</a></li>
									<li><a href="#">Gọi khiếu nại   1800.1062 (8:00 - 21:30)</a></li>
									<li><a href="#">Gọi bảo hành   1800.1064 (8:00 - 21:00)</a></li>
									<li><a href="#">Kỹ thuật           1800.1763 (7:30 - 22:00)</a></li>
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->
			
			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{asset("user/js/jquery.min.js")}}"></script>
		<script src="{{asset("user/js/bootstrap.min.js")}}"></script>
		<script src="{{asset("user/js/slick.min.js")}}"></script>
		<script src="{{asset("user/js/nouislider.min.js")}}"></script>
		<script src="{{asset("user/js/jquery.zoom.min.js")}}"></script>
		<script src="{{asset("user/js/main.js")}}"></script>
		<script type="text/javascript" src="{{asset("user/js/angular-1.5.min.js")}}"></script> 
		<script type="text/javascript" src="{{asset("user/js/angular-animate.min.js")}}"></script>
		<script type="text/javascript" src="{{asset("user/js/angular-aria.min.js")}}"></script>
		<script type="text/javascript" src="{{asset("user/js/angular-messages.min.js")}}"></script>
		<script type="text/javascript" src="{{asset("user/js/angular-material.min.js")}}"></script>
		<script type="text/javascript" src="{{asset("user/js/main_angular.js")}}"></script> 
		<script type="text/javascript" src="{{asset("user/js/main_js.js")}}"></script> 
		<script>
			$(document).ready(function(){

				$('#product_search').keyup(function(){ 
					var query = $(this).val();
					if(query != '')
					{
						var _token = $('input[name="_token"]').val();
						$.ajax({
							url:"{{ route('autocomplete.fetch') }}",
							method:"POST",
							data:{query:query, _token:_token},
							success:function(data){
								$('#productList').fadeIn();  
								$('#productList').html(data);
							}
						});
					}
				});

				$(document).on('click', '.result', function(){  
					$('#product_search').val($(this).text());  
					$('#productList').fadeOut();  
				}); 
				//code doi class 
               $('.store-filter>ul').removeClass("pagination"); //doi class cua pagination
               $('.store-filter>ul').addClass("store-pagination");
               $('.store-filter>ul>li').removeClass("page-item");

               ///code user view
               $('.deliverable-infos').hide();
               $('.dropdown-deliverable').on('click', function(e) {
               	console.log("dropdown toggled!");
               	e.preventDefault();
               	e.stopPropagation();			      
               	var dataFor = $(this).data('for');
               	var idFor = $(dataFor);
               	idFor.slideToggle();
               });
			    
			});
		</script>
	</body>
	</html>
