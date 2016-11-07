@extends('smartstore.master')
@section('main')
	<div class="container">
		<div class="row ">

			@if(0)
		    	<div class="no-item row row-cart">
		      		<h2 class="title-cart">Bạn không có sản phẩm nào trong giỏ hàng</h2>
		      		<div class="col-md-4 col-md-offset-2">
		        		<a href="{!! url(Session::get('url')) !!}" type="button" class="btn btn-success pull-right mr10">Tiếp tục mua hàng</a>
		      		</div>
		    	</div>

		    @else
				<div class="col-md-12" style=" padding-left: 0px;">
		            <div class="panel panel-info">
		                <div class="panel-heading">
		                	<div class="panel-title">Thông tin khách hàng</div>
		                </div>
		                <div class="panel-body">
		                    <form class="form-horizontal" role="form" method="POST" action="{!! route('shopping.postCheckOut') !!}">
		                        {{ csrf_field() }}

		                        <div class="form-group{{ $errors->has('ho_ten') ? ' has-error' : '' }}">
		                            <label for="ho_ten" class="col-md-4 control-label">Họ tên </label>
		                 
		                            <div class="col-md-6">
		                                <input id="ho_ten" type="text" class="form-control" name="ho_ten" value="{{ Auth::check() ? Auth::user()->name :old('ho_ten') }}"  autofocus>

		                                @if ($errors->has('ho_ten'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('ho_ten') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group{{ $errors->has('ho_ten') ? ' has-error' : '' }}">
		                            <label for="gioi_tinh" class="col-md-4 control-label">Giới tính </label>
		                 
		                            <div class="col-md-6">
										<select name="gioi_tinh" class="form-control">
											<option value="1">Nam</option>
											<option value="1">Nữ</option>
										</select>
		                            </div>
		                        </div>

		                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                            <label for="email" class="col-md-4 control-label">Email</label>

		                            <div class="col-md-6">
		                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::check() ? Auth::user()->email : old('email') }}" >

		                                @if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group{{ $errors->has('sdt') ? ' has-error' : '' }}">
		                            <label for="sdt" class="col-md-4 control-label">Số điện thoại</label>

		                            <div class="col-md-6">
		                                <input id="sdt" type="text" class="form-control" name="sdt" >

		                                @if ($errors->has('sdt'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('sdt') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group{{ $errors->has('dia_chi') ? ' has-error' : '' }}">
		                            <label for="dia_chi" class="col-md-4 control-label">Địa chỉ</label>

		                            <div class="col-md-6">
		                                <input id="dia_chi" type="text" class="form-control" name="dia_chi" >

		                                @if ($errors->has('dia_chi'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('dia_chi') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group">
			                        <label class="col-md-4  control-label">Hình thức thanh toán</label>
			                        <div class="col-md-6">
				                        <label class="radio-inline ">
				                            <input name="cach_nhan" value="1" checked="" type="radio">Thanh toán tại cửa hàng (giữ hàng)
				                        </label>
				                        
				                        <label class="radio-inline ">
				                            <input name="cach_nhan" value="2" type="radio">Giao hàng thu tiền tại nhà
				                        </label>
				                    </div>
			                    </div>

		                        <div class="form-group">
		                            <div class="col-md-6 col-md-offset-4">
		                                <button type="submit" class="btn btn-primary">
		                                    Xác nhận
		                                </button>
		                            </div>
		                        </div>
		                    </form>
		                </div>
		            </div>
		        </div>
		    @endif
		</div>

	</div>
@endsection