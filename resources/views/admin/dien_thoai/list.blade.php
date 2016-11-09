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
                <td class="center">
                    <form class="delete" action="{!! route('admin.dien-thoai.delete',[$dt->id]) !!}" method="POST" style="display: inline;">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <i class="fa fa-trash-o  fa-fw"></i><a type="submit" name="delete-select">Xóa</a>
                    </form>
                </td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.dien-thoai.getUpdate',[$dt->id]) !!}">Sửa</a></td>
            </tr>
           @endforeach
        </tbody>
    </table>

    <div id="delete-confirm" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Xác nhận</h4>
                </div>        
                <div class="modal-body">Bạn muốn xóa điện thoại này?</div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Xóa</button>
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy bỏ</button>
                </div>        
            </div>
        </div>
    </div>

    @section('script')
        @parent
        <script>
            $(document).ready(function(){
                // new WOW().init();
                $('a[name="delete-select"]').on('click', function(e){
                    var $form=$(this).closest('form'); 
                    e.preventDefault();
                    $('#delete-confirm').modal({ backdrop: 'static', keyboard: false })
                        .one('click', '#delete', function() {
                            $form.trigger('submit');
                        });
                });            
            });
        </script>
    @stop

@endsection