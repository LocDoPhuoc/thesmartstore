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

                @foreach($chitiet as $ct)
                <form action="{!! route('admin.chi-tiet-dien-thoai.postUpdate') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="id_dt" value="{!! $id_dt !!}">
                    <input type="hidden" name="id" value="{!! $ct->id !!}">
                    
                    <div class="form-group">
                        <label>Tên điện thoại</label>
                        <input class="form-control" name="ten_dt" value="{{ $ten }}"  disabled/>
                        
                    </div>

                    <div class="form-group">
                        <label>Màu sắc</label>
                        <input class="form-control" name="txtMauSac" placeholder="Nhập màu sắc của điện thoại" value="{{ old('txtMauSac',isset($ct->mau_sac) ? $ct->mau_sac : null) }}"/>
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
                            setSelect("sltCongNgheMH", $data, $ct->cong_nghe_mh); 
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
                            setSelect("sltKichThuocMH", $data, $ct->kich_thuoc_mh); 
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
                            setSelect("sltDoPhanGiaiMH", $data, $ct->do_phan_giai_mh); 
                        ?>
                    </div>


                    <div class="form-group">
                        <label>Cảm ứng</label>
                        <input class="form-control" name="txtCamUng" placeholder="Nhập công nghệ cảm ứng" value="{{ old('txtCamUng',isset($ct->cam_ung) ? $ct->cam_ung : null) }}"/>
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
                            setSelect("sltMatKinh", $data, $ct->mat_kinh); 
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Độ phân giải camera sau</label>
                        <input class="form-control" name="txtDoPhanGiaiCmrSau" placeholder="Nhập độ phân giải camera sau" value="{{ old('txtDoPhanGiaiCmrSau',isset($ct->do_phan_giai_cmr_sau) ? $ct->do_phan_giai_cmr_sau : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Quay phim (Camera sau)</label>
                        <input class="form-control" name="txtQuayPhim" placeholder="Nhập chất lượng quay phim của camera" value="{{ old('txtQuayPhim',isset($ct->quay_phim_cmr_sau) ? $ct->quay_phim_cmr_sau : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label >Đèn flash</label>
                        <?php
                            $data = ['Có', 'Không'];
                            setRadioButton("rdoDenFlash", $data, $ct->den_flash);
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
                            setCheckBox("chAnhNangCao[]", $data, $ct->chup_anh_nang_cao, ", ");
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Độ phân giải camera trước</label>
                        <input class="form-control" name="txtDoPhanGiaiCmrTruoc" placeholder="Nhập độ phân giải camera trước" value="{{ old('txtDoPhanGiaiCmrTruoc',isset($ct->do_phan_giai_cmr_truoc) ? $ct->do_phan_giai_cmr_truoc : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label >Quay phim (Camera trước)</label>  
                        <?php
                            $data = ['Có', 'Không'];
                            setRadioButton("rdoQuayPhimCmrTruoc", $data, $ct->quay_phim_cmr_truoc);
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
                            setCheckBox("chThongTinKhac[]",$data, $ct->thong_tin_khac,", ");
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
                            setSelect("sltHeDieuHanh",$data, $ct->he_dieu_hanh); 
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Chipset</label>
                        <input class="form-control" name="txtChipset" placeholder="Nhập hãng sản xuất CPU" value="{{ old('txtChipset',isset($ct->chipset) ? $ct->chipset : null) }}"/>
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
                            setSelect("sltSoNhanCPU",$data, $ct->so_nhan_cpu); 
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Tốc độ CPU</label>
                        <input class="form-control" name="txtTocDoCPU" placeholder="Nhập tốc độ xử lý của CPU" value="{{ old('txtTocDoCPU',isset($ct->toc_do_cpu) ? $ct->toc_do_cpu : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Chip đồ họa (GPU)</label>
                        <input class="form-control" name="txtGPU" placeholder="Nhập chip đồ họa" value="{{ old('txtGPU',isset($ct->gpu) ? $ct->gpu : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>RAM</label>
                        <input class="form-control" name="txtRAM" placeholder="Nhập dung lượng RAM" value="{{ old('txtRAM',isset($ct->ram) ? $ct->ram : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Bộ nhớ trong (ROM)</label>
                        <input class="form-control" name="txtROM" placeholder="Nhập dung lượng bộ nhớ trong" value="{{ old('txtROM',isset($ct->rom) ? $ct->rom : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label >Thẻ nhớ ngoài</label>
                        <?php
                            $data = ['MicroSD', 'Không'];
                            setRadioButton("rdoTheNhoNgoai", $data, $ct->the_nho_ngoai);
                        ?>                 
                    </div>

                    <div class="form-group">
                        <label>Hỗ trợ thẻ tối đa</label>
                        <input class="form-control" name="txtTheToiDa" placeholder="Nhập dung lượng thẻ nhớ hỗ trợ tối đa" value="{{ old('txtTheToiDa',isset($ct->ho_tro_the_nho_toi_da) ? $ct->ho_tro_the_nho_toi_da : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Băng tần 2G</label>
                        <input class="form-control" name="txtBangTan2G" placeholder="Nhập chuẩn băng tần 2G" value="{{ old('txtBangTan2G',isset($ct->bang_tan_2g) ? $ct->bang_tan_2g : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Băng tần 3G</label>
                        <input class="form-control" name="txtBangTan3G" placeholder="Nhập chuẩn băng tần 3G" value="{{ old('txtBangTan3G',isset($ct->bang_tan_3g) ? $ct->bang_tan_3g : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Hỗ trợ 4G</label>
                        <input class="form-control" name="txtHoTro4G" placeholder="Nhập chuẩn băng tần 4G hỗ trợ (nếu có)" value="{{ old('txtHoTro4G',isset($ct->ho_tro_4g) ? $ct->ho_tro_4g : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label >Số khe sim</label>
                        <?php
                            $data = ['1', '2'];
                            setRadioButton("rdoSoKheSim", $data, $ct->so_khe_sim);
                        ?>               
                    </div>

                    <div class="form-group">
                        <label>Loại sim</label>
                         <?php 
                            $data = [
                                'Micro SIM',
                                'Nano SIM',   
                            ];
                            setCheckBox("chLoaiSim[]",$data,$ct->loai_sim," + ");
                        ?>             
                    </div>

                    <div class="form-group">
                        <label>Wifi</label>
                        <input class="form-control" name="txtWifi" placeholder="Nhập chuẩn kết nối wifi" value="{{ old('txtWifi',isset($ct->wifi) ? $ct->wifi : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>GPS</label>
                        <input class="form-control" name="txtGPS" placeholder="Nhập chuẩn GPS" value="{{ old('txtGPS',isset($ct->gps) ? $ct->gps : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Bluetooth</label>
                        <input class="form-control" name="txtBluetooth" placeholder="Nhập chuẩn kết nối bluetooth" value="{{ old('txtBluetooth',isset($ct->bluetooth) ? $ct->bluetooth : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label >NFC</label>
                        <?php
                            $data = ['Có', 'Không'];
                            setRadioButton("rdoNFC", $data, $ct->nfc);
                        ?>               
                    </div>

                    <div class="form-group">
                        <label >Cổng kết nối/sạc</label>
                        <?php
                            $data = ['Micro USB', 'USB Type-C', 'Lightning'];
                            setRadioButton("rdoCongSac", $data, $ct->cong_ket_noi_sac);
                        ?>              
                    </div>

                    <div class="form-group">
                        <label>Jack tai nghe</label>
                        <input class="form-control" name="txtJack" placeholder="Nhập kích thước jack tai nghe" value="{{ old('txtJack',isset($ct->jack_tai_nghe) ? $ct->jack_tai_nghe : null) }}"/>
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
                            setCheckBox("chKetNoiKhac[]",$data,$ct->ket_noi_khac,", ");
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Thiết kế</label>
                        <input class="form-control" name="txtThietKe" placeholder="Nhập kiểu thiết kế" value="{{ old('txtThietKe',isset($ct->thiet_ke) ? $ct->thiet_ke : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Chất liệu</label>
                        <input class="form-control" name="txtChatLieu" placeholder="Nhập chất liệu của điện thoại" value="{{ old('txtChatLieu',isset($ct->chat_lieu) ? $ct->chat_lieu : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Kích thước</label>
                        <input class="form-control" name="txtKichThuoc" placeholder="Nhập kích thước của điện thoại" value="{{ old('txtKichThuoc',isset($ct->kich_thuoc) ? $ct->kich_thuoc : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Trọng lượng</label>
                        <input class="form-control" name="txtTrongLuong" placeholder="Nhập trọng lượng của điện thoại" value="{{ old('txtTrongLuong',isset($ct->trong_luong) ? $ct->trong_luong : null) }}"/>
                    </div>

                    <div class="form-group">
                        <label>Dung lượng pin</label>
                        <input class="form-control" name="txtDungLuongPin" placeholder="Nhập dung lượng pin của điện thoại" value="{{ old('txtDungLuongPin',isset($ct->dung_luong_pin) ? $ct->dung_luong_pin : null)}}"/>
                    </div>

                    <div class="form-group">
                        <label>Loại pin</label>
                        <input class="form-control" name="txtLoaiPin" placeholder="Nhập loại pin của điện thoại" value="{{ old('txtLoaiPin',isset($ct->loai_pin) ? $ct->loai_pin : null) }}"/>
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
                            setCheckBox("chXemPhim[]",$data, $ct->xem_phim,", ");
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
                            setCheckBox("chNgheNhac[]",$data, $ct->nghe_nhac,", ");
                        ?>
                    </div>

                    <div class="form-group">
                        <label >Ghi âm</label>
                        <?php
                            $data = ['Có', 'Không'];
                            setRadioButton("rdoGhiAm", $data, $ct->ghi_am);
                        ?>        
                    </div>

                    <div class="form-group">
                        <label>Radio</label>
                        <input class="form-control" name="txtRadio" placeholder="Nhập chuẩn radio hỗ trợ (nếu có)" value="{{ old('txtRadio',isset($ct->radio) ? $ct->radio : null) }}"/>
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
                            setCheckBox("chChucNangKhac[]",$data, $ct->chuc_nang_khac,", ");
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Thời gian bảo hành</label>
                        <input class="form-control" name="txtBaoHanh" placeholder="Nhập thời gian bảo hành của điện thoại" value="{{ old('txtBaoHanh',isset($ct->bao_hanh) ? $ct->bao_hanh : null) }}"/>
                    </div>

                    <button type="submit" class="btn btn-success">Sửa</button>
                    <button type="reset" class="btn btn-primary">Nhập lại</button>
                    <a href="{!! route('admin.dien-thoai.getList') !!}" class="btn btn-danger">Hủy bỏ</a>
            <form>
        @endforeach
    </div>
    @section('script')
        @parent
    @stop
@endsection