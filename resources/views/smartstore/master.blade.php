<!DOCTYPE html>
<html lang="vi">
<head>
	<title>The Smart Store @yield('title')</title>
	
	<meta charset="utf-8">
	<meta http-equiv="refresh">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	{{--<link rel="stylesheet" href="{!! url('public/smartstore/css/bootstrap.min.css') !!}">--}}
	<script src="{!!asset('public/smartstore/js/jquery-1.11.3.min.js')!!}" ></script>
	<link rel="stylesheet" type="text/css" href="{!! url('public/smartstore/css/mobileCSS.css') !!}">
	<script src="{!!asset('public/smartstore/js/smartstoreJS.js')!!}"></script>
	<script src="{!!asset('public/smartstore/js/shopping.js')!!}"></script>
	<script src="https://use.fontawesome.com/6024715318.js"></script>

</head>

<body>
	<div id="header" class="container">
		<nav class="navbar navbar-default row style-nav" role="navigation" >
			<div class="container-fluid pn-home">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header home-search">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand " href="{!! url('/home') !!}"">The Smart Store</a>
					<form class="navbar-form navbar-left form-inline frm-search" role="search" action="{!! route('home.search') !!}" method="POST">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
						<div class="form-group f-search">
							<input type="text" class="form-control txt-search" name="txtSearch" placeholder="Nhập từ khóa cần tìm">
							<button type="submit" class="btn btn-default"><i class="fa fa-search fa-fw" aria-hidden="true"></i></button>
						</div>
					</form>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav myNav ">
						<li class="dropdown style-hover" id="l1" >
							<a href="{!! route('dienthoai.index')!!}" id="a-l1">
								<span>
									<label >
										<img class="myIcons" src="{!! asset('public/smartstore/icons/mobile.ico')!!}"></img>
									</label>
								</span>
								<label id="lb-l1">Điện thoại</label>
						    </a>
						    <ul class="dropdown-menu myDropdown-menu" id="u-l1" >
						    	<div class="pull-left pn-productor" >
						    		<p><b tabindex="-1">Hãng sản xuất</b></p>
									<li><hr></li>
									<?php 
										$hang = App\HangSanXuat::take(6)->get();
										foreach ($hang as $nsx) {
											echo "<li><a href='".route('home.hang-san-xuat',[$nsx->id])."' tabindex='-1'>".$nsx->ten."</a></li>";
										}
									?>
									<li style="padding-bottom: 15px;"></li>
						    	</div>
						    	<div class="pull-right pn-price">
						    		<p><b tabindex="-1">Mức giá</b></p>
									<li><hr></li>
									<li><a href="{!! route('home.gia',[200000,1000000]) !!}" tabindex="-1">Dưới 1 triệu</a></li>
									<li><a href="{!! route('home.gia',[1000000,3000000]) !!}" tabindex="-1">Từ 1 tới 3 triệu</a></li>
									<li><a href="{!! route('home.gia',[3000000,6000000]) !!}" tabindex="-1">Từ 3 tới 6 triệu</a></li>
									<li><a href="{!! route('home.gia',[6000000,10000000]) !!}" tabindex="-1">Từ 6 tới 10 triệu</a></li>
									<li><a href="{!! route('home.gia',[10000000,50000000]) !!}" tabindex="-1">Trên 10 triệu</a></li>
									
						    	</div>

							</ul>
						</li>

{{-- 						<li class="dropdown style-hover" id="l2">
							<a href="#" id="a-l2">
								<span>
									<label >
										<img class="myIcons" src="{!! asset('public/smartstore/icons/Laptop.jpg')!!}" ></img>
									</label>
								</span>
								<label id="lb-l2">Laptop</label>
							</a>
							<ul class="dropdown-menu myDropdown-menu" id="u-l2" >
						    	<div class="pull-left pn-productor">
						    		<p><b tabindex="-1">Hãng sản xuất</b></p>
									<li><hr></li>
									<li><a href="#" tabindex="-1">Apple (Macbook)</a></li>
									<li><a href="#" tabindex="-1">ASUS</a></li>
									<li><a href="#" tabindex="-1">Dell</a></li>
									<li><a href="#" tabindex="-1">HP</a></li>
									<li><a href="#" tabindex="-1">Lenovo</a></li>
									<li><a href="#" tabindex="-1">Acer</a></li>
									
						    	</div>
						    	<div class="pull-right pn-price">
						    		<p><b tabindex="-1">Mức giá</b></p>
									<li><hr></li>
									<li><a href="#" tabindex="-1">Từ 5 tới 10 triệu</a></li>
									<li><a href="#" tabindex="-1">Từ 10 tới 15 triệu</a></li>
									<li><a href="#" tabindex="-1">Từ 15 tới 20 triệu</a></li>
									<li><a href="#" tabindex="-1">Từ 20 tới 25 triệu</a></li>
									<li><a href="#" tabindex="-1">Trên 25 triệu</a></li>
									
						    	</div>
							
						
							</ul>
						</li> --}}

						{{-- <li class="dropdown style-hover" id="l3">
							<a href="#" id="a-l3">
								<span>
									<label >
										<img class="myIcons" src="{!! asset('public/smartstore/icons/tablet.jpg')!!}"></img>
									</label>
								</span>
								<label id="lb-l3">Tablet</label>
							</a>
							<ul class="dropdown-menu myDropdown-menu" id="u-l3" >
						    	<div class="pull-left pn-productor">
						    		<p><b tabindex="-1">Hãng sản xuất</b></p>
									<li><hr></li>
									<li><a href="#" tabindex="-1">Apple(Ipad) </a></li>
									<li><a href="#" tabindex="-1">ASUS</a></li>
									
									<li><a href="#" tabindex="-1">Samsung</a></li>
									<li><a href="#" tabindex="-1">Lenovo</a></li>
									<li><a href="#" tabindex="-1">Acer</a></li>
									<li style="padding-bottom: 15px;"></li>
						    	</div>
						    	<div class="pull-right pn-price">
						    		<p><b tabindex="-1">Mức giá</b></p>
									<li><hr></li>
									<li><a href="#" tabindex="-1">Dưới 2 triệu</a></li>
									<li><a href="#" tabindex="-1">Từ 2 tới 5 triệu</a></li>
									<li><a href="#" tabindex="-1">Từ 5 tới 8 triệu</a></li>
									
									<li><a href="#" tabindex="-1">Trên 8 triệu</a></li>
									
						    	</div>
							
						
							</ul>
						</li> --}}

						<li class="dropdown style-hover" id="l4">
							<a href="{!! route('home.apple') !!}" id="a-l4">
								<span>
									<label >
										<img class="myIcons" src="{!! asset('public/smartstore/icons/apple.png')!!}" ></img>
									</label>
								</span>
								<label id="lb-l4">Apple</label>
							</a>
							
						</li>

						<li class="dropdown style-hover" id="l4">
							<a href="{!! route('home.samsung') !!}" id="a-l4">
								<span>
									<label >
										<img class="myIcons" src="{!! asset('public/smartstore/icons/samsung.png')!!}" ></img>
									</label>
								</span>
								<label id="lb-l4">Samsung</label>
							</a>
							
						</li>
						
						<li class="dropdown style-hover" id="l4">
							<a href="{!! route('home.sony') !!}" id="a-l4">
								<span>
									<label >
										<img class="myIcons" src="{!! asset('public/smartstore/icons/sony.png')!!}" ></img>
									</label>
								</span>
								<label id="lb-l4">Sony</label>
							</a>
							
						</li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right myNav">
						<li style="border-top: 3px solid white;">
							<a href="{!! route('shopping') !!}">
								<span>
									<label >
										<img class="myIcons" src="{!! asset('public/smartstore/icons/shopping-cart.ico')!!}">
										<p class="badge" style="background-color:red;">{!! Cart::count() !!}</p></img>
									</label>
								</span>
								
								<label id="lb-l1">Giỏ hàng</label>
						    </a>

						</li>

						<li class="dropdown " style="padding-top:25px;">
							<button class="btn btn-info dropdown-toggle " type="button" data-toggle="dropdown">
								<span class="fa fa-user fa-lg pull-left" aria-hidden="true" style="padding-top: 3px;"></span>&nbsp;
								@if(Auth::check())
					                <span>{!! Auth::user()->name !!}</span>
				
					            @else 
					                <span>Tài khoản</span>
				                @endif
				    			<span class="caret"></span>
			    			</button>
							<ul class="dropdown-menu dropdown-filter list-group">
								@if(Auth::check())
									@if(Auth::user()->level == 1 || Auth::user()->level == 3)
										<li class="account-item">
											<a href="{!! url('/ploc1411_admin') !!}" tabindex="-1" style="text-decoration: none">
												<i class="fa fa-flag-o" aria-hidden="true"></i>
												Admin Area
											</a>
										</li>
									@endif
									<li class="account-item">
										<a href="{!! url('/home/logout') !!}" tabindex="-1" style="text-decoration: none">
											<i class="fa fa-sign-out" aria-hidden="true"></i>
											Đăng xuất
										</a>
									</li>
								@else
									<li class="account-item">
										<a href="{!! route('register.create') !!}" tabindex="-1" style="text-decoration: none">
											<i class="fa fa-user-plus" aria-hidden="true"></i>
											Đăng ký
										</a>
									</li>

									<li class="account-item">
										<a href="{!! route('getLogin') !!}" tabindex="-1" style="text-decoration: none">
											<i class="fa fa-sign-in" aria-hidden="true"></i>
											Đăng nhập
										</a>
									</li>

								@endif
		
							</ul>
						</li>
					</ul>

				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</div> <!-- Ket thuc hedear -->

	
		<!-- Phan noi dung chinh cua trang web -->
		@yield('main')
		<!-- Ket thuc  -->
		

	</div> <!-- Ket thuc main banner -->

	<div id="footer" class="container">
			<div class="row pn-footer">
				<p>Coppyright<sup>@</sup> 2016  &nbsp;<a href="{!! url('/home') !!}">TheSmartStore.com</a></p>
				<p>Designer: Phuoc Loc</p>
			</div> 
	</div>
</body>

</html>