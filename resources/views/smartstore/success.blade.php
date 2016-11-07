
@extends('smartstore.master')
@section('main')
	<div class="container">
		<div class="row row-successs row-cart">
	      	<h2 class="title-success">Đặt hàng thành công!!</h2>
	      	<img src="{!! url('public/smartstore/images/success.png') !!}" alt="Thanh cong">
	      	<h3 >The Smart Store xin cám ơn quý khách đã cho chúng tôi cơ hội phục vụ!!</h3>
	      	<div class="col-md-3 col-md-offset-4" style="padding-top: 15px;">
	        	<a href="{!! url('/home') !!}" type="button" class="btn btn-success pull-right mr10">Quay lại trang chủ</a>
	      	</div>
	    </div>
	</div>
@stop
