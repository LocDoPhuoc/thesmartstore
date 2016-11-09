@extends('admin.master')
@section('content')

	<div class="col-lg-12">
        <h1 class="page-header">THÊM ĐIỆN THOẠI</h1>
    </div>
                    <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              
                @if(Session::has('flash_message') && Session::has('status'))
                    <div class="alert alert-{!! Session::get('status') !!} col-sm-12">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
                <form action="{!! route('admin.dien-thoai.postAdd') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                    <div class="form-group{{ $errors->has('ten_dt') ? ' has-error' : '' }}">
                        <label>Tên điện thoại</label>
                        <input class="form-control" name="ten_dt" placeholder="Nhập tên điện thoại" value="{{ old('ten_dt') }}"  autofocus/>
                        @if ($errors->has('ten_dt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ten_dt') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('sltNSX') ? ' has-error' : '' }}">
                        <label>Hãng sản xuất</label>
                        <select class="form-control" name="sltNSX">
                            {{-- @foreach($hangsanxuat as $hsx)
                    
                                <option value="{!! $hsx->id !!}">{!! $hsx->ten !!}</option>

                            @endforeach --}}
                            <?php  getParent($hangsanxuat); ?>
                        </select>
                        @if ($errors->has('sltNSX'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sltNSX') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('txtGia') ? ' has-error' : '' }}">
                        <label>Giá bán</label>
                        <input class="form-control" name="txtGia" placeholder="Nhập đơn giá bán" value="{{ old('txtGia') }}"/>
                        @if ($errors->has('txtGia'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtGia') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtSoLuong') ? ' has-error' : '' }}">
                        <label>Số lượng</label>
                        <input class="form-control" name="txtSoLuong" placeholder="Nhập số lượng điện thoại" value="{{ old('txtSoLuong') }}"/>
                        @if ($errors->has('txtSoLuong'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtSoLuong') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtMota') ? ' has-error' : '' }}">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="txtMota"></textarea>
                        @if ($errors->has('txtMota'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtMota') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group panel panel-info">
                        <label class="panel-heading lb-image">Hình ảnh quảng cáo</label>                      
                        <img id="img1"  src="#" alt="" class="img-load img-responsive">
                        <input id="1" class="input-file" type="file" name="fQuangCao" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <label class="panel-heading lb-image">Hình ảnh đặc điểm nổi bật 1</label>
                        <img id="img2" src="#" alt="" class="img-load img-responsive">
                        <input id="2" class="input-file" type="file" name="fNoiBat1" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <label class="panel-heading lb-image">Hình ảnh đặc điểm nổi bật 2</label>
                        <img id="img3" src="#" alt="" class="img-load img-responsive">
                        <input id="3" class="input-file" type="file" name="fNoiBat2" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <label class="panel-heading lb-image">Hình ảnh đặc điểm nổi bật 3</label>
                        <img id="img4" src="#" alt="" class="img-load img-responsive">
                        <input id="4" class="input-file" type="file" name="fNoiBat3" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <label class="panel-heading lb-image">Hình ảnh đặc điểm nổi bật 4</label>
                        <img id="img5" src="#" alt="" class="img-load img-responsive">
                        <input id="5" class="input-file" type="file" name="fNoiBat4" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <label class="panel-heading lb-image">Hình ảnh đặc điểm nổi bật 5</label>
                        <img id="img6" src="#" alt="" class="img-load img-responsive">
                        <input id="6" class="input-file" type="file" name="fNoiBat5" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <label class="panel-heading lb-image">Hình ảnh mô tả chức năng</label>
                        <img id="img7" src="#" alt="" class="img-load img-responsive">
                        <input id="7" class="input-file" type="file" name="fChucNang" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <label class="panel-heading lb-image">Hình ảnh hiển thị giỏ hàng</label>
                        <img id="img8" src="#" alt="" class="img-load img-responsive">
                        <input id="8" class="input-file" type="file" name="fGioHang" onchange="readURL(this);">
                    </div>

                    <div class="form-group">
                        <label >Trạng thái</label>
                        <?php
                            $data = ['Kinh doanh', 'Không kinh doanh'];
                            setRadioButton("rdoTrangThai", $data,"Kinh doanh");
                        ?>         
                    </div>

                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                    <a href="{!! route('admin.dien-thoai.getList') !!}" class="btn btn-danger">Hủy bỏ</a>
            </form>
    </div>
    @section('script')
        @parent
        <script src="{{ url('public/admin/js/load_image.js') }}"></script>
    @stop
@endsection