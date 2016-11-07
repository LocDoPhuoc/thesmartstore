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
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{!! route('admin.users.delete',[$usr->id]) !!}"> Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('admin.users.getUpdate',[$usr->id]) !!}">Sửa</a></td>
                </tr>
            @endforeach
        </tbody>
             
    </table>

    @section('script')
        @parent
    @stop

@endsection