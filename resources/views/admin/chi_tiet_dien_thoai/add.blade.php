@extends('admin.master')
@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">THÊM CHI TIẾT ĐIỆN THOẠI</h1>
    </div>
                    <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              
                @if(Session::has('flash_message') && Session::has('status'))
                    <div class="alert alert-{!! Session::get('status') !!} col-sm-12">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
                <form action="{!! route('admin.chi-tiet-dien-thoai.postAdd') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="id_dt" value="{!! $id_dt !!}">

                    <div class="form-group">
                        <label>Tên điện thoại</label>
                        <input class="form-control" name="ten_dt" value="{{ $ten }}"  disabled/>
                        
                    </div>

                    <div class="form-group{{ $errors->has('txtMauSac') ? ' has-error' : '' }}">
                        <label>Màu sắc</label>
                        <input class="form-control" name="txtMauSac" placeholder="Nhập màu sắc của điện thoại" value="{{ old('txtMauSac') }}"/>
                        @if ($errors->has('txtMauSac'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtMauSac') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Công nghệ màn hình</label>
                        <?php 
                            $data = [
                                'IPS LCD',
                                'Super IPS LCD',
                                'AMOLED',
                                'Super AMOLED',
                                'LED-backlit IPS LCD',
                                'PLS LCD',
                                'TRILUMINOS',
                            ]; 
                            setSelect("sltCongNgheMH", $data); 
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Kích thước màn hình (inch)</label>
                        <?php 
                            $data = [
                                '3.5',
                                '4',
                                '4.7',
                                '5',
                                '5.2',
                                '5.5',
                                '5.7',
                                '6',
                            ]; 
                            setSelect("sltKichThuocMH", $data); 
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Độ phân giải màn hình</label>
                        <?php 
                            $data = [
                                '640 x 1136',
                                '720 x 1280',
                                '1080 x 1920',
                                '1440 x 2560',
                            ]; 
                            setSelect("sltDoPhanGiaiMH", $data); 
                        ?>
                    </div>


                    <div class="form-group{{ $errors->has('txtCamUng') ? ' has-error' : '' }}">
                        <label>Cảm ứng</label>
                        <input class="form-control" name="txtCamUng" placeholder="Nhập công nghệ cảm ứng" value="{{ old('txtCamUng') }}"/>
                        @if ($errors->has('txtCamUng'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtCamUng') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Mặt kính cảm ứng</label>
                        <?php 
                            $data = [
                                'Kính thường',
                                'Kính cường lực Gorilla Glass',
                                'Kính cường lực Gorilla Glass 3',
                                'Kính cường lực Gorilla Glass 4',
                            ]; 
                            setSelect("sltMatKinh", $data); 
                        ?>
                    </div>

                    <div class="form-group{{ $errors->has('txtDoPhanGiaiCmrSau') ? ' has-error' : '' }}">
                        <label>Độ phân giải camera sau</label>
                        <input class="form-control" name="txtDoPhanGiaiCmrSau" placeholder="Nhập độ phân giải camera sau" value="{{ old('txtDoPhanGiaiCmrSau') }}"/>
                        @if ($errors->has('txtDoPhanGiaiCmrSau'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtDoPhanGiaiCmrSau') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtQuayPhim') ? ' has-error' : '' }}">
                        <label>Quay phim (Camera sau)</label>
                        <input class="form-control" name="txtQuayPhim" placeholder="Nhập chất lượng quay phim của camera" value="{{ old('txtQuayPhim') }}"/>
                        @if ($errors->has('txtQuayPhim'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtQuayPhim') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >Đèn flash</label>
                        <?php
                            $data = ['Có', 'Không'];
                            setRadioButton("rdoDenFlash", $data,"Có");
                        ?>         
                    </div>

                    <div class="form-group">
                        <label>Chụp ảnh nâng cao</label>
                        <?php 
                            $data = [
                                'Gắn thẻ địa lý',
                                'Ảnh Raw',
                                'Chạm lấy nét',
                                'Nhận diện khuôn mặt',
                                'Panorama',
                                'HDR',
                                'Tự động lấy nét',
                                'Chống rung quang học (OIS)',
                                'Chế độ chụp chuyên nghiệp',
                                'Lấy nét theo pha (EIS)',
                                'PixelMaster',
                                'Ảnh GIF',
                                'Chế độ Slow Motion',
                                'Chế độ Time-Lapse',
                                'Lấy nét bằng laser',
                            ];
                            setCheckBox("chAnhNangCao[]", $data);
                        ?>
                    </div>

                    <div class="form-group{{ $errors->has('txtDoPhanGiaiCmrTruoc') ? ' has-error' : '' }}">
                        <label>Độ phân giải camera trước</label>
                        <input class="form-control" name="txtDoPhanGiaiCmrTruoc" placeholder="Nhập độ phân giải camera trước" value="{{ old('txtDoPhanGiaiCmrTruoc') }}"/>
                        @if ($errors->has('txtDoPhanGiaiCmrTruoc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtDoPhanGiaiCmrTruoc') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >Quay phim (Camera trước)</label>  
                        <?php
                            $data = ['Có', 'Không'];
                            setRadioButton("rdoQuayPhimCmrTruoc", $data,"Có");
                        ?>        
                    </div>

                    <div class="form-group">
                        <label>Thông tin khác về camera trước</label>
                        <?php 
                            $data = [
                                'Camera góc rộng',
                                'Tự động cân bằng sáng',
                                'Selfie ngược sáng HDR',
                                'Nhận diện khuôn mặt',
                                'Quay video Full HD',
                                'Chế độ làm đẹp',
                                'Tự động lấy nét',
                                'Selfie bằng cử chỉ',
                                'Flash màn hình',
                               
                            ];
                            setCheckBox("chThongTinKhac[]",$data);
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Hệ điều hành</label>
                        <?php 
                            $data = [
                                'Android 4.4',
                                'Android 5.0',
                                'Android 5.1',
                                'Android 6.0',
                                'Android 7.0',
                                'iOS 9',
                                'iOS 10',
                                'Windowphone 8.1',
                                'Windowphone 10',
                            ]; 
                            setSelect("sltHeDieuHanh",$data); 
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Chipset</label>
                        <input class="form-control" name="txtChipset" placeholder="Nhập hãng sản xuất CPU" value="{{ old('txtChipset') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Số nhân CPU</label>
                        <?php 
                            $data = [
                                '2',
                                '4',
                                '8',
                                '10',
                            ]; 
                            setSelect("sltSoNhanCPU",$data); 
                        ?>
                    </div>

                    <div class="form-group{{ $errors->has('txtTocDoCPU') ? ' has-error' : '' }}">
                        <label>Tốc độ CPU</label>
                        <input class="form-control" name="txtTocDoCPU" placeholder="Nhập tốc độ xử lý của CPU" value="{{ old('txtTocDoCPU') }}"/>
                         @if ($errors->has('txtTocDoCPU'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtTocDoCPU') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtGPU') ? ' has-error' : '' }}">
                        <label>Chip đồ họa (GPU)</label>
                        <input class="form-control" name="txtGPU" placeholder="Nhập chip đồ họa" value="{{ old('txtGPU') }}"/>
                        @if ($errors->has('txtGPU'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtGPU') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtRAM') ? ' has-error' : '' }}">
                        <label>RAM</label>
                        <input class="form-control" name="txtRAM" placeholder="Nhập dung lượng RAM" value="{{ old('txtRAM') }}"/>
                        @if ($errors->has('txtRAM'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtRAM') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtROM') ? ' has-error' : '' }}">
                        <label>Bộ nhớ trong (ROM)</label>
                        <input class="form-control" name="txtROM" placeholder="Nhập dung lượng bộ nhớ trong" value="{{ old('txtROM') }}"/>
                        @if ($errors->has('txtROM'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtROM') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >Thẻ nhớ ngoài</label>
                        <?php
                            $data = ['MicroSD', 'Không'];
                            setRadioButton("rdoTheNhoNgoai", $data,"MicroSD");
                        ?>                 
                    </div>

                    <div class="form-group{{ $errors->has('txtTheToiDa') ? ' has-error' : '' }}">
                        <label>Hỗ trợ thẻ tối đa</label>
                        <input class="form-control" name="txtTheToiDa" placeholder="Nhập dung lượng thẻ nhớ hỗ trợ tối đa" value="{{ old('txtTheToiDa') }}"/>
                        @if ($errors->has('txtTheToiDa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtTheToiDa') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtBangTan2G') ? ' has-error' : '' }}">
                         <label>Băng tần 2G</label>
                        <input class="form-control" name="txtBangTan2G" placeholder="Nhập chuẩn băng tần 2G" value="{{ old('txtBangTan2G') }}"/>
                        @if ($errors->has('txtBangTan2G'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtBangTan2G') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtBangTan3G') ? ' has-error' : '' }}">
                        <label>Băng tần 3G</label>
                        <input class="form-control" name="txtBangTan3G" placeholder="Nhập chuẩn băng tần 3G" value="{{ old('txtBangTan3G') }}"/>
                        @if ($errors->has('txtBangTan3G'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtBangTan3G') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtHoTro4G') ? ' has-error' : '' }}">
                        <label>Hỗ trợ 4G</label>
                        <input class="form-control" name="txtHoTro4G" placeholder="Nhập chuẩn băng tần 4G hỗ trợ (nếu có)" value="{{ old('txtHoTro4G') }}"/>
                        @if ($errors->has('txtHoTro4G'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtHoTro4G') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >Số khe sim</label>
                        <?php
                            $data = ['1', '2'];
                            setRadioButton("rdoSoKheSim", $data,"1");
                        ?>               
                    </div>

                    <div class="form-group">
                        <label>Loại sim</label>
                         <?php 
                            $data = [
                                'Micro SIM',
                                'Nano SIM',   
                            ];
                            setCheckBox("chLoaiSim[]",$data);
                        ?>             
                    </div>

                    <div class="form-group{{ $errors->has('txtWifi') ? ' has-error' : '' }}">
                        <label>Wifi</label>
                        <input class="form-control" name="txtWifi" placeholder="Nhập chuẩn kết nối wifi" value="{{ old('txtWifi') }}"/>
                        @if ($errors->has('txtWifi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtWifi') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtGPS') ? ' has-error' : '' }}">
                        <label>GPS</label>
                        <input class="form-control" name="txtGPS" placeholder="Nhập chuẩn GPS" value="{{ old('txtGPS') }}"/>
                        @if ($errors->has('txtGPS'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtGPS') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtBluetooth') ? ' has-error' : '' }}">
                       <label>Bluetooth</label>
                        <input class="form-control" name="txtBluetooth" placeholder="Nhập chuẩn kết nối bluetooth" value="{{ old('txtBluetooth') }}"/>
                        @if ($errors->has('txtBluetooth'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtBluetooth') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label >NFC</label>
                        <?php
                            $data = ['Có', 'Không'];
                            setRadioButton("rdoNFC", $data,"Có");
                        ?>               
                    </div>

                    <div class="form-group">
                        <label >Cổng kết nối/sạc</label>
                        <?php
                            $data = ['Micro USB', 'USB Type-C', 'Lightning'];
                            setRadioButton("rdoCongSac", $data,"Micro USB");
                        ?>              
                    </div>

                    <div class="form-group{{ $errors->has('txtJack') ? ' has-error' : '' }}">
                        <label>Jack tai nghe</label>
                        <input class="form-control" name="txtJack" placeholder="Nhập kích thước jack tai nghe" value="{{ old('txtJack') }}"/>
                        @if ($errors->has('txtJack'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtJack') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Kết nối khác</label>
                        <?php 
                            $data = [
                                'OTG',
                                'MHL',
                                'Miracast',
                                'Air Playt',
                                'HDMI',
                                'Không',
                            ];
                            setCheckBox("chKetNoiKhac[]",$data);
                        ?>
                    </div>

                    <div class="form-group{{ $errors->has('txtThietKe') ? ' has-error' : '' }}">
                        <label>Thiết kế</label>
                        <input class="form-control" name="txtThietKe" placeholder="Nhập kiểu thiết kế" value="{{ old('txtThietKe') }}"/>
                        @if ($errors->has('txtThietKe'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtThietKe') }}</strong>
                            </span>
                        @endif
                    </div>

                    
                    <div class="form-group{{ $errors->has('txtChatLieu') ? ' has-error' : '' }}">
                        <label>Chất liệu</label>
                        <input class="form-control" name="txtChatLieu" placeholder="Nhập chất liệu của điện thoại" value="{{ old('txtChatLieu') }}"/>
                        @if ($errors->has('txtChatLieu'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtChatLieu') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtKichThuoc') ? ' has-error' : '' }}">
                        <label>Kích thước</label>
                        <input class="form-control" name="txtKichThuoc" placeholder="Nhập kích thước của điện thoại" value="{{ old('txtKichThuoc') }}"/>
                        @if ($errors->has('txtKichThuoc'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtKichThuoc') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtTrongLuong') ? ' has-error' : '' }}">
                        <label>Trọng lượng</label>
                        <input class="form-control" name="txtTrongLuong" placeholder="Nhập trọng lượng của điện thoại" value="{{ old('txtTrongLuong') }}"/>
                        @if ($errors->has('txtTrongLuong'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtTrongLuong') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtDungLuongPin') ? ' has-error' : '' }}">
                        <label>Dung lượng pin</label>
                        <input class="form-control" name="txtDungLuongPin" placeholder="Nhập dung lượng pin của điện thoại" value="{{ old('txtDungLuongPin')}}"/>
                        @if ($errors->has('txtDungLuongPin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtDungLuongPin') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('txtLoaiPin') ? ' has-error' : '' }}">
                       <label>Loại pin</label>
                        <input class="form-control" name="txtLoaiPin" placeholder="Nhập loại pin của điện thoại" value="{{ old('txtLoaiPin') }}"/>
                        @if ($errors->has('txtLoaiPin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtLoaiPin') }}</strong>
                            </span>
                        @endif
                    </div>

            
                    <div class="form-group">
                        <label>Xem phim</label>
                        <?php 
                            $data = [
                                '3GP',
                                'MP4',
                                'AVI',
                                'WMV',
                                'WMV9',
                                'H.263',
                                'H.264(MPEG4-AVC)',
                                'H.265',
                                'DivX',
                                'Xvid',
                            ];
                            setCheckBox("chXemPhim[]",$data);
                        ?>
                    </div>

                    
                    <div class="form-group">
                        <label>Nghe nhạc</label>
                        <?php 
                            $data = [
                                'Midi',
                                'Lossless',
                                'MP3',
                                'WMA',
                                'AAC+',
                                'AAC++',
                                'FLAC',
                                'AMR',
                                'eAAC+',
                                'AC3',
                            ];
                            setCheckBox("chNgheNhac[]",$data);
                        ?>
                    </div>

                    <div class="form-group">
                        <label >Ghi âm</label>
                        <?php
                            $data = ['Có', 'Không'];
                            setRadioButton("rdoGhiAm", $data, "Có");
                        ?>        
                    </div>

                    <div class="form-group{{ $errors->has('txtRadio') ? ' has-error' : '' }}">
                        <label>Radio</label>
                        <input class="form-control" name="txtRadio" placeholder="Nhập chuẩn radio hỗ trợ (nếu có)" value="{{ old('txtRadio') }}"/>
                        @if ($errors->has('txtRadio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtRadio') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Chức năng khác</label>
                        <?php 
                            $data = [
                                'Mặt kính 2.5D',
                                'Mở khóa nhanh bằng vân tay',
                                'Chống nước chống bụi',
                                'Sạc pin không dây',
                                'Sạc pin nhanh',
                                'Công nghệ âm thanh Hi-Res Audio',
                                '3D Touch',
                                'Chạm 2 lần sáng màn hình',
                                'Đoán tên bài hát bằng TrackID',
                                'Tiết kiệm PIN Ultra Stamina',
                                'Thông báo trên màn hình cong',
                            ];
                            setCheckBox("chChucNangKhac[]",$data);
                        ?>
                    </div>

                    <div class="form-group{{ $errors->has('txtBaoHanh') ? ' has-error' : '' }}">
                       <label>Thời gian bảo hành</label>
                        <input class="form-control" name="txtBaoHanh" placeholder="Nhập thời gian bảo hành của điện thoại" value="{{ old('txtBaoHanh') }}"/>
                        @if ($errors->has('txtBaoHanh'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txtBaoHanh') }}</strong>
                            </span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                    <a href="{!! route('admin.chi-tiet-dien-thoai.cancel',[$id_dt]) !!}" class="btn btn-danger">Hủy bỏ</a>
            <form>

    </div>
    @section('script')
        @parent
    @stop
@endsection