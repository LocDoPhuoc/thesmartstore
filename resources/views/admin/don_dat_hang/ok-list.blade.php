@extends('admin.master')
@section('content')
	
	<div class="col-lg-12">
        <h1 class="page-header">DANH SÁCH ĐƠN ĐẶT HÀNG ĐÃ DUYỆT</h1>
    </div>

    @if(Session::has('flash_message') && Session::has('status'))
		<div class="alert alert-{!! Session::get('status') !!} col-sm-12">
			{!! Session::get('flash_message') !!}
		</div>
	@endif
        <!-- /.col-lg-12 -->

   
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Khách hàng</th>
                <th>Tổng số tiền</th>
                <th>Ngày đặt hàng</th>
                <th>Ngày nhận hàng</th>
                <th>Phương thức nhận hàng</th>
                <th>Admin duyệt đơn hàng</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($phieu as $pdh)
                <?php
                    $khach = App\KhachHang::where('id',$pdh->id_kh)->select('ho_ten')->get();
                    $admin = App\User::where('id',$pdh->id_admin)->select('name')->get();
                    if ($pdh->trang_thai == 1) {
                        $stt = "Chưa duyệt";
                    } 
                    else {
                        $stt = "Đã duyệt";
                    }
                    $ngayNhan = new DateTime($pdh->ngay_nhan);
                    $ngayNhan = $ngayNhan->format('d-m-Y');
                    $ngayDat = new DateTime($pdh->ngay_dat);
                    $ngayDat = $ngayDat->format('d-m-Y');
                ?>
                <tr class="odd gradeX" align="center">
                    
                    <td>{!! $pdh->id !!}</td>
                    <td><a href="#">{!! $khach[0]->ho_ten !!}</a></td>
                    <td>{!! $pdh->tong_tien !!}{!!" đ"!!}</td>
                    <td>{!! $ngayDat !!}</td>
                    <td>{!! $ngayNhan !!}</td>
                    <td>{!! $pdh->cach_nhan !!}</th>
                    <td>{!! $admin[0]->name !!}</th>
                    <td>{!! $stt !!}</th>
                    
                </tr>

            @endforeach
        </tbody>
    </table>
 
    @section('script')
        @parent
    @stop

@endsection