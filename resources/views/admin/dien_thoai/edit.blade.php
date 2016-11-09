@extends('admin.master')
@section('content')
    <script src="{{ url('public/admin/js/delete_image.js') }}"></script>
	<div class="col-lg-12">
        <h1 class="page-header">SỬA ĐIỆN THOẠI</h1>
    </div>
                    <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              
                @if(Session::has('flash_message') && Session::has('status'))
                    <div class="alert alert-{!! Session::get('status') !!} col-sm-12">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
                @foreach($dienthoai as $dt)
                <?php
                    $gia = App\GiaDienThoai::where('id_dt',$dt->id)->get();
                    $img_quangcao = App\HinhAnhDienThoai::where('hinh_dt',$dt->id)->where('loai_hinh',1)->get();
                    $img_dacdiem = App\HinhAnhDienThoai::where('hinh_dt',$dt->id)->where('loai_hinh',2)->get();
                    $img_chucnang = App\HinhAnhDienThoai::where('hinh_dt',$dt->id)->where('loai_hinh',3)->get();
                    $img_giohang = App\HinhAnhDienThoai::where('hinh_dt',$dt->id)->where('loai_hinh',4)->get();

                    if ($dt->trang_thai == 1) {
                        $stt = "Kinh doanh";
                    } else {
                        $stt = "Không kinh doanh";
                    }
                    
                ?>
                <form action="{!! route('admin.dien-thoai.postUpdate') !!}" name="frmEdit" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="id_dt" value="{!! $dt->id !!}">

                    <div class="form-group{{ $errors->has('ten_dt') ? ' has-error' : '' }}">
                        <label>Tên điện thoại</label>
                        <input class="form-control" name="ten_dt" placeholder="Nhập tên điện thoại" value="{{ old('ten_dt',isset($dt->ten_dt) ? $dt->ten_dt : null) }}"/>
                        @if ($errors->has('ten_dt'))
                            <span class="help-block">
                                <strong>{{ $errors->first('ten_dt') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('sltNSX') ? ' has-error' : '' }}">
                        <label>Hãng sản xuất</label>
                        <select class="form-control" name="sltNSX">
                            <?php  getParent($hangsanxuat, $dt->id_nsx); ?>
                        </select>
                        @if ($errors->has('sltNSX'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sltNSX') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('txtGia') ? ' has-error' : '' }}">
                        <label>Giá bán</label>
                        <input class="form-control" name="txtGia" placeholder="Nhập đơn giá bán" value="{{ old('txtGia',isset($gia[0]->gia) ? $gia[0]->gia : null) }}"/>
                        @if ($errors->has('txtGia'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtGia') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtSoLuong') ? ' has-error' : '' }}">
                        <label>Số lượng</label>
                        <input class="form-control" name="txtSoLuong" placeholder="Nhập số lượng điện thoại" value="{{ old('txtSoLuong',isset($dt->so_luong_con) ? $dt->so_luong_con : null) }}"/>
                        @if ($errors->has('txtSoLuong'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtSoLuong') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtMota') ? ' has-error' : '' }}">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="3" name="txtMota">{{ old('txtMota',isset($dt->mo_ta) ? $dt->mo_ta : null) }}</textarea>
                        @if ($errors->has('txtMota'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtMota') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group panel panel-info">
                        <input type="hidden" name="img_quangcao" value="{!! $img_quangcao[0]->id !!}">
                        <label class="panel-heading lb-image">Hình ảnh quảng cáo</label>
                        <img id="{!! $img_quangcao[0]->id !!}" url="{!! $img_quangcao[0]->url !!}" name="img-detail" src="{!! url($img_quangcao[0]->url) !!}" alt="Hình ảnh quảng cáo" class="img-detail img-responsive">                     
                        <button id="{!! "bt" . $img_quangcao[0]->id  !!}" type="button" class="btn btn-warning delete-img">Sửa</button> 
                        <img id="{!! "img" . "ip" . $img_quangcao[0]->id !!}"  src="#" alt="" class="img-load img-responsive">
                        <input id="{!! "ip" . $img_quangcao[0]->id  !!}" class="input-file" type="file" name="fQuangCao" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <input type="hidden" name="img_dacdiem1" value="{!! $img_dacdiem[0]->id !!}">
                        <label class="panel-heading lb-image">Hình ảnh đặc điểm nổi bật 1</label>
                        <img  id="{!! $img_dacdiem[0]->id !!}" url="{!! $img_dacdiem[0]->url !!}" name="img-detail" src="{!! url($img_dacdiem[0]->url) !!}" alt="Hình ảnh đặc điểm nổi bật 1" class="img-detail img-responsive"> 
                        <button  id="{!! "bt" . $img_dacdiem[0]->id  !!}" type="button" class="btn btn-warning delete-img" >Sửa</button> 
                        <img id="{!! "img" . "ip" . $img_dacdiem[0]->id !!}" src="#" alt="" class="img-load img-responsive">
                        <input id="{!! "ip" . $img_dacdiem[0]->id  !!}" class="input-file" type="file" name="fNoiBat1" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <input type="hidden" name="img_dacdiem2" value="{!! $img_dacdiem[1]->id !!}">
                        <label class="panel-heading lb-image">Hình ảnh đặc điểm nổi bật 2</label>
                        <img id="{!! $img_dacdiem[1]->id !!}" url="{!! $img_dacdiem[1]->url !!}" name="img-detail" src="{!! url($img_dacdiem[1]->url) !!}" alt="Hình ảnh đặc điểm nổi bật 2" class="img-detail img-responsive"> 
                        <button  id="{!! "bt" . $img_dacdiem[1]->id  !!}"  type="button" class="btn btn-warning delete-img" href="" title="">Sửa</button> 
                        <img id="{!! "img" . "ip" . $img_dacdiem[1]->id !!}" src="#" alt="" class="img-load img-responsive">
                        <input id="{!! "ip" . $img_dacdiem[1]->id  !!}" class="input-file" type="file" name="fNoiBat2" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <input type="hidden" name="img_dacdiem3" value="{!! $img_dacdiem[2]->id !!}">
                        <label class="panel-heading lb-image">Hình ảnh đặc điểm nổi bật 3</label>
                        <img id="{!! $img_dacdiem[2]->id !!}" url="{!! $img_dacdiem[2]->url !!}" name="img-detail" src="{!! url($img_dacdiem[2]->url) !!}" alt="Hình ảnh đặc điểm nổi bật 3" class="img-detail img-responsive"> 
                        <button   id="{!! "bt" . $img_dacdiem[2]->id  !!}" type="button" class="btn btn-warning delete-img" href="" title="">Sửa</button> 
                        <img id="{!! "img" . "ip" . $img_dacdiem[2]->id !!}" src="#" alt="" class="img-load img-responsive">
                        <input id="{!! "ip" . $img_dacdiem[2]->id  !!}" class="input-file" type="file" name="fNoiBat3" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <input type="hidden" name="img_dacdiem4" value="{!! $img_dacdiem[3]->id !!}">
                        <label class="panel-heading lb-image">Hình ảnh đặc điểm nổi bật 4</label>
                        <img id="{!! $img_dacdiem[3]->id !!}" url="{!! $img_dacdiem[3]->url !!}" name="img-detail" src="{!! url($img_dacdiem[3]->url) !!}" alt="Hình ảnh đặc điểm nổi bật 4" class="img-detail img-responsive"> 
                        <button  id="{!! "bt" . $img_dacdiem[3]->id  !!}"  type="button" class="btn btn-warning delete-img" href="" title="">Sửa</button> 
                        <img id="{!! "img" . "ip" . $img_dacdiem[3]->id !!}" src="#" alt="" class="img-load img-responsive">
                        <input id="{!! "ip" . $img_dacdiem[3]->id  !!}" class="input-file" type="file" name="fNoiBat4" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <input type="hidden" name="img_dacdiem5" value="{!! $img_dacdiem[4]->id !!}">
                        <label class="panel-heading lb-image">Hình ảnh đặc điểm nổi bật 5</label>
                        <img id="{!! $img_dacdiem[4]->id !!}" url="{!! $img_dacdiem[4]->url !!}" name="img-detail" src="{!! url($img_dacdiem[4]->url) !!}" alt="Hình ảnh đặc điểm nổi bật 5" class="img-detail img-responsive"> 
                        <button  id="{!! "bt" . $img_dacdiem[4]->id  !!}" type="button" class="btn btn-warning delete-img" href="" title="">Sửa</button> 
                        <img id="{!! "img" . "ip" . $img_dacdiem[4]->id !!}" src="#" alt="" class="img-load img-responsive">
                        <input id="{!! "ip" . $img_dacdiem[4]->id  !!}" class="input-file" type="file" name="fNoiBat5" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <input type="hidden" name="img_chucnang" value="{!! $img_chucnang[0]->id !!}">
                        <label class="panel-heading lb-image">Hình ảnh mô tả chức năng</label>
                        <img id="{!! $img_chucnang[0]->id !!}" url="{!! $img_chucnang[0]->url !!}" name="img-detail" src="{!! url($img_chucnang[0]->url) !!}" alt="Hình ảnh mô tả chức năng" class="img-detail img-responsive"> 
                        <button  id="{!! "bt" . $img_chucnang[0]->id  !!}"  type="button" class="btn btn-warning delete-img" href="" title="">Sửa</button> 
                        <img id="{!! "img" . "ip" . $img_chucnang[0]->id !!}" src="#" alt="" class="img-load img-responsive">
                        <input id="{!! "ip" . $img_chucnang[0]->id  !!}" class="input-file" type="file" name="fChucNang" onchange="readURL(this);">
                    </div>

                    <div class="form-group panel panel-info">
                        <input type="hidden" name="img_giohang" value="{!! $img_giohang[0]->id !!}">
                        <label class="panel-heading lb-image">Hình ảnh hiển thị giỏ hàng</label>
                        <img id="{!! $img_giohang[0]->id !!}" url="{!! $img_giohang[0]->url !!}" name="img-detail" src="{!! url($img_giohang[0]->url) !!}" alt="Hình ảnh hiển thị giỏ hàng" class="img-detail img-responsive"> 
                        <button   id="{!! "bt" . $img_giohang[0]->id !!}" type="button" class="btn btn-warning delete-img" href="" title="">Sửa</button> 
                        <img id="{!! "img" . "ip" . $img_giohang[0]->id !!}" src="#" alt="" class="img-load img-responsive">
                        <input id="{!! "ip" . $img_giohang[0]->id !!}"class="input-file" type="file" name="fGioHang" onchange="readURL(this);">
                    </div>

                    <div class="form-group">
                        <label >Trạng thái</label>
                        <?php
                            $data = ['Kinh doanh', 'Không kinh doanh'];
                            setRadioButton("rdoTrangThai", $data, $stt);
                        ?>         
                    </div>

                    <button type="submit" class="btn btn-success">Sửa</button>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                    <a href="{!! route('admin.dien-thoai.getList') !!}" class="btn btn-danger">Hủy bỏ</a>
            </form>
            @endforeach
    </div>
    @section('script')
        @parent
        <script src="{{ url('public/admin/js/load_image.js') }}"></script>
        <script src="{{ url('public/admin/js/delete_image.js') }}"></script>
    @stop

@endsection