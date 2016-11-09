@extends('admin.master')
@section('content')

	<div class="col-lg-12">
        <h1 class="page-header">SỬA QUẢNG CÁO</h1>
    </div>
                    <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              
                @if(Session::has('flash_message') && Session::has('status'))
                    <div class="alert alert-{!! Session::get('status') !!} col-sm-12">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif

            @foreach($quangcao as $qc)
                
                <?php 
                    $dt = DB::table('dien_thoais')->where('id',$qc->id_dt)->get();

                    if ($qc->trang_thai == 1) {
                        $stt  = "Hiển thị";
                    } else {
                        $stt = "Không hiển thị";
                    }
                    
                ?>

                <form action="{!! route('admin.quang-cao.postUpdate') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                    <div class="form-group">
                        <label>Tên điện thoại</label>
                        <input class="form-control" name="" value="{!! $dt[0]->ten_dt !!}" disabled="true" />
                        <input type="hidden" name="id_dt" value="{!! $dt[0]->id !!}"/>
                        <input type="hidden" name="id" value="{!! $qc->id !!}"/>
                    </div>
                    
                    <div class="form-group panel panel-info">
                        <label class="panel-heading lb-image">Hình ảnh</label>                      
                        <img id="img1"  src="{!! url($qc->img) !!}" alt="" class="img-load img-responsive">
                        <input type="hidden" name="old_img" value="{!! $qc->img !!}"/>
                        <input id="1" class="input-file" type="file" name="fHinhAnh" onchange="readURL(this);">
                    </div>

                    <div class="form-group">
                        <label >Trạng thái</label>
                        <?php
                            $data = ['Hiển thị', 'Không hiển thị'];
                            setRadioButton("rdoTrangThai", $data,$stt);
                        ?>         
                    </div>

                    <button type="submit" class="btn btn-success">Sửa</button>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                    <a href="{!! route('admin.quang-cao.getList') !!}" class="btn btn-danger">Hủy bỏ</a>
            </form>
        @endforeach
    </div>
    @section('script')
        @parent
        <script src="{{ url('public/admin/js/update_image.js') }}"></script>
    @stop
@endsection