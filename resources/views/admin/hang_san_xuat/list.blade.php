@extends('admin.master')
@section('content')
	
	<div class="col-lg-12">
        <h1 class="page-header">DANH SÁCH HÃNG SẢN XUẤT</h1>
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
                <th>Tên hãng sản xuất</th>
                <th>Số lượng điện thoại</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($hangSX as $nsx)
        	<?php  
        		$dt = App\DienThoai::where('id_nsx',$nsx->id)->where('trang_thai',1)->count();
                if ($nsx->trang_thai == 1) {
                    $stt = "Kinh doanh";
                } else {
                    $stt = "Không kinh doanh";
                }
                
        	?>

            <tr class="odd gradeX" align="center">
                <td>{!! $nsx->id !!}</td>
                <td><a href="#">{!! $nsx->ten !!}</a></td>
                <td>{!! $dt !!}</td>
                <td>{!! $stt !!}</td>
                <td>
                	<?php  
                		Carbon\Carbon::setlocale('vi');
                		echo Carbon\Carbon::createFromTimeStamp(strtotime($nsx->created_at),'Asia/Ho_Chi_Minh')->diffForHumans();
                	?>
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('admin.hang-san-xuat.delete',[$nsx->id]) !!}"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.hang-san-xuat.getUpdate',[$nsx->id]) !!}">Sửa</a></td>
            </tr>
           @endforeach
        </tbody>
    </table>

    @section('script')
        @parent
    @stop

@endsection