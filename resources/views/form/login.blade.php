<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login Form</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">

			{{-- @if(count($errors)>0)
				<ul>
					@foreach($errors->all() as $e)
						<li>{!! $e !!}</li>
					@endforeach
					
				</ul>
			@endif --}}
			<form class="form-horizontal col-md-6 col-md-offset-2" action="{!! route('check-login') !!}" method="POST" name="frmLogin">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				{{-- Token bao ve form an toan hon, khi gui request len no se kiem tra token co hay la khong --}}
				<h1 style="text-align : center;">Login Form</h1>
			  	<div class="form-group">
				    <label class="control-label col-sm-2" for="email">Username:</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="txtUser" id="email" placeholder="Enter username">
				      
				    </div>
			  	</div>
			    <div class="form-group">
				    <label class="control-label col-sm-2" for="pwd">Password:</label>
				    <div class="col-sm-10"> 
				      <input type="password" class="form-control" name="txtPwd" id="pwd" placeholder="Enter password">
				    </div>
			    </div>
			    <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <div class="checkbox">
				        <label><input type="checkbox"> Remember me</label>
				      </div>
				    </div>
			    </div>
			    <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="button" class="btn btn-default"><a href="2">Dang ky</a></button>
				      <button type="submit" class="btn btn-default">Dang nhap</button>
				    </div>
				    
			    </div>
			</form>
		</div>
	</div>
	
</body>
</html>