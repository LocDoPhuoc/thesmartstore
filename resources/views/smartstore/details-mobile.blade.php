@extends('smartstore.master')
@section('title',' - Thông tin điện thoại')
@section('main')
	<?php
		$url = URL::full();

		Session::put('url', $url);								
	?>
	<div id="main">
		<div class="container">
			<div class="row filter">
				<ul class="breadcrumb bread-head">
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
				</ul>
			</div>

			<div class="row rowtop">
				@foreach($detail as $ct)
				<?php 
					$hinh = App\HinhAnhDienThoai::where('hinh_dt',$ct->id_dt)->where('loai_hinh',2)->get();
					$img_details = App\HinhAnhDienThoai::where('hinh_dt',$ct->id_dt)->where('loai_hinh',3)->get();
					$dt = App\DienThoai::where('id',$ct->id_dt)->get();
					$gia = App\GiaDienThoai::where('id_dt',$ct->id_dt)->select('gia')->get();

					foreach ($dt as $mb) {
						$ten = $mb->ten_dt;
						$id = $mb->id;
						$so_luong_con = $mb->so_luong_con;
					}
					$binhluan = App\BinhLuan::where('id_dt',$ct->id_dt)->get();
					if ($so_luong_con == 0) {
						$stt = "( Tạm thời hết hàng )";
					} else {
						$stt = "( Còn hàng )";
					}
					
				?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 img-list">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<h3 class="name-mobile">{!!$ten!!}
							<h4 class="status-mobile">
								{!! $stt !!}
							</h4>
					</h3>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<h3 class="pull-right price-mobile" >{!! number_format($gia[0]->gia,0,",",".") !!}đ</h3>
					</div>
					<div id="myCarousel" class="carousel slide  slider-mobile" data-ride="carousel">
							  
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
							<li data-target="#myCarousel" data-slide-to="3"></li>
							<li data-target="#myCarousel" data-slide-to="4"></li>
					    </ol>

							  
					    <div class="carousel-inner slider-box" role="listbox">
							<div class="item active">
							    <img src="{!! asset($hinh[0]->url)!!}" alt="Oppo F1s" class="img-responsive">
							</div>

							<div class="item">
							    <img src="{!! asset($hinh[1]->url)!!}" alt="Chania" class="img-responsive">
							</div>

							<div class="item">
							    <img src="{!!asset($hinh[2]->url)!!}" alt="Flower" class="img-responsive">
							</div>
							<div class="item ">
							    <img src="{!! asset($hinh[3]->url)!!}" alt="Oppo F1s" class="img-responsive">
							</div>
							<div class="item">
							    <img src="{!! asset($hinh[4]->url)!!}" alt="Oppo F1s" class="img-responsive">
							</div>

						</div>

							 
						<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
						</a>
							  
						<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>     
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
					<h3 style="padding-left: 15px;">Thông số kỹ thuật</h3>
					<div class="details">
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">Màn hình: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->cong_nghe_mh !!} , {!! $ct->kich_thuoc_mh !!}''
							</div>
						</div>
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">Hệ điều hành: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->he_dieu_hanh !!}
							</div>
						</div>
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">Camera sau: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->do_phan_giai_cmr_sau !!} MP
							</div>
						</div>
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">Camera trước: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->do_phan_giai_cmr_truoc !!} MP
							</div>
						</div>
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">CPU: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->chipset !!}, {!! $ct->toc_do_cpu!!} GHz
							</div>
						</div>
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">RAM:</span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->ram !!} GB
							</div>
						</div>
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">Bộ nhớ trong: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->rom !!} GB
							</div>
						</div>
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">Hỗ trợ thẻ nhớ: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!!$ct->the_nho_ngoai!!}, {!! $ct->ho_tro_the_nho_toi_da !!} GB
							</div>
						</div>
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">Thẻ sim: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->so_khe_sim !!} sim, {!! $ct->loai_sim !!} sim
							</div>
						</div>

						
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">Dung lượng pin: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->dung_luong_pin !!} mAh
							</div>
						</div>
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">Thiết kế: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->thiet_ke !!}
							</div>
						</div>
						<div class="item-details">
							<span class="col-xs-6 col-sm-5 col-md-5">Chức năng đặc biệt: </span>
							<div class="col-xs-6 col-sm-7 col-md-7">
								{!! $ct->chuc_nang_khac !!}
							</div>
						</div>
						<div class="col-lg-12">	
							
							<div class="col-xs-12 detail-button">
								<a class="btn btn-success add-shopping col-sm-offset-2 col-md-offset-2 col-lg-offset-2" href="{!! url('/home/buy',[$id]) !!}">
									<span class="fa fa-cart-plus fa-lg" aria-hidden="true" style="padding-right:10px;"></span>
									Thêm vào giỏ hàng
								</a>
							</div>

							<div class="detail-button">
								<button   id="show-info" class="btn btn-info button-full  col-sm-offset-2 col-md-offset-2 col-lg-offset-2" type="button" ><span class="glyphicon glyphicon-menu-down"></span> Xem cấu hình chi tiết</button>
							</div>
	
						</div>

					</div>
						
				</div>


{{-- 	Hien thi toan bo chi tiet dien thoai --}}
				<div class="hide-info" id="full-info">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
						<div class="full-details">
							<div class="panel panel-info pn-fullinfo">
								<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
			                        <div class="panel-title title-details">Màu sắc - thời gian bảo hành</div>
			                    </div>
			                    <div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Màu sắc: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->mau_sac !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Bảo hành: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->bao_hanh !!}
									</div>
								</div>


								<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
			                        <div class="panel-title title-details">Màn hình</div>
			                        
			                    </div>
			                    
								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Công nghệ màn hình: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->cong_nghe_mh !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Độ phân giải: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->do_phan_giai_mh !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Màn hình rộng: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->kich_thuoc_mh !!}''
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Cảm ứng: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->cam_ung !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Mặt kính cảm ứng: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->mat_kinh !!}
									</div>
								</div>
								
								
								<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
			                        <div class="panel-title title-details">Camera sau</div>
			                        
			                    </div>
								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Độ phân giải: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->do_phan_giai_cmr_sau !!} MP
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Quay phim: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->quay_phim_cmr_sau !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Đèn flash: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->den_flash !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Chụp ảnh nâng cao: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->chup_anh_nang_cao !!}
									</div>
								</div>

								<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
			                        <div class="panel-title title-details">Camera trước</div>
			                        
			                    </div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Độ phân giải: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->do_phan_giai_cmr_truoc !!} MP
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Quay phim: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->quay_phim_cmr_truoc !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Thông tin khác: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->thong_tin_khac !!}
									</div>
								</div>

								<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
			                        <div class="panel-title title-details">Hệ điều hành - CPU</div>
			                        
			                    </div>

			                    <div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Hệ điều hành: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->he_dieu_hanh !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Chipset (Hãng CPU): </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->chipset !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Tốc độ CPU: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->toc_do_cpu !!} GHz
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Chip đồ họa (GPU): </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->gpu !!}
									</div>
								</div>

								<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
			                        <div class="panel-title title-details">Bộ nhớ - Lưu trữ</div>
			                        
			                    </div>
								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">RAM:</span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->ram !!} GB
									</div>
								</div>
								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Bộ nhớ trong (ROM): </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->rom !!} GB
									</div>
								</div>
								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Hỗ trợ thẻ nhớ: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!!$ct->the_nho_ngoai!!} GB
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Hỗ trợ thẻ tối đa: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->ho_tro_the_nho_toi_da !!} GB
									</div>
								</div>

								<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
			                        <div class="panel-title title-details">Kết nối</div>
			                        
			                    </div>

			                    <div class="item-fullinfo item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Băng tần 2G: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->bang_tan_2g !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Băng tần 3G: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->bang_tan_3g !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Hỗ trợ 4G: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->ho_tro_4g !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Số khe sim: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->so_khe_sim !!} sim
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Loại sim: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->loai_sim !!} sim
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Wifi: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->wifi !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">GPS: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->gps !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Bluetooth: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->bluetooth !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">NFC: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->nfc !!}
									</div>
								</div>
		
								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Cổng kết nối/sạc: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->cong_ket_noi_sac !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Jack tai nghe: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->jack_tai_nghe !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Kết nối khác: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->ket_noi_khac !!}
									</div>
								</div>


								<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
			                        <div class="panel-title title-details">Thiết kế - Trọng lượng</div>
			                        
			                    </div>

			                    <div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Thiết kế: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->thiet_ke !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Chất liệu: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->chat_lieu !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Kích thước: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->kich_thuoc !!}
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Trọng lượng: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->trong_luong !!}
									</div>
								</div>

								<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
			                        <div class="panel-title title-details">Thông tin pin</div>
			                        
			                    </div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Dung lượng pin: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->dung_luong_pin !!} mAh
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Loại pin: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->loai_pin !!} 
									</div>
								</div>

								<div class="panel-heading col-xs-12 col-sm-12 col-md-12">
			                        <div class="panel-title title-details">Giải trí - ứng dụng</div>
			                        
			                    </div>

			                    <div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Xem phim: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->xem_phim !!} 
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Nghe nhạc: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->nghe_nhac !!} 
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Ghi âm: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->ghi_am !!} 
									</div>
								</div>

								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Radio: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->radio !!} 
									</div>
								</div>
								
								<div class="item-fullinfo col-xs-12 col-sm-12 col-md-12">
									<span class="col-xs-6 col-sm-5 col-md-5">Chức năng khác: </span>
									<div class="col-xs-6 col-sm-7 col-md-7">
										{!! $ct->chuc_nang_khac !!}
									</div>
								</div>

							</div>
						</div>
					</div>
	
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5" style="padding-top: 30px;">
						<img src="{!! asset($img_details[0]->url)!!}" alt="" class="img-responsive">
					</div>

					<div class="col-xs-12 detail-button">
						<button  id="hide-info" class="btn btn-info add-shopping col-sm-2 col-md-2 col-lg-2 button-full"><span class="glyphicon glyphicon-menu-up" aria-hidden="true" style="padding-right:10px;"></span>Rút gọn</button>
					</div>

				</div>
				
				

			</div>

					{{-- Comment cho dien thoai --}}


			<div class="row rowtop">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
					<h3 class="title-comment">BÌNH LUẬN 
						<span>
							<?php
								$tong = App\BinhLuan::where('id_dt',$mb->id)->count();
								echo "(".$tong.")";
							?>
						</span> 
					</h3>
					<form action="{!! route('home.dien-thoai.comment',[$id]) !!}" method="POST">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">

					    <div class="form-group">
					      	<img class="" width="60" height="60" src="{!! url('public/smartstore/images/user.png') !!}" alt="Name user"> 
					      	<textarea class="form-control" rows="5" name="comment" id="comment" placeholder="Ý kiến của bạn (vui lòng gõ tiếng Việt có dấu)"></textarea>
					    </div>
					    <div class="form-group col-sm-5 group-comment">
					      	<label class="sr-only " for="name">Tên của bạn:</label>
					      	<input type="text" class="form-control" name="name" id="name" placeholder="Tên của bạn" value="{!!Auth::check() ? Auth::user()->name : null !!}">
					    </div>
					    <div class="form-group col-sm-5 group-comment">
					      	<label class="sr-only" for="email">Email:</label>
					      	<input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{!!Auth::check() ?  Auth::user()->email : null !!}">
					    </div>

					    <button type="submit" class="btn btn-info button-send">Gửi</button>

					</form>
					

					@foreach($binhluan as $cmt)
						<?php  
							$date = new DateTime($cmt->ngay_dang);
							$date = $date->format('d/m/y H:i'); 
						?>
						<hr>
						<div class="detail-comment">
							<img class="" width="60" height="60" src="{!! url('public/smartstore/images/user.png') !!}" alt="Name user">
							<p><b class="user-comment">{!! $cmt->ten !!}</b> ({!! $date !!})</p>
							<div style="padding-left: 30px; "><span>{!! $cmt->noi_dung !!}</span></div><br>
							<a href="" title="" style="padding-left: 30px; padding-top: 15px;"><i class="fa fa-reply" aria-hidden="true"></i>Trả lời</a>
							<a href="" title="" style="padding-left: 20px; padding-top: 15px;"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Thích</a>
						</div>
					@endforeach

				</div>
			</div>
		
		</div>

		@endforeach
	</div>
@stop
