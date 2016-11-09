@extends('admin.master')
@section('content')

	<div class="col-lg-12">
        <h1 class="page-header">THÊM QUẢNG CÁO</h1>
    </div>
                    <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              
                @if(Session::has('flash_message') && Session::has('status'))
                    <div class="alert alert-{!! Session::get('status') !!} col-sm-12">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
                <form action="{!! route('admin.quang-cao.postAdd') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                    <div class="form-group">
                        <label>Tên điện thoại</label>
                        <select class="form-control" name="sltDienThoai">
                            <?php  getMobileSelect($dienthoai); ?>
                        </select>
                        
                    </div>
                    
                    <div class="form-group panel panel-info">
                        <label class="panel-heading lb-image">Hình ảnh</label>                      
                        <img id="img1"  src="#" alt="" class="img-load img-responsive">
                        <input id="1" class="input-file" type="file" name="fHinhAnh" onchange="readURL(this);">
                    </div>

                    <div class="form-group">
                        <label >Trạng thái</label>
                        <?php
                            $data = ['Hiển thị', 'Không hiển thị'];
                            setRadioButton("rdoTrangThai", $data,"Hiển thị");
                        ?>         
                    </div>

                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                    <a href="{!! route('admin.quang-cao.getList') !!}" class="btn btn-danger">Hủy bỏ</a>
            </form>
    </div>
    @section('script')
        @parent
        <script src="{{ url('public/admin/js/load_image.js') }}"></script>
    @stop
@endsection