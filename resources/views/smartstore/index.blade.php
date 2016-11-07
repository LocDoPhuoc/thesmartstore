@extends('smartstore.master')
@section('main')
	<?php
		$url = URL::full();

		Session::put('url', $url);								
	?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 leftbanner">
				<div id="myCarousel" class="carousel slide  mySlider" data-ride="carousel" style="margin-bottom: 10px;">
							  <!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
						<li data-target="#myCarousel" data-slide-to="3"></li>
					</ol>

							  <!-- Wrapper for slides -->

					<?php
						$quangcao = App\QuangCao::where('trang_thai',1)->get();
					?>
					<div class="carousel-inner slider" role="listbox">
						<div class="item active">
							<a href="{!! route('dienthoai.show',[$quangcao[0]->id_dt]) !!}"><img src="{!! asset($quangcao[0]->img)!!}" alt="Oppo F1s" class="img-responsive"></a>
						</div>

						<div class="item">
							<a href="{!! route('dienthoai.show',[$quangcao[1]->id_dt]) !!}"><img src="{!! asset($quangcao[1]->img)!!}" alt="Chania" class="img-responsive"></a>
						</div>

						<div class="item">
							<a href="{!! route('dienthoai.show',[$quangcao[2]->id_dt]) !!}"><img src="{!! asset($quangcao[2]->img)!!}" alt="Flower" class="img-responsive"></a>
						</div>

						<div class="item">
							<a href="{!! route('dienthoai.show',[$quangcao[3]->id_dt]) !!}"><img src="{!! asset($quangcao[3]->img)!!}" alt="Flower" class="img-responsive"></a>
						</div>
					</div>

							  <!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
							  
					<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>     <!--Ket thuc Content slide-->

			</div> <!-- Ket thuc left banner -->

			<div class="visible-lg col-lg-4 rightbanner">
				<ul>
					<li>
						<a>
							<img src="{!! asset('public/smartstore/images/636073260797539336_Laptop-H2.jpg')!!}" alt="">
						</a>
					</li>

					<li>
						<a>
							<img src="{!! asset('public/smartstore/images/30_07_2016_10_46_51_SIS-Samsung-385-170.jpg')!!}" alt="">
						</a>
					</li>
				</ul>
			</div>  <!-- Ket thuc right banner -->

			</div>
		</div>

	<div class="container">   <!-- Product banner -->
			
		<ol class = "homeproduct row">
			<?php 
				$id_a = 0;
				$id_info = "";
				$gia_mb =0;
			?>

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
				                <img class="imghide img-responsive" width="388" height="180" alt="" src="{!! $img->url!!}">
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

		<div class="row more">
			<div class="col-md-12 view-more">
				<a href="{!! route('dienthoai.index') !!}">
					<button type="button" class="btn btn-info">
						<?php
							$tong_dt = App\DienThoai::all()->count();
							echo "Xem thêm ".$tong_dt." điện thoại"
						?>
					</button>
				</a>
			</div>
		</div>
	</div> <!-- Ket thuc main banner -->

@stop