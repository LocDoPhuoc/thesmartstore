@extends('admin.master')
@section('content')
	
	<div class="col-lg-12">
        <h1 class="page-header">DANH SÁCH NGƯỜI DÙNG</h1>
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
                <th>Họ tên</th>
                <th>Email</th>
                <th>Loại người dùng</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thead>

        <tbody>
            @foreach($user as $usr)
                <?php 
                    $level = App\LoaiNguoiDung::where('id',$usr->level)->select('ten_loai')->get();
                    if ($usr->status == 1) {
                        $stt = "Hoạt động";
                    } else {
                        $stt = "Đã khóa";
                    }
                    
                ?>
                <tr class="odd gradeX" align="center">
                    <td>{!! $usr->id !!}</td>
                    <td>{!! $usr->name !!}</td>
                    <td>{!! $usr->email !!}</td>
                    <td>{!! $level[0]->ten_loai !!}</td>
                    <td>{!! $stt !!}</td>
                    <td>
                        <?php  
                            Carbon\Carbon::setlocale('vi');
                            echo Carbon\Carbon::createFromTimeStamp(strtotime($usr->created_at),'Asia/Ho_Chi_Minh')->diffForHumans();
                        ?>
                    </td>
                    <td class="center">
                        <form class="delete" action="{!! route('admin.users.delete',[$usr->id]) !!}" method="POST" style="display: inline;">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <i class="fa fa-trash-o  fa-fw"></i><a type="submit" name="delete-select">Xóa</a>
                        </form>
                    </td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.users.getUpdate',[$usr->id]) !!}">Sửa</a></td>
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
                <div class="modal-body">Bạn muốn xóa người dùng này?</div>
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