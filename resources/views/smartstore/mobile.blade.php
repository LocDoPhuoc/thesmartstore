@extends('smartstore.master')
@section('main')
	<?php
		$url = URL::full();

		Session::put('url', $url);								
	?>
	<div class="container">
		<div class="row filter">
			<ul class="breadcrumb">
				<li>
					<a href="{!! url('/home') !!}"" title="The Smart Store">
						<span class="glyphicon glyphicon-home"></span>
						Trang chủ
					</a>
				</li>
				<span class"space"> > </span>
				<li>
					<a href="{!! route('dienthoai.index') !!}" title="">
						<span class="glyphicon glyphicon-phone"></span>
						Điện thoại

					</a>
				</li>

				@if($nsx != "")
					<span class"space"> > </span>
					<li>
						<a href="{!! route('home.hang-san-xuat',[$nsx[0]->id]) !!}" title="">
							{!! $nsx[0]->ten !!}
						</a>
					</li>
				@endif

				{{-- <li class="dropdown ">
					<button class="btn btn-info dropdown-toggle button-filter" type="button" data-toggle="dropdown">Mức giá
	    			<span class="caret"></span></button>
					<ul class="dropdown-menu dropdown-filter list-group">
						<li class="list-group-item"><a href="#" tabindex="-1">Tất cả</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Dưới 1 triệu</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Từ 1 tới 3 triệu</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Từ 3 tới 6 triệu</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Từ 6 tới 10 triệu</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Trên 10 triệu</a></li>
					</ul>
				</li>

				<li class="dropdown ">
					<button class="btn btn-info dropdown-toggle button-filter" type="button" data-toggle="dropdown">Hãng sản xuất
	    			<span class="caret"></span></button>
					<ul class="dropdown-menu dropdown-filter list-group">
						<li class="list-group-item"><a href="#" tabindex="-1">Tất cả</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Apple (iPhone)</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">OPPO</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Sony</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Samsung</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Nokia</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">HTC</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Asus</a></li>
									
					</ul>
				</li>

				<li class="dropdown ">
					<button class="btn btn-info dropdown-toggle button-filter" type="button" data-toggle="dropdown">Kích thước màn hình
	    			<span class="caret"></span></button>
						<ul class="dropdown-menu dropdown-filter list-group">
						<li class="list-group-item"><a href="#" tabindex="-1">Tất cả</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Dưới 3 inch</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Khoảng 4 inch</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Khoảng 5 inch</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Khoảng 6 inch</a></li>				
					</ul>
				</li>

				<li class="dropdown ">
					<button class="btn btn-info dropdown-toggle button-filter" type="button" data-toggle="dropdown">Camera
	    			<span class="caret"></span></button>
					<ul class="dropdown-menu dropdown-filter list-group">
						<li class="list-group-item"><a href="#" tabindex="-1">Tất cả</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Dưới 2MP</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Khoảng 2MP</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Khoảng 5 MP</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Khoảng 8 MP</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Khoảng 12 MP</a></li>
						<li class="list-group-item"><a href="#" tabindex="-1">Trên 12 MP</a></li>
					</ul>
				</li> --}}
				
			</ul>
		</div>
	</div>

	<div class="container">   <!-- Product banner -->
		
		@if($dienthoai->isEmpty())
			{!! "<div class='search-err'>".
					"<h3>Không tìm thấy kết quả nào phù hợp !!!</h3>".
				"</div>" 
			!!}
		@else
			<?php 
				$id_a = 0;
				$id_info = "";
				$gia_mb =0;
			?>

		<ol class = "homeproduct row">
			@foreach($dienthoai as $dt)
				<?php
					$id_a = $id_a + 1;
					$id_info = "fi".$id_a;
					$gia = App\GiaDienThoai::where('id_dt',$dt->id)->get();
					$detail = App\ChiTietDienThoai::where('id_dt',$dt->id)->get();
					$hinh = App\HinhAnhDienThoai::where('hinh_dt',$dt->id)->where('loai_hinh',1)->get();
					foreach ($gia as $gia_dt) {
						$gia_mb = number_format($gia_dt->gia,0,",",".");
												
					}

				?>
				@foreach ($detail as $ct)		
					<li class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
						<a class="bgview" href="{!! route('dienthoai.show',$dt->id) !!}" id="{!! $id_a !!}">
							@foreach($hinh as $img)
				                <img class="imghide img-responsive" width="388" height="180" alt="Điện thoại di động Sony Xperia XA" src="{!! asset($img->url)!!}">
				            @endforeach

				                        <h3 >{!! $dt->ten_dt !!}</h3>
				                        <strong >{!! $gia_mb !!}đ</strong>
				                        <div class="clr"></div>
				                        <div></div>
				                        <button type="button">Trả góp 0%</button>
				                        <label></label>
                		</a>

                		<a href="{!! route('dienthoai.show', $dt->id) !!}">
                			<figure class="bginfo" id="{!! $id_info !!}">
					            <h3 class="pull-left" >{!! $dt->ten_dt !!}</h3>
					            <strong class="pull-right" ><h3 class="price">{!! $gia_mb !!}đ</h3></strong><br>
					                <div id="gach">
					                    	
					                </div>

					            <div class="jumbotron" id="info">
							        <span>Màn hình: {!! $ct->cong_nghe_mh !!}</span></br>
							        <span>HĐH:</span>{!! $ct->he_dieu_hanh !!}</br>
							        <span>CPU: {!! $ct->chipset !!}</span></br>
						                   
						        <button type="button">Trả góp 0%</button>
					            </div>
					                    
                			</figure>
                		</a>
					</li>
				@endforeach
			@endforeach
		</ol>
		@endif		
	</div>
@stop