@extends('admin.master')
@section('content')
	
	<div class="col-lg-12">
        <h1 class="page-header">DANH SÁCH ĐIỆN THOẠI ĐÃ BÁN</h1>
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
                <th>STT</th>
                <th>Tên điện thoại</th>
                <th>Hãng sản xuất</th>
                <th>Giá</th>
                <th>Số lượng đã bán</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>

        <?php $id = 0; ?>
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
                $id = $id + 1;
        	?>

            <tr class="odd gradeX" align="center">
                <td>{!! $id !!}</td>
                <td><a href="{!! url('/admin/chi-tiet-dien-thoai/update/'. $dt->id) !!}">{!! $dt->ten_dt !!}</a></td>
                <td>{!! $nsx[0]->ten !!}</td>
                <td>{!! number_format($gia[0]->gia,0,",",".")!!}{!!" đ"!!}</td>
                <td>{!! $dt->so_luong_ban !!}</td>
                <td>{!! $stt !!}</td>
                <td>
                	<?php  
                		Carbon\Carbon::setlocale('vi');
                		echo Carbon\Carbon::createFromTimeStamp(strtotime($dt->created_at),'Asia/Ho_Chi_Minh')->diffForHumans();
                	?>
                </td>
               
            </tr>
           @endforeach
        </tbody>
    </table>

    @section('script')
        @parent
    @stop

@endsection