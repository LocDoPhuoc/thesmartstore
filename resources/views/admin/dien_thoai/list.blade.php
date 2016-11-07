@extends('admin.master')
@section('content')
	
	<div class="col-lg-12">
        <h1 class="page-header">DANH SÁCH ĐIỆN THOẠI</h1>
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
                <th>Tên điện thoại</th>
                <th>Hãng sản xuất</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Số lượng còn lại</th>
                <th>Số lượng đã bán</th>
                <th>Ngày tạo</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($data as $dt)
        	<?php  
        		$nsx = App\HangSanXuat::where('id',$dt->id_nsx)->select('ten')->get();
        		$gia = App\GiaDienThoai::where('id_dt',$dt->id)->select('gia')->get();
        		if($dt->trang_thai == 1){
        			$stt = "Kinh doanh";
        		}
        		else{
        			$stt = "Không kinh doanh";
        		}
        	?>

            <tr class="odd gradeX" align="center">
                <td>{!! $dt->id !!}</td>
                <td><a href="{!! url('/ploc1411_admin/chi-tiet-dien-thoai/update/'. $dt->id) !!}">{!! $dt->ten_dt !!}</a></td>
                <td>{!! $nsx[0]->ten !!}</td>
                <td>{!! number_format($gia[0]->gia,0,",",".")!!}{!!" đ"!!}</td>
                <td>{!! $stt !!}</td>
                <td>{!! $dt->so_luong_con !!}</td>
                <td>{!! $dt->so_luong_ban !!}</td>
                <td>
                	<?php  
                		Carbon\Carbon::setlocale('vi');
                		echo Carbon\Carbon::createFromTimeStamp(strtotime($dt->created_at),'Asia/Ho_Chi_Minh')->diffForHumans();
                	?>
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('admin.dien-thoai.Delete',[$dt->id]) !!}"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.dien-thoai.getUpdate',[$dt->id]) !!}">Sửa</a></td>
            </tr>
           @endforeach
        </tbody>
    </table>

    @section('script')
        @parent
    @stop

@endsection