@extends('admin.master')
@section('content')
    <div class="row state-overview">
        <div class="col-lg-3 col-md-6 col-overview">
            <a href="{!! route('admin.users.getNewList') !!}">
                <section class="panel panel-overview">
                    <div class="symbol ter">
                        <i class="fa fa-user fa-fw"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?php
                                $date = new DateTime();
                                $user = DB::table('users')->where('created_at','LIKE','%'.$date->format('Y-m-d').'%')->count('id');
                                echo $user;
                            ?>
                        </h1>
                        <p>Người dùng mới</p>
                    </div>
                </section>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-overview">
            <a href="{!! route('admin.dien-thoai.getNewList') !!}">
                <section class="panel panel-overview">
                    <div class="symbol red">
                        <i class="fa fa-mobile fa-2x"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?php
                                $date = new DateTime();
                                $dt = DB::table('dien_thoais')->where('created_at','LIKE','%'.$date->format('Y-m-d').'%')->count('id');
                                echo $dt;
                            ?>
                        </h1>
                        <p>Điện thoại mới</p>
                    </div>
                </section>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-overview">
            <a href="{!! route('admin.don-dat-hang.getList') !!}">
                <section class="panel panel-overview">
                    <div class="symbol yellow">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            <?php
                                $phieu = DB::table('phieu_dat_hang_dien_thoais')->where('trang_thai',1)->count('id');
                                echo $phieu;
                            ?>
                        </h1>
                        <p>Đơn hàng mới</p>
                    </div>
                </section>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-overview">
            <section class="panel panel-overview">
                <div class="symbol blue">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value">
                    <h1 class="count">
                        <?php
                            $date = new DateTime();
                            $nsx = DB::table('hang_san_xuats')->where('created_at','LIKE','%'.$date->format('Y-m-d').'%')->count('id');
                            echo $nsx;
                        ?>
                    </h1>
                    <p>Hãng sản xuất mới</p>
                </div>
            </section>
        </div>
    </div>
    
    <div id="main">
        <div class="row">
            <div class="col-lg-4">
                <table class="function_table" style="margin: 0px auto;">
                    <tr class="col-lg-12">
                        <td class="function_item user_add col-lg-6"><a href="{!! route('admin.users.getAdd') !!}">Thêm user</a></td>
                        <td class="function_item user_list col-lg-6"><a href="{!! route('admin.users.getList') !!}">Quản lý user</a></td>
                    </tr>
                    <tr class="col-lg-12">
                        <td class="function_item mobile_add col-lg-6"><a href="{!! route('admin.dien-thoai.getAdd') !!}">Thêm điện thoại</a></td>
                        <td class="function_item mobile_list col-lg-6"><a href="{!! route('admin.dien-thoai.getList') !!}">Quản lý điện thoại</a></td>
                        
                    </tr>
                    <tr class="col-lg-12">
                        <td class="function_item order_new col-lg-6"><a href="{!! route('admin.don-dat-hang.getList') !!}">Đơn đặt hàng chưa duyệt</a></td>
                        <td class="function_item order_ok col-lg-6"><a href="{!! route('admin.don-dat-hang.getOkList') !!}">Đơn đặt hàng đã duyệt</a></td> 
                    </tr>
                </table> 
            </div>
            <div class="col-lg-8">
                <h2 style="color: #681292;">THỐNG KÊ CƠ BẢN VỀ WEBSITE</h2>
                <table class="table table-hover">
                    <tr>
                        <td>Tổng số người dùng:</td>
                        <td>
                            <?php
                                $user = DB::table('users')->count('id');
                                
                            ?>
                            <span class="badge" style="background: #8075c4;">{!! $user !!}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng số điện thoại:</td>
                        <td>
                            <?php
                                $dt = DB::table('dien_thoais')->count('id');
                                
                            ?>
                            <span class="badge" style="background: #a9d86e;">{!! $dt !!}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng số điện thoại đã hết hàng:</td>
                        <td>
                            <?php
                                $dt = DB::table('dien_thoais')->where('so_luong_con',0)->count('id');
                                
                            ?>
                            <span class="badge" style="background: #ff6c60;">{!! $dt !!}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng số điện thoại đang kinh doanh:</td>
                        <td>
                            <?php
                                $dt = DB::table('dien_thoais')->where('trang_thai',1)->count('id');
                                
                            ?>
                            <span class="badge" style="background: #41cac0;">{!! $dt !!}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng số điện thoại ngừng kinh doanh:</td>
                        <td>
                            <?php
                                $dt = DB::table('dien_thoais')->where('trang_thai',2)->count('id');
                            
                            ?>
                            <span class="badge" style="background: #fcb322;">{!! $dt !!}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng số danh mục hãng sản xuất:</td>
                        <td>
                            <?php
                                $nsx = DB::table('hang_san_xuats')->where('trang_thai',1)->count('id');
                                
                            ?>
                            <span class="badge" style="background: #555555;">{!! $nsx !!}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng số đơn đặt hàng chưa duyệt:</td>
                        <td>
                            <?php
                                $phieu = DB::table('phieu_dat_hang_dien_thoais')->where('trang_thai',1)->count('id');
                                
                            ?>
                            <span class="badge" style="background: #4fb5db;">{!! $phieu !!}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>Tổng số đơn đặt hàng đã nhận:</td>
                        <td>
                            <?php
                                $phieu = DB::table('phieu_dat_hang_dien_thoais')->count('id');  
                            ?>
                            <span class="badge" style="background: #681292;">{!! $phieu !!}</span>
                        </td>
                    </tr>
                </table> 
            </div> 
        </div> 
    </div>
    @section('script')
        @parent
        <script src="{{ url('public/admin/js/load_image.js') }}"></script>
    @stop
@endsection