@extends('admin.master')
@section('content')

	<div class="col-lg-12">
        <h1 class="page-header">THÊM NGƯỜI DÙNG</h1>
    </div>
                    <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              
                @if(Session::has('flash_message') && Session::has('status'))
                    <div class="alert alert-{!! Session::get('status') !!} col-sm-12">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
                <form action="{!! route('admin.users.postAdd') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>Họ tên</label>
                        <input class="form-control" name="name" placeholder="Nhập họ tên" value="{{ old('name') }}"  autofocus/>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label>Email</label>
                        <input class="form-control" name="email" placeholder="Nhập email" value="{{ old('email') }}"  autofocus/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>Mật khẩu</label>
                        <input class="form-control" name="password" placeholder="Nhập mật khẩu" value="{{ old('password') }}"  autofocus/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >Loại người dùng</label>
                        <?php
                            if (Auth::user()->level == 1) {
                                $data = ['Khách hàng', 'Admin'];
                            } else {
                                $data = ['Admin'];
                            }
                            
                            setRadioButton("rdoLevel", $data,"Admin");
                        ?>         
                    </div>

                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                    <a href="{!! route('admin.users.getList') !!}" class="btn btn-danger">Hủy bỏ</a>
                </form>
    </div>
    @section('script')
        @parent
    @stop
@endsection