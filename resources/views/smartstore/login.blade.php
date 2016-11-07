@extends('smartstore.master')
@section('title',' - Đăng nhập')
@section('main')
	<div class="container">
		<div class="row pn-login">
			<div class="col-xs-12 pn-form">
				<div class="panel panel-info pn-logininfo">
                    <div class="panel-heading">
                        <div class="panel-title">Đăng nhập</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Quên mật khẩu?</a></div>
                    </div>   

                    <div class="panel-body">
						<div class=" col-lg-8 col-lg-offset-2">
							
								@if(Session::has('flash_message'))
			                        <div class="alert alert-danger col-sm-12">
			                        	
			                        	{!! Session::get('flash_message') !!}
			                        </div>
		                        @endif
	                         
	                        <form  class="form-horizontal" role="form" action="{{ route('postLogin') }}" method="POST" name="frm-login">
	                        	                    	
	                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">    
	                             
	                            <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                                <span class="input-group-addon">
	                                	<i class="glyphicon glyphicon-user"></i>
	                                	Người dùng
	                                </span>
	                                <input  type="text" class="form-control" name="email" value="{{ old('email') }}" autofocus placeholder="{!! $errors->has('email')?$errors->first('email'):"Nhập email" !!}"> 
	                                                            
	                            </div>

	                            <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                                <span class="input-group-addon">
	                                	<i class="glyphicon glyphicon-lock"></i>
	                                	Mật khẩu
	                                </span>
	                                <input  type="password" class="form-control" name="password" value="{{ old('password') }}" autofocus placeholder="{!! $errors->has('password')?$errors->first('password'):"Nhập mật khẩu" !!}">
	                       
	                            </div>
	                               

	                                
	                            <div class="input-group">
	                                <div class="checkbox">
	                                    <label>
	                                       	<input id="login-remember" type="checkbox" name="remember" value="1"> Ghi nhớ tôi
	                                    </label>
	                                </div>
	                            </div>


	                            <div style="margin-top:10px" class="form-group">
	                                    <!-- Button -->

	                                <div class="col-sm-12 controls">
	                     	
	                                    <a id="btn-login" href="{!! url(Session::get('url')) !!}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Huỷ bỏ </a>
	                                    <button  href="" class="btn btn-primary" type="submit">
	                                    	<span class="glyphicon glyphicon-ok-circle"></span>  Đăng nhập
	                                    </button>

	                                </div>
	                            </div>


	                                <div class="form-group">
	                                    <div class="col-md-12 control">
	                                        <div style="border-top: 1px solid#888; padding-top:30px; font-size:90%">
	                                            Bạn chưa có tài khoản! 
	                                        <a href="{!! route('register.create') !!}">
	                                            Đăng ký tại đây
	                                        </a>
	                                        </div>
	                                    </div>
	                                </div>    
	                        </form>     



	                    </div>
	                </div>                     
                </div>
			</div>
		</div>
	</div>
@stop