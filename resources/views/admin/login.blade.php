<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - The Smart Store</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{!! url('public/admin/css/adminCSS.css') !!}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="{!!asset('public/smartstore/js/jquery-1.11.3.min.js')!!}" ></script>
</head>

<body>
	<div class="container">
		<div class="row pn-login">
			<div class="col-md-8 col-md-offset-2 pn-form">
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
	                         
	                        <form  class="form-horizontal" role="form" action="{!! route('postAdminLogin') !!}" method="POST" name="frm-login">
	                              	
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
	                                    <button  href="" class="btn btn-primary" type="submit">
	                                    	<span class="glyphicon glyphicon-ok-circle"></span>  Đăng nhập
	                                    </button>

	                                </div>
	                            </div>  
	                        </form>     



	                    </div>
	                </div>                     
                </div>
			</div>
		</div>
	</div>
</body>

</html>