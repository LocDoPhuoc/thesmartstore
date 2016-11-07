@extends('admin.master')
@section('content')
	
	<div class="col-lg-12">
        <h1 class="page-header" align="center">CHI TIẾT ĐƠN ĐẶT HÀNG</h1>
    </div>

    @if(Session::has('flash_message') && Session::has('status'))
		<div class="alert alert-{!! Session::get('status') !!} col-sm-12">
			{!! Session::get('flash_message') !!}
		</div>
	@endif
        <!-- /.col-lg-12 -->
    <form class="form-horizontal col-md-8 col-md-offset-2" action="{!! route('admin.don-dat-hang.checkDetail') !!}" method="POST">
        
        <?php
            foreach ($phieu as $pdh) {
                $total = $pdh->tong_tien;
                $id = $pdh->id;
            }
        ?>
        
        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="id" value="{!! $id !!}">

        <div class="panel panel-info">
        @foreach($khach as $kh)
            <h3 class="panel-heading panel-title">Thông tin khách hàng</h3>
            <div class="form-group">
                <label class="col-md-3 col-md-offset-2 control-label" style="text-align: left;">Họ tên:</label>
                <div class="col-md-6">
                    <p style="padding-top: 6px;">{!! $kh->ho_ten !!}</p>            
                </div>
            </div>  
            <div class="form-group">
                <label for="name" class="col-md-3 col-md-offset-2 control-label" style="text-align: left;">Giới tính:</label>
                <div class="col-md-6">
                    <p style="padding-top: 6px;">{!! $kh->gioi_tinh !!}</p>
                </div>
            </div> 
            <div class="form-group">
                <label for="name" class="col-md-3 col-md-offset-2 control-label" style="text-align: left;">Số điện thoại:</label>
                <div class="col-md-6">
                    <p style="padding-top: 6px;">{!! $kh->sdt !!}</p>
                </div>
            </div> 
            <div class="form-group">
                <label for="name" class="col-md-3 col-md-offset-2 control-label" style="text-align: left;">Email:</label>
                <div class="col-md-6">
                    <p style="padding-top: 6px;">{!! $kh->email !!}</p>
                </div>
            </div> 
            <div class="form-group">
                <label for="name" class="col-md-3 col-md-offset-2 control-label" style="text-align: left;">Địa chỉ:</label>
                <div class="col-md-6">
                    <p style="padding-top: 6px;">{!! $kh->dia_chi !!}</p>
                </div>
            </div> 
            <div class="form-group">
                <label for="name" class="col-md-3 col-md-offset-2 control-label" style="text-align: left;">Ngày đặt hàng:</label>
                <div class="col-md-6">
                    <p style="padding-top: 6px;">{!! $ngay !!}</p>
                </div>
            </div> 
            <div class="form-group">
                <label for="name" class="col-md-3 col-md-offset-2 control-label" style="text-align: left;">Ngày nhận hàng:</label>
                <div class="col-md-6">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' name="txtNgayNhan" class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div> 
        @endforeach
        </div>
        <table class="table table-striped table-bordered table-hover table-responsive col-xs-12" >
            <thead>
                <tr align="center">
                    <th>STT</th>
                    <th>Tên điện thoại</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Duyệt</th>
                    {{-- <th>Xóa</th> --}}
                </tr>
            </thead>
                
            <?php $stt = 0; ?>
            @foreach($chitiet as $ct)
                <?php
                    $stt = $stt + 1; 
                    $dt = App\DienThoai::where('id',$ct->id_dt)->select('ten_dt')->get();
                ?>
                <tbody>
                    <td>{!! $stt !!}</td>
                    <td>{!! $dt[0]->ten_dt !!}</td>
                    <td>{!! $ct->so_luong !!}</td>
                    <td>{!! number_format($ct->don_gia,0,",",".") !!}{!! " đ" !!}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="" >Kiểm tra</a></td>
                </tbody>
            @endforeach
                
        </table>

        <div class="pull-right" style="padding-bottom: 100px;">
            <table class="table">
                <tr>
                    <td class="total"><span class="extra bold totalamout">Tổng tiền :</span></td>
                    <td class="total"><span class="bold totalamout">{!! $total !!} đồng</span></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-success">Duyệt</button>
            <a class="btn btn-danger" href="{!! route('admin.don-dat-hang.delete',[$id]) !!}">Hủy bỏ</a>
        </div>
                
     
    </form>
                  
    
 
    @section('script')
        @parent
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
    @stop

@endsection