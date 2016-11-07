@extends('admin.master')
@section('content')
	
	<div class="col-lg-12">
        <h1 class="page-header">DANH SÁCH ĐƠN ĐẶT HÀNG CHƯA DUYỆT</h1>
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
                <th>Tên khách hàng</th>
                <th>Tổng số tiền</th>
                <th>Ngày đặt hàng</th>
                <th>Ngày nhận hàng</th>
                <th>Phương thức nhận hàng</th>
                <th>Trạng thái</th>
                <th>Duyệt</th>
            </tr>
        </thead>
        <tbody>
            @foreach($phieu as $pdh)
                <?php
                    $khach = App\KhachHang::where('id',$pdh->id_kh)->select('ho_ten')->get();
                    if ($pdh->trang_thai == 1) {
                        $stt = "Chưa duyệt";
                    } 
                    else {
                        $stt = "Đã duyệt";
                    }
                    
                ?>
                <tr class="odd gradeX" align="center">
                    @if($pdh->trang_thai == 1)
                        <td>{!! $pdh->id !!}<img src="{!! asset("public/admin/images/new.png") !!}" class="img-responesive" height="50" width="40" alt=""></td>
                    @else
                        <td>{!! $pdh->id !!}</td>
                    @endif
                    <td><a href="#">{!! $khach[0]->ho_ten !!}</a></td>
                    <td>{!! $pdh->tong_tien !!}{!!" đ"!!}</td>
                    <td>
                        <?php  
                            Carbon\Carbon::setlocale('vi');
                            echo Carbon\Carbon::createFromTimeStamp(strtotime($pdh->ngay_dat),'Asia/Ho_Chi_Minh')->diffForHumans();
                        ?>
                    </td>

                    <td>
                        <?php  
                            if ($pdh->ngay_nhan == NULL) {
                                echo "Đang cập nhật";
                            } else {
                                    
                                Carbon\Carbon::setlocale('vi');
                                echo Carbon\Carbon::createFromTimeStamp(strtotime($pdh->ngay_nhan),'Asia/Ho_Chi_Minh')->diffForHumans();
                            }
                            
                        ?>
                    </td>

                    <td>{!! $pdh->cach_nhan !!}</th>
                    <td>{!! $stt !!}</th>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.don-dat-hang.getDetail',[$pdh->id]) !!}" >Duyệt</a></td>
                    
                </tr>

            @endforeach
        </tbody>
    </table>
 
    @section('script')
        @parent
        
    @stop

@endsection