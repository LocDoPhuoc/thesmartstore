@extends('admin.master')
@section('content')
	<div class="col-lg-12">
        <h1 class="page-header">SỬA THÔNG TIN NGƯỜI DÙNG</h1>
    </div>
                    <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              
                @if(Session::has('flash_message') && Session::has('status'))
                    <div class="alert alert-{!! Session::get('status') !!} col-sm-12">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
                @foreach($user as $usr)
                <?php
                   
                    if ($usr->level == 1) {
                        $stt = "Super Admin";
                    } else {
                        if ($usr->level == 3) {
                            $stt = "Admin";
                        }
                        else{
                            $stt = "Khách hàng";
                        }
                    }
                    
                ?>
                <form action="{!! route('admin.users.postUpdate') !!}" name="frmEdit" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="id" value="{!! $usr->id !!}">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Họ tên</label>
                        <input class="form-control" name="name" value="{{ old('name',isset($usr->name) ? $usr->name : null) }}"/>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{ $usr->email }}" disabled />
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>Mật khẩu</label>
                        <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu" value="{{ old('password',isset($usr->password) ? $usr->password : null) }}" />
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label>Xác nhận mật khẩu</label>
                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận lại mật khẩu" value="{{ old('password',isset($usr->password) ? $usr->password : null) }}"/>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    @if($usr->id != Auth::user()->id)
                        @if(Auth::user()->level != 3)
                            <div class="form-group">
                                <label >Loại người dùng</label>
                                <?php
                                    $data = ['Super Admin', 'Admin', 'Khách hàng'];
                                    setRadioButton("rdoLevel", $data,$stt);
                                ?>         
                            </div>
                        @endif   
                    @endif
                    <button type="submit" class="btn btn-success">Sửa</button>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                    <a href="{!! route('admin.users.getList') !!}" class="btn btn-danger">Hủy bỏ</a>
            </form>
            @endforeach
    </div>
    @section('script')
        @parent
    @stop

@endsection