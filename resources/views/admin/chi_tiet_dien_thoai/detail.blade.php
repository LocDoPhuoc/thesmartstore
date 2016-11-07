@extends('admin.master')
@section('content')

	<div class="col-lg-12">
        <h1 class="page-header">CHI TIẾT ĐIỆN THOẠI</h1>
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

                    <div class="form-group">
                        <label>Công nghệ màn hình</label>
                        <input class="form-control" name="" placeholder="Nhập tên điện thoại" value="{{ old('ten_dt',isset($dt->ten_dt) ? $dt->ten_dt : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Kích thước màn hình (inch)</label>
                        <?php 
                            $data = [
                                '3.5'=>'3.5',
                                '4' => '4',
                                '5' => '5',
                                '5.2' => '5.2',
                                '5.5' => '5.5',
                                '5.7' => '5.7',
                                '6' => '6',
                            ]; 
                            setSelect("sltKichThuocMH",$data); 
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Độ phân giải màn hình</label>
                        <?php 
                            $data = [
                                '640 x 1136'=>'640 x 1136',
                                '720 x 1280' => '720 x 1280',
                                '1080 x 1920' => '1080 x 1920',
                                '1440 x 2560' => '1440 x 2560',
                            ]; 
                            setSelect("sltDoPhanGiaiMH",$data); 
                        ?>
                    </div>


                    <div class="form-group">
                        <label>Cảm ứng</label>
                        <input class="form-control" name="txtCamUng" placeholder="Nhập công nghệ cảm ứng" value="{{ old('txtCamUng') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Mặt kính cảm ứng</label>
                        <?php 
                            $data = [
                                'Kính thường'=>'Kính thường',
                                'Kính cường lực Gorilla Glass' => 'Kính cường lực Gorilla Glass',
                                'Kính cường lực Gorilla Glass 3' => 'Kính cường lực Gorilla Glass 3',
                                'Kính cường lực Gorilla Glass 4' => 'Kính cường lực Gorilla Glass 4',
                            ]; 
                            setSelect("sltMatKinh",$data); 
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Độ phân giải camera sau</label>
                        <input class="form-control" name="txtDoPhanGiaiCmrSau" placeholder="Nhập độ phân giải camera sau" value="{{ old('txtDoPhanGiaiCmrSau') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Quay phim (Camera sau)</label>
                        <input class="form-control" name="txtQuayPhim" placeholder="Nhập chất lượng quay phim của camera" value="{{ old('txtQuayPhim') }}"/>
                    </div>

                    <div class="form-group">
                        <label >Đèn flash</label>
                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoDenFlash" value="Có" checked="" type="radio">Có
                            </label>
                        </div>
                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoDenFlash" value="Không" type="radio">Không
                            </label>
                        </div>         
                    </div>

                    <div class="form-group">
                        <label>Chụp ảnh nâng cao</label>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Gắn thẻ địa lý">Gắn thẻ địa lý</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]"  value="Ảnh Raw">Ảnh Raw</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Tự động lấy nét">Tự động lấy nét</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Chạm lấy nét">Chạm lấy nét</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Nhận diện khuôn mặt">Nhận diện khuôn mặt</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Panorama">Panorama</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="HDR">HDR</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Chống rung quang học (OIS)">Chống rung quang học (OIS)</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Chế độ chụp chuyên nghiệp">Chế độ chụp chuyên nghiệp</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Lấy nét theo pha (EIS)">Lấy nét theo pha (EIS)</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="PixelMaster">PixelMaster</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Ảnh GIF">Ảnh GIF</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Chế độ Slow Motion">Chế độ Slow Motion</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Chế độ Time-Lapse">Chế độ Time-Lapse</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chAnhNangCao[]" value="Lấy nét bằng laser">Lấy nét bằng laser</label>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Độ phân giải camera trước</label>
                        <input class="form-control" name="txtDoPhanGiaiCmrTruoc" placeholder="Nhập độ phân giải camera trước" value="{{ old('txtDoPhanGiaiCmrTruoc') }}"/>
                    </div>

                    <div class="form-group">
                        <label >Quay phim (Camera trước)</label>
                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoQuayPhimCmrTruoc" value="Có" checked="" type="radio">Có
                            </label>
                        </div>
                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoQuayPhimCmrTruoc" value="Không" type="radio">Không
                            </label>
                        </div>         
                    </div>

                    <div class="form-group">
                        <label>Thông tin khác về camera trước</label>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chThongTinKhac[]" value="Camera góc rộng">Camera góc rộng</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chThongTinKhac[]"  value="Tự động lấy nét">Tự động lấy nét</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chThongTinKhac[]" value="Nhận diện khuôn mặt">Nhận diện khuôn mặt</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chThongTinKhac[]" value="Tự động cân bằng sáng">Tự động cân bằng sáng</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chThongTinKhac[]" value="Quay video Full HD">Quay video Full HD</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chThongTinKhac[]" value="Selfie ngược sáng HDR">Selfie ngược sáng HDR</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chThongTinKhac[]" value="Chế độ làm đẹp">Chế độ làm đẹp</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chThongTinKhac[]" value="Selfie bằng cử chỉ">Selfie bằng cử chỉ</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Hệ điều hành</label>
                        <?php 
                            $data = [
                                'Android 4.4'=>'Android 4.4',
                                'Android 5.0' => 'Android 5.0',
                                'Android 5.1' => 'Android 5.1',
                                'Android 6.0' => 'Android 6.0',
                                'Android 7.0' => 'Android 7.0',
                                'iOS 9' => 'iOS 9',
                                'iOS 10' => 'iOS 10',
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
                                '2'=>'2',
                                '4' => '4',
                                '8' => '8',
                                '10' => '10',
                            ]; 
                            setSelect("sltSoNhanCPU",$data); 
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Tốc độ CPU</label>
                        <input class="form-control" name="txtTocDoCPU" placeholder="Nhập tốc độ xử lý của CPU" value="{{ old('txtTocDoCPU') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Chip đồ họa (GPU)</label>
                        <input class="form-control" name="txtGPU" placeholder="Nhập chip đồ họa" value="{{ old('txtGPU') }}"/>
                    </div>

                    <div class="form-group">
                        <label>RAM</label>
                        <input class="form-control" name="txtRAM" placeholder="Nhập dung lượng RAM" value="{{ old('txtRAM') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Bộ nhớ trong (ROM)</label>
                        <input class="form-control" name="txtROM" placeholder="Nhập dung lượng bộ nhớ trong" value="{{ old('txtROM') }}"/>
                    </div>

                    <div class="form-group">
                        <label >Thẻ nhớ ngoài</label>
                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoTheNhoNgoai" value="MicroSD" checked="" type="radio">MicroSD
                            </label>
                        </div>

                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoTheNhoNgoai" value="Không" type="radio">Không
                            </label>
                        </div>               
                    </div>

                    <div class="form-group">
                        <label>Hỗ trợ thẻ tối đa</label>
                        <input class="form-control" name="txtTheToiDa" placeholder="Nhập dung lượng thẻ nhớ hỗ trợ tối đa" value="{{ old('txtTheToiDa') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Băng tần 2G</label>
                        <input class="form-control" name="txtBangTan2G" placeholder="Nhập chuẩn băng tần 2G" value="{{ old('txtBangTan2G') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Băng tần 3G</label>
                        <input class="form-control" name="txtBangTan3G" placeholder="Nhập chuẩn băng tần 3G" value="{{ old('txtBangTan3G') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Hỗ trợ 4G</label>
                        <input class="form-control" name="txtHoTro4G" placeholder="Nhập chuẩn băng tần 4G hỗ trợ (nếu có)" value="{{ old('txtHoTro4G') }}"/>
                    </div>

                    <div class="form-group">
                        <label >Số khe sim</label>
                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoSoKheSim" value="1" checked="" type="radio">1
                            </label>
                        </div>

                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoSoKheSim" value="2" type="radio">2
                            </label>
                        </div>               
                    </div>

                    <div class="form-group">
                        <label>Loại sim</label>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chLoaiSim[]" value="Micro sim">Micro sim</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chLoaiSim[]"  value="Nano sim">Nano sim</label>
                        </div>              
                    </div>

                    <div class="form-group">
                        <label>Wifi</label>
                        <input class="form-control" name="txtWifi" placeholder="Nhập chuẩn kết nối wifi" value="{{ old('txtWifi') }}"/>
                    </div>

                    <div class="form-group">
                        <label>GPS</label>
                        <input class="form-control" name="txtGPS" placeholder="Nhập chuẩn GPS" value="{{ old('txtGPS') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Bluetooth</label>
                        <input class="form-control" name="txtBluetooth" placeholder="Nhập chuẩn kết nối bluetooth" value="{{ old('txtBluetooth') }}"/>
                    </div>

                    <div class="form-group">
                        <label >NFC</label>
                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoNFC" value="Có" checked="" type="radio">Có
                            </label>
                        </div>

                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoNFC" value="Không" type="radio">Không
                            </label>
                        </div>               
                    </div>

                    <div class="form-group">
                        <label >Cổng kết nối/sạc</label>
                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoCongSac" value="Micro USB" checked="" type="radio">Micro USB
                            </label>
                        </div>

                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoCongSac" value="USB Type-C" type="radio">USB Type-C
                            </label>
                        </div>

                        <div class="radio">
                            <label class="radio-inline">
                                <input name="rdoCongSac" value="Lightning" type="radio">Lightning
                            </label>
                        </div>               
                    </div>

                    <div class="form-group">
                        <label>Jack tai nghe</label>
                        <input class="form-control" name="txtJack" placeholder="Nhập kích thước jack tai nghe" value="{{ old('txtJack') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Kết nối khác</label>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chKetNoiKhac[]" value="OTG">OTG</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chKetNoiKhac[]"  value="MHL">MHL</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chKetNoiKhac[]" value="Miracast">Miracast</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chKetNoiKhac[]" value="Air Play">Air Play</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chKetNoiKhac[]" value="HDMI">HDMI</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Thiết kế</label>
                        <input class="form-control" name="txtThietKe" placeholder="Nhập kiểu thiết kế" value="{{ old('txtThietKe') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Chất liệu</label>
                        <input class="form-control" name="txtChatLieu" placeholder="Nhập chất liệu của điện thoại" value="{{ old('txtChatLieu') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Kích thước</label>
                        <input class="form-control" name="txtKichThuoc" placeholder="Nhập kích thước của điện thoại" value="{{ old('txtKichThuoc') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Trọng lượng</label>
                        <input class="form-control" name="txtTrongLuong" placeholder="Nhập trọng lượng của điện thoại" value="{{ old('txtTrongLuong') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Dung lượng pin</label>
                        <input class="form-control" name="txtDungLuongPin" placeholder="Nhập dung lượng pin của điện thoại" value="{{ old('txtDungLuongPin') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Loại pin</label>
                        <input class="form-control" name="txtLoaiPin" placeholder="Nhập loại pin của điện thoại" value="{{ old('txtLoaiPin') }}"/>
                    </div>

            
                    <div class="form-group">
                        <label>Xem phim</label>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chXemPhim[]" value="3GP">3GP</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chXemPhim[]"  value="MP4">MP4</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chXemPhim[]" value="AVI">AVI</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chXemPhim[]" value="WMV">WMV</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chXemPhim[]" value="WMV9">WMV9</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chXemPhim[]" value="H.263">H.263</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chXemPhim[]" value="H.264(MPEG4-AVC)">H.264(MPEG4-AVC)</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chXemPhim[]" value="H.265">H.265</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chXemPhim[]" value="DivX">DivX</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chXemPhim[]" value="Xvid">Xvid</label>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label>Nghe nhạc</label>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chNgheNhac[]" value="Midi">Midi</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chNgheNhac[]"  value="Lossless">Lossless</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chNgheNhac[]" value="MP3">MP3</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chNgheNhac[]" value="WMA">WMA</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chNgheNhac[]" value="AAC+">AAC+</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chNgheNhac[]" value="AAC++">AAC++</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chNgheNhac[]" value="FLAC">FLAC</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chNgheNhac[]" value="AMR">AMR</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chNgheNhac[]" value="eAAC+">eAAC+</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chNgheNhac[]" value="AC3">AC3</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Ghi âm</label>
                            <div class="radio">
                                <label class="radio-inline">
                                    <input name="rdoGhiAm" value="Có" checked="" type="radio">Có
                                </label>
                            </div>

                            <div class="radio">
                                <label class="radio-inline">
                                    <input name="rdoGhiAm" value="Không" type="radio">Không
                                </label>
                            </div>        
                    </div>

                    <div class="form-group">
                        <label>Radio</label>
                        <input class="form-control" name="txtRadio" placeholder="Nhập chuẩn radio hỗ trợ (nếu có)" value="{{ old('Radio') }}"/>
                    </div>

                    <div class="form-group">
                        <label>Chức năng khác</label>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chChucNangKhac[]" value="Mặt kính 2.5D">Mặt kính 2.5D</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chChucNangKhac[]"  value="Mở khóa nhanh bằng vân tay">Mở khóa nhanh bằng vân tay</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chChucNangKhac[]" value="Chống nước, chống bụi">Chống nước, chống bụi</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chChucNangKhac[]" value="Sạc pin không dây">Sạc pin không dây</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chChucNangKhac[]" value="Sạc pin nhanh">Sạc pin nhanh</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chChucNangKhac[]" value="Công nghệ âm thanh Hi-Res Audio">Công nghệ âm thanh Hi-Res Audio</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chChucNangKhac[]" value="3D Touch">3D Touch</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chChucNangKhac[]" value="Chạm 2 lần sáng màn hình">Chạm 2 lần sáng màn hình</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chChucNangKhac[]" value="Đoán tên bài hát bằng TrackID">Đoán tên bài hát bằng TrackID</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="chChucNangKhac[]" value="Tiết kiệm PIN Ultra Stamina">Tiết kiệm PIN Ultra Stamina</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Thêm</button>
                    <button type="reset" class="btn btn-danger">Hủy bỏ</button>
            <form>
    </div>
    @section('script')
        @parent
    @stop
@endsection