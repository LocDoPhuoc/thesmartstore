-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 02:03 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_smartstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dt` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_dang` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `id_dt`, `ten`, `email`, `noi_dung`, `ngay_dang`, `created_at`, `updated_at`) VALUES
(1, 7, 'Phước Lộc', 'phuocloc@gmail.com', 'Điện thoại đẹp, giá hấp dẫn quá!!!!!!!!!', '2016-10-26 04:04:26', '2016-10-25 21:04:26', '2016-10-25 21:04:26'),
(2, 7, 'Minh Khôi', 'minhkhoi@gmail.com', 'Ad ơi nếu giờ mình đang đi công tác ở đà nẵng , mà mình đặt hàng online mà trong vòng 48h mình chưa về kịp thì mình nhờ người ra đặt cọc để giữ máy được ko ad', '2016-10-26 05:15:36', '2016-10-25 22:15:36', '2016-10-25 22:15:36'),
(3, 19, 'Văn Hải', 'hai@gmail.com', 'Chương trình đổi Smart phone cũ (Note 2) sang Galaxy S7,S7egde có tiếp tục được tham gia trả góp 0% ko bạn?', '2016-10-26 05:23:27', '2016-10-25 22:23:27', '2016-10-25 22:23:27'),
(4, 2, 'Nguyễn Phạm Minh Khôi', 'ngminhkhoi@gmail.com', 'Điện thoại đẹp quá bà con ơi!!!!!!!!', '2016-10-28 04:59:56', '2016-10-27 21:59:56', '2016-10-27 21:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_dien_thoais`
--

CREATE TABLE `chi_tiet_dien_thoais` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dt` int(10) UNSIGNED NOT NULL,
  `mau_sac` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cong_nghe_mh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kich_thuoc_mh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `do_phan_giai_mh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cam_ung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_kinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `do_phan_giai_cmr_sau` int(11) NOT NULL,
  `quay_phim_cmr_sau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `den_flash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chup_anh_nang_cao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `do_phan_giai_cmr_truoc` int(11) NOT NULL,
  `quay_phim_cmr_truoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thong_tin_khac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `he_dieu_hanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chipset` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_nhan_cpu` int(11) NOT NULL,
  `toc_do_cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ram` int(11) NOT NULL,
  `rom` int(11) NOT NULL,
  `the_nho_ngoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ho_tro_the_nho_toi_da` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bang_tan_2g` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bang_tan_3g` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ho_tro_4g` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_khe_sim` int(11) NOT NULL,
  `loai_sim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wifi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bluetooth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nfc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cong_ket_noi_sac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jack_tai_nghe` double(8,2) NOT NULL,
  `ket_noi_khac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thiet_ke` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chat_lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kich_thuoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trong_luong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dung_luong_pin` int(11) NOT NULL,
  `loai_pin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `xem_phim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nghe_nhac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ghi_am` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `radio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chuc_nang_khac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bao_hanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chi_tiet_dien_thoais`
--

INSERT INTO `chi_tiet_dien_thoais` (`id`, `id_dt`, `mau_sac`, `cong_nghe_mh`, `kich_thuoc_mh`, `do_phan_giai_mh`, `cam_ung`, `mat_kinh`, `do_phan_giai_cmr_sau`, `quay_phim_cmr_sau`, `den_flash`, `chup_anh_nang_cao`, `do_phan_giai_cmr_truoc`, `quay_phim_cmr_truoc`, `thong_tin_khac`, `he_dieu_hanh`, `chipset`, `so_nhan_cpu`, `toc_do_cpu`, `gpu`, `ram`, `rom`, `the_nho_ngoai`, `ho_tro_the_nho_toi_da`, `bang_tan_2g`, `bang_tan_3g`, `ho_tro_4g`, `so_khe_sim`, `loai_sim`, `wifi`, `gps`, `bluetooth`, `nfc`, `cong_ket_noi_sac`, `jack_tai_nghe`, `ket_noi_khac`, `thiet_ke`, `chat_lieu`, `kich_thuoc`, `trong_luong`, `dung_luong_pin`, `loai_pin`, `xem_phim`, `nghe_nhac`, `ghi_am`, `radio`, `chuc_nang_khac`, `bao_hanh`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gold/White/Black', 'IPS LCD', '5.2', '1080 x 1920', 'Cảm ứng điện dung đa điểm', 'Kính thường', 23, 'Quay phim 4K 2160p@30fps', 'Có', 'Chạm lấy nét, Nhận diện khuôn mặt, Panorama, HDR, Tự động lấy nét', 5, 'Có', 'Camera góc rộng, Tự động cân bằng sáng, Nhận diện khuôn mặt, Tự động lấy nét', 'Android 6.0', 'Snapdragon 810 8 nhân 64-bit', 8, '2.0', 'Adreno 430', 3, 32, 'MicroSD', '200', 'GSM 850/900/1800/1900', 'HSDPA 850/900/1900/2100', '4G LTE Cat 6', 2, 'Nano SIM', 'Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot', 'A-GPS, GLONASS', 'A2DP, V4.1', 'Có', 'Micro USB', 3.50, 'OTG, MHL, Miracast', 'Nguyên khối', 'Hợp kim nhôm', 'Dài 146 mm - Rộng 72 mm - Dày 7.3 mm', '156.5 g', 2900, 'Pin chuẩn Li-Po', '3GP, MP4, AVI, WMV, H.264(MPEG4-AVC), H.265, DivX, Xvid', 'Lossless, MP3, AAC+, eAAC+', 'Có', 'FM radio với RDS', 'Mở khóa nhanh bằng vân tay, Chống nước chống bụi, Sạc pin nhanh', '12 tháng', NULL, NULL),
(2, 2, 'Gold/White/Black/Silver', 'Super AMOLED', '5.7', '1440 x 2560', 'Cảm ứng điện dung đa điểm', 'Kính cường lực Gorilla Glass 4', 16, 'Quay phim 4K 2160p@30fps', 'Có', 'Ảnh Raw, Chạm lấy nét, Nhận diện khuôn mặt, Panorama, HDR, Tự động lấy nét, Chống rung quang học (OIS)', 5, 'Có', 'Camera góc rộng, Nhận diện khuôn mặt, Chế độ làm đẹp, Selfie bằng cử chỉ', 'Android 6.0', 'Exynos 7420 8 nhân 64-bit', 8, '2.1', 'Mali-T760', 4, 32, 'Không', 'Không', 'GSM 850/900/1800/1900', 'HSDPA 850/900/2100, LTE 800/900/1800/2100/2600', '4G LTE Cat 9', 1, 'Nano SIM', 'Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot', 'A-GPS, GLONASS', 'Có, A2DP, LE, EDR', 'Có', 'Micro USB', 3.50, 'OTG, Miracast', 'Nguyên khối', 'Khung kim loại + mặt kính cường lực', 'Dài 153.2 mm - Ngang 76.1 mm - Dày 7.6 mm', '171 g', 3000, 'Pin chuẩn Li-Po', '3GP, MP4, AVI, WMV, H.263, H.264(MPEG4-AVC), H.265, DivX, Xvid', 'MP3, FLAC, eAAC+', 'Có', 'Không', 'Mặt kính 2.5D, Mở khóa nhanh bằng vân tay, Sạc pin không dây, Sạc pin nhanh', '12 tháng', NULL, NULL),
(3, 3, '', 'IPS LCD', '4', '640 x 1136 pixels', 'Cảm ứng điện dung đa điểm', 'Kính cường lực', 12, 'Có quay phim', 'Dual-tone LED', 'Gắn thẻ địa lý, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama', 1, 'Có', 'Quay video HD', 'iOS 9', 'Apple A9 2 nhân 64-bit', 2, '1.8 GHz', 'PowerVR GT7600', 2, 16, 'Không', 'Không', 'GSM 850/900/1800/1900', 'HSDPA 850/900/1700/1900/2100, LTE', '4G LTE Cat 4', 1, 'Nano SIM', 'Wi-Fi 802.11 b/g/n, Wi-Fi hotspot', 'A-GPS, GLONASS', 'v4.2, A2DP, LE', 'Có', 'Lightning', 3.50, 'Air Play, NFC, OTG, HDMI', 'Nguyên khối', 'Hợp kim nhôm', 'Dài 123.8 mm - Ngang 58.6 mm - Dày 7.6 mm', '113 g', 1642, 'Pin chuẩn Li-Po', 'H.265, 3GP, MP4, AVI, WMV, H.264(MPEG4-AVC), DivX, WMV9, Xvid', 'Lossless, MP3, AAC, AAC++, eAAC+', 'Có', 'Không', 'Mở khóa nhanh bằng vân tay', '0', NULL, NULL),
(4, 7, '', 'LED-backlit IPS LCD', '4', '640 x 1136 pixels', 'Cảm ứng điện dung đa điểm', 'Kính cường lực Gorilla Glass', 8, 'Quay phim FullHD 1080p@30fps', 'Có', 'Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama', 1, 'Có', 'Tự động cân bằng sáng', 'iOS 9', 'Apple A7 2 nhân 64-bit', 2, '1.3 GHz', '1.3 GHz', 1, 16, 'Không', 'Không', 'GSM 850/900/1800/1900', 'HSDPA', '4G LTE Cat 4', 1, 'Nano SIM', 'Wi-Fi 802.11 b/g/n, Wi-Fi Direct, Wi-Fi hotspot', 'A-GPS, GLONASS', 'V4.0', 'Không', 'Lightning', 3.50, 'Air Play, OTG, HDMI', 'Nguyên khối', 'Hợp kim nhôm', 'Dài 123.8 mm - Ngang 58.6 mm - Dày 7.6 mm', '112 g', 1560, 'Pin chuẩn Li-Ion', 'MP4, WMV, H.263, H.264(MPEG4-AVC)', 'MP3, WAV, WMA, eAAC+', 'Có', 'Không', 'Mở khóa nhanh bằng vân tay', '0', NULL, NULL),
(5, 9, '', 'PLS LCD', '5.5"', '1080 x 1920 pixels', 'Cảm ứng điện dung đa điểm', 'Kính cường lực Gorilla Glass 4', 13, 'Quay phim FullHD 1080p@30fps', 'Có', 'Gắn thẻ địa lý, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chế độ chụp chuyên nghiệp', 8, 'Có', 'Selfie bằng cử chỉ, Nhận diện khuôn mặt, Chế độ làm đẹp, Camera góc rộng', 'Android 6.0 (Marshmallow)', 'Exynos 7870 8 nhân 64-bit', 8, '1.6 GHz', 'Mali-T830', 3, 32, 'MicroSD', '256 GB', 'GSM 850/900/1800/1900', 'HSDPA', 'Có hỗ trợ 4G', 2, 'Nano SIM', 'Wi-Fi 802.11 b/g/n, Wi-Fi hotspot', 'A-GPS, GLONASS', 'Có', 'Không', 'Micro USB', 3.50, 'OTG', 'Nguyên khối', 'Hợp kim nhôm', 'Dài 151.5 mm - Ngang 74.9 mm - Dày 8.1 mm.', '167 g', 3300, 'Pin chuẩn Li-Ion', 'H.265, 3GP, MP4, AVI, WMV, H.264(MPEG4-AVC), DivX, WMV9, Xvid', 'Lossless, MP3, WAV, WMA', 'Có', 'Đang cập nhật', 'Mở khóa nhanh bằng vân tay, Mặt kính 2.5D', '0', NULL, NULL),
(6, 8, '', 'PLS LCD', '5.5', '1080 x 1920', 'Cảm ứng điện dung đa điểm', 'Kính cường lực Gorilla Glass 4', 13, 'Có', 'Có', 'Gắn thẻ địa lý, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Chế độ chụp chuyên nghiệp', 8, 'Có', 'Camera góc rộng, Nhận diện khuôn mặt, Chế độ làm đẹp, Selfie bằng cử chỉ', 'Android 6.0', 'Exynos 7870 8 nhân 64-bit', 9, '1.6', 'Mali-T830', 3, 32, 'MicroSD', '256', 'GSM 850/900/1800/1900', 'HSDPA', 'Có hỗ trợ 4G', 2, 'Nano SIM', 'Wi-Fi 802.11 b/g/n, Wi-Fi hotspot', 'A-GPS, GLONASS', 'Có', 'Không', 'Micro USB', 3.50, 'OTG', 'Nguyên khối', 'Hợp kim nhôm', 'Dài 151.5 mm - Ngang 74.9 mm - Dày 8.1 mm.', '167 g', 3300, 'Pin chuẩn Li-Ion', 'H.265, 3GP, MP4, AVI, WMV, H.264(MPEG4-AVC), DivX, WMV9, Xvid', 'Lossless, MP3, WAV, WMA', 'Có', 'Đang cập nhật', 'Mặt kính 2.5D, Mở khóa nhanh bằng vân tay', '0', '2016-10-19 19:05:43', '2016-10-19 19:05:43'),
(9, 18, '', 'Super AMOLED', '5.5', '1440 x 2560', 'Cảm ứng điện dung đa điểm', 'Kính cường lực Gorilla Glass 4', 12, 'Quay phim 4K 2160p@30fps', 'Có', 'Gắn thẻ địa lý, Ảnh Raw, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, Panorama, HDR, Chống rung quang học (OIS)', 5, 'Có', 'Camera góc rộng, Nhận diện khuôn mặt, Selfie ngược sáng HDR, Chế độ làm đẹp, Selfie bằng cử chỉ', 'Android 6.0', 'Exynos 8890 8 nhân 64-bit', 8, '2.3', 'Mali-T880 MP12', 4, 32, 'MicroSD', '200', 'GSM 850/900/1800/1900', 'HSDPA 850/900/1900/2100', '4G LTE Cat 9', 2, 'Nano SIM', 'Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot', 'A-GPS, GLONASS', 'apt-X, v4.2, A2DP, LE, EDR', 'Có', 'Micro USB', 3.50, 'OTG, Miracast', 'Nguyên khối', 'Khung kim loại + mặt kính cường lực', 'Dài 150.9 mm - Ngang 72.6 mm - Dày 7.7 mm', '157 g', 3600, 'Lithium - Ion', '3GP, MP4, AVI, WMV, WMV9, H.264(MPEG4-AVC), H.265, DivX, Xvid', 'Midi, Lossless, MP3, WMA, AAC++, eAAC+', 'Có', '', 'Mặt kính 2.5D, Mở khóa nhanh bằng vân tay, Chống nước chống bụi, Sạc pin không dây, Sạc pin nhanh', '0', '2016-10-20 19:28:58', '2016-10-20 19:28:58'),
(11, 19, 'Gold/White/Black/Silver', 'Super AMOLED', '5.5', '640 x 1136', 'Cảm ứng điện dung đa điểm', 'Kính cường lực Gorilla Glass 4', 13, 'Quay phim 4K 2160p@30fps', 'Có', 'Gắn thẻ địa lý, Ảnh Raw, Chạm lấy nét, Nhận diện khuôn mặt, Panorama, HDR, Tự động lấy nét, Chống rung quang học (OIS)', 5, 'Có', 'Camera góc rộng, Selfie ngược sáng HDR, Nhận diện khuôn mặt, Chế độ làm đẹp, Selfie bằng cử chỉ, Flash màn hình', 'Android 6.0', 'Exynos 8890 8 nhân 64-bit', 8, '2.3', 'Mali-T880 MP12', 4, 32, 'MicroSD', '200', 'GSM 850/900/1800/1900', 'HSDPA 850/900/1900/2100', '4G LTE Cat 9', 2, 'Nano SIM', 'Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot', 'A-GPS, GLONASS', 'v4.2, apt-X, A2DP, LE', 'Có', 'Micro USB', 3.50, 'OTG, Miracast', 'Nguyên khối', 'Khung kim loại + mặt kính cường lực', 'Dài 150.9 mm - Ngang 72.6 mm - Dày 7.7 mm', '157 g', 3600, 'Pin chuẩn Li-Ion', '3GP, MP4, AVI, WMV9, H.264(MPEG4-AVC), H.265, DivX, Xvid', 'Midi, Lossless, MP3, WMA, FLAC, eAAC+, AC3', 'Có', 'Không', 'Mặt kính 2.5D, Mở khóa nhanh bằng vân tay, Chống nước chống bụi, Sạc pin không dây, Sạc pin nhanh, Thông báo trên màn hình cong', '24 tháng', '2016-10-23 17:01:49', '2016-10-23 17:01:49'),
(12, 20, 'Gold/White/Black', 'IPS LCD', '5.5', '720 x 1280', 'Cảm ứng điện dung đa điểm', 'Kính cường lực Gorilla Glass 4', 13, 'Có quay phim', 'Có', 'Chạm lấy nét, Nhận diện khuôn mặt, Panorama, HDR, Tự động lấy nét', 16, 'Có', 'Nhận diện khuôn mặt, Chế độ làm đẹp, Selfie bằng cử chỉ, Flash màn hình', 'Android 5.1', 'Mediatek MT6750 8 nhân', 8, '1.5', 'Mali-T860', 3, 32, 'MicroSD', '128', 'GSM 850/900/1800/1900', 'HSDPA 850/900/2100', 'Có hỗ trợ 4G', 2, 'Nano SIM', 'Wi-Fi 802.11 b/g/n, Dual-band, Wi-Fi Direct, Wi-Fi hotspot', 'A-GPS', 'V4.0, A2DP', 'Không', 'Micro USB', 3.50, 'OTG', 'Nguyên khối', 'Hợp kim nhôm', 'Dài 154.5 mm - Ngang 76 mm - Dày 7.38 mm', '160 g', 3075, 'Lithium - Ion', '3GP, MP4, AVI, WMV, WMV9, H.264(MPEG4-AVC), H.265, DivX, Xvid', 'Midi, Lossless, MP3, WMA, FLAC, AC3', 'Có', 'Có', 'Mặt kính 2.5D, Mở khóa nhanh bằng vân tay, Chạm 2 lần sáng màn hình', '12 tháng', '2016-10-28 17:26:42', '2016-10-28 17:26:42'),
(13, 21, 'Xám / Cam / Đen / Trắng', 'Super AMOLED', '4', '720 x 1280', 'Cảm ứng điện dung đa điểm', 'Kính cường lực Gorilla Glass 3', 7, 'Quay phim FullHD 1080p@30fps', 'Có', 'Chạm lấy nét, Nhận diện khuôn mặt, Tự động lấy nét', 5, 'Có', 'Camera góc rộng, Quay video Full HD', 'Android 4.4', 'Qualcomm Snapdragon 400 4 nhân 32-bit', 4, '1.2', 'Adreno 305', 1, 8, 'MicroSD', '128', 'GSM 850/900/1800/1900', 'HSDPA 850/900/1900/2100', 'Không hỗ trợ 4G', 2, 'Micro SIM', 'Wi-Fi 802.11 b/g/n, DLNA, Wi-Fi hotspot', 'A-GPS, GLONASS', 'V4.0, A2DP', 'Có', 'Micro USB', 3.50, 'Miracast', 'Pin rời', 'Nhựa', 'Dài 134.7 mm - Ngang 68.5 mm - Dày 8.9 mm', '134 g', 2220, 'Pin chuẩn Li-Ion', 'MP4, WMV, H.263, H.264(MPEG4-AVC)', 'MP3, WMA', 'Có', 'Có', 'Chạm 2 lần sáng màn hình', '12 tháng', '2016-10-28 17:37:26', '2016-10-28 17:37:26'),
(14, 22, 'Trắng & Vàng đồng', 'Super IPS LCD', '5.2', '1440 x 2560', 'Cảm ứng điện dung đa điểm', 'Kính cường lực Gorilla Glass 4', 20, 'Quay phim 4K 2160p@30fps', 'Có', 'Chạm lấy nét, Panorama, HDR, Tự động lấy nét', 4, 'Có', 'Camera góc rộng, Nhận diện khuôn mặt', 'Android 5.0', 'MT6795 (Helio x10) 8 nhân 64-bit', 8, '2.2', 'PowerVR G6200', 3, 32, 'MicroSD', '2048', 'GSM 850/900/1800/1900', 'HSDPA 850/900/1900/2100', '4G LTE Cat 4', 2, 'Nano SIM', 'Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot', 'A-GPS, GLONASS', 'apt-X, A2DP, LE, V4.1', 'Có', 'Micro USB', 3.50, 'OTG', 'Nguyên khối', 'Nhựa', 'Dài 151 mm - Ngang 72 mm - Dày 9.8 mm', '155 g', 2840, 'Pin chuẩn Li-Po', 'MP4, WMV, H.264(MPEG4-AVC), DivX, Xvid', 'MP3, WMA, FLAC, eAAC+', 'Có', 'Có', 'Mở khóa nhanh bằng vân tay', '12 tháng', '2016-10-28 17:47:29', '2016-10-28 17:47:29'),
(15, 23, 'Trắng & đen', 'IPS LCD', '5', '720 x 1280', 'Cảm ứng điện dung đa điểm', 'Kính thường', 8, 'Có quay phim', 'Có', 'Panorama, HDR, Tự động lấy nét, Chế độ Slow Motion, Chế độ Time-Lapse', 2, 'Có', 'Chế độ làm đẹp', 'Android 5.1', 'MT6580 4 nhân 32-bit', 4, '1.3', 'Mali-400', 2, 16, 'MicroSD', '64', 'GSM 850/900/1800/1900', 'HSDPA 850/900/1900/2100', 'Không hỗ trợ 4G', 2, 'Micro SIM', 'Wi-Fi 802.11 b/g/n, Wi-Fi Direct, Wi-Fi hotspot', 'A-GPS, GLONASS', 'EDR, V4.1', 'Không', 'Micro USB', 3.50, 'Không', 'Pin rời', 'Nhựa', 'Dài 144.5 mm - Ngang 71 mm - Dày 10 mm', '135 g', 2070, 'Pin chuẩn Li-Po', '3GP, MP4, H.264(MPEG4-AVC)', 'MP3, eAAC+', 'Có', 'Có', 'Chạm 2 lần sáng màn hình', '12 tháng', '2016-10-28 22:02:38', '2016-10-28 22:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_lap_tops`
--

CREATE TABLE `chi_tiet_lap_tops` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lt` int(10) UNSIGNED NOT NULL,
  `hang_cpu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `toc_do_cpu` double(8,2) NOT NULL,
  `bo_nho_dem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `toc_do_toi_da` double(8,2) NOT NULL,
  `chipset` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `toc_do_bus` int(11) NOT NULL,
  `ho_tro_ram` int(11) NOT NULL,
  `ram` int(11) NOT NULL,
  `loai_ram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `toc_do_bus_ram` int(11) NOT NULL,
  `loai_o_dia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hdd` int(11) NOT NULL,
  `kich_thuoc_mh` double(8,2) NOT NULL,
  `do_phan_giai_mh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cong_nghe_mh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cam_ung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bo_nho_vag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thiet_ke_vag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kenh_am_thanh` double(8,2) NOT NULL,
  `thong_tin_them` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `co_cd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loai_cd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cong_giao_tiep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tinh_nang_mo_rong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wifi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ket_noi_khac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `do_phan_giai_wc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thong_tin_wc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` int(11) NOT NULL,
  `he_dieu_hanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phan_mem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kich_thuoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trong_luong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chat_lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_phieu_dat_hangs`
--

CREATE TABLE `chi_tiet_phieu_dat_hangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pdh` int(10) UNSIGNED NOT NULL,
  `id_dt` int(10) UNSIGNED NOT NULL,
  `trang_thai` int(11) UNSIGNED DEFAULT '1',
  `so_luong` int(10) UNSIGNED NOT NULL,
  `don_gia` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chi_tiet_phieu_dat_hangs`
--

INSERT INTO `chi_tiet_phieu_dat_hangs` (`id`, `id_pdh`, `id_dt`, `trang_thai`, `so_luong`, `don_gia`, `created_at`, `updated_at`) VALUES
(32, 33, 8, 1, 1, 6490000, '2016-10-23 17:44:43', '2016-10-23 17:44:43'),
(33, 33, 19, 1, 1, 18490000, '2016-10-23 17:44:43', '2016-10-23 17:44:43'),
(34, 34, 1, 1, 1, 13900000, '2016-10-23 19:42:17', '2016-10-23 19:42:17'),
(35, 35, 7, 1, 1, 6990000, '2016-10-24 19:31:11', '2016-10-24 19:31:11'),
(36, 36, 18, 1, 1, 18490000, '2016-10-24 19:48:47', '2016-10-24 19:48:47'),
(37, 37, 2, 1, 1, 13900000, '2016-10-27 22:08:23', '2016-10-27 22:08:23'),
(38, 37, 3, 1, 1, 11490000, '2016-10-27 22:08:23', '2016-10-27 22:08:23'),
(39, 38, 23, 1, 1, 2990000, '2016-11-02 20:53:51', '2016-11-02 20:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `dien_thoais`
--

CREATE TABLE `dien_thoais` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_dt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_nsx` int(10) UNSIGNED NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_luong_con` int(11) NOT NULL,
  `so_luong_ban` int(11) DEFAULT NULL,
  `dt_moi` int(11) DEFAULT NULL,
  `xuat_xu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dien_thoais`
--

INSERT INTO `dien_thoais` (`id`, `ten_dt`, `id_nsx`, `trang_thai`, `mo_ta`, `so_luong_con`, `so_luong_ban`, `dt_moi`, `xuat_xu`, `created_at`, `updated_at`) VALUES
(1, 'Sony Xperia Z5 Dual', 2, 1, 'Điện thoại cao cấp', 1, 0, 1, 'Japan', '2016-09-20 17:00:00', '2016-11-08 23:41:53'),
(2, 'Samsung Galaxy Note 5', 3, 1, '', 36, 3, 1, 'Korea', '2016-10-09 17:00:00', NULL),
(3, 'iPhone SE 16GB', 1, 1, '', 23, 6, 1, 'USA', '2016-10-09 21:21:03', NULL),
(7, 'iPhone 5S 16GB', 1, 1, '', 29, 1, NULL, NULL, '2016-10-08 15:59:03', '2016-10-08 15:59:03'),
(8, 'Samsung Galaxy J7 Prime ', 3, 1, 'Dien thoai moi', 68, 2, NULL, NULL, '2016-10-17 20:35:10', '2016-10-18 21:32:25'),
(9, 'Samsung Galaxy J7 Prime 2017', 3, 2, '', 30, 0, NULL, NULL, '2016-10-17 21:31:01', '2016-10-19 10:04:07'),
(18, 'Samsung Galaxy S7 Edge (Pink Gold Edition)', 3, 1, '', 8, 2, NULL, NULL, '2016-10-20 19:20:16', '2016-10-20 19:20:16'),
(19, 'Samsung Galaxy S7 Edge', 3, 1, '', 8, 2, NULL, NULL, '2016-10-22 19:39:34', '2016-10-22 19:39:34'),
(20, 'OPPO F1s', 4, 1, 'Điện thoại selfie', 100, 0, NULL, NULL, '2016-10-28 17:21:05', '2016-10-28 17:21:05'),
(21, 'Nokia Lumia 730 Dual SIM', 9, 1, '', 0, 0, NULL, NULL, '2016-10-28 17:31:23', '2016-10-28 21:47:00'),
(22, 'HTC One ME', 5, 1, '', 50, 0, NULL, NULL, '2016-10-28 17:42:39', '2016-10-28 17:42:39'),
(23, 'Asus Zenfone Go ZC500TG', 6, 1, 'Điện thoại giá sinh viên, cấu hình mạnh mẽ', 100, 0, NULL, NULL, '2016-10-28 21:51:54', '2016-10-28 21:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `gia_dien_thoais`
--

CREATE TABLE `gia_dien_thoais` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dt` int(10) UNSIGNED NOT NULL,
  `gia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gia_dien_thoais`
--

INSERT INTO `gia_dien_thoais` (`id`, `id_dt`, `gia`, `created_at`, `updated_at`) VALUES
(1, 2, 13900000, NULL, NULL),
(2, 1, 13900000, NULL, '2016-11-08 23:41:53'),
(3, 3, 11490000, NULL, NULL),
(4, 7, 6990000, NULL, NULL),
(5, 8, 6490000, NULL, '2016-10-18 21:32:27'),
(6, 9, 6290000, NULL, '2016-10-19 10:04:07'),
(12, 18, 18490000, '2016-10-20 19:20:17', '2016-10-20 19:20:17'),
(13, 19, 18490000, '2016-10-22 19:39:34', '2016-10-22 19:39:34'),
(14, 20, 5990000, '2016-10-28 17:21:06', '2016-10-28 17:21:06'),
(15, 21, 2990000, '2016-10-28 17:31:23', '2016-10-28 21:47:00'),
(16, 22, 6490000, '2016-10-28 17:42:41', '2016-10-28 17:42:41'),
(17, 23, 2990000, '2016-10-28 21:51:54', '2016-10-28 21:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `gia_lap_tops`
--

CREATE TABLE `gia_lap_tops` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lt` int(10) UNSIGNED NOT NULL,
  `gia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hang_san_xuats`
--

CREATE TABLE `hang_san_xuats` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hang_san_xuats`
--

INSERT INTO `hang_san_xuats` (`id`, `ten`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 1, NULL, NULL),
(2, 'Sony', 1, NULL, NULL),
(3, 'Samsung', 1, NULL, NULL),
(4, 'OPPO', 1, NULL, NULL),
(5, 'HTC', 1, NULL, NULL),
(6, 'Asus', 1, NULL, NULL),
(7, 'LG', 1, NULL, NULL),
(8, 'Lenovo', 1, NULL, NULL),
(9, 'Nokia', 1, NULL, NULL),
(10, 'WIKO', 1, NULL, NULL),
(13, 'Obi', 1, NULL, NULL),
(14, 'Masstel', 1, '2016-10-21 09:23:49', '2016-10-21 09:23:49'),
(16, 'ZTE', 2, '2016-10-23 18:40:48', '2016-10-23 18:40:48'),
(17, 'Philips', 2, '2016-10-23 18:45:28', '2016-10-23 18:45:28'),
(18, 'Xiaomi', 2, '2016-10-23 18:47:32', '2016-10-23 18:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_dien_thoais`
--

CREATE TABLE `hinh_anh_dien_thoais` (
  `id` int(10) UNSIGNED NOT NULL,
  `loai_hinh` int(10) UNSIGNED NOT NULL,
  `hinh_dt` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinh_anh_dien_thoais`
--

INSERT INTO `hinh_anh_dien_thoais` (`id`, `loai_hinh`, `hinh_dt`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'public/smartstore/images/mobile/sony-xperia-z5--1.jpg', NULL, NULL),
(2, 2, 1, 'public/smartstore/images/mobile/sony-xperia-z5--1.jpg', NULL, NULL),
(4, 2, 1, 'public/smartstore/images/mobile/sony-xperia-z5--2.jpg', NULL, NULL),
(5, 2, 1, 'public/smartstore/images/mobile/sony-xperia-z5--3.jpg', NULL, NULL),
(6, 2, 1, 'public/smartstore/images/mobile/sony-xperia-z5--5.jpg', NULL, NULL),
(7, 2, 1, 'public/smartstore/images/mobile/sony-xperia-z5--7.jpg', NULL, NULL),
(8, 1, 2, 'public/smartstore/images/mobile/samsung-galaxy-note-5--6.jpg', NULL, NULL),
(10, 2, 2, 'public/smartstore/images/mobile/samsung-galaxy-note-5--2.jpg', NULL, NULL),
(11, 2, 2, 'public/smartstore/images/mobile/samsung-galaxy-note-5--3.jpg', NULL, NULL),
(12, 2, 2, 'public/smartstore/images/mobile/samsung-galaxy-note-5--4.jpg', NULL, NULL),
(13, 2, 2, 'public/smartstore/images/mobile/samsung-galaxy-note-5--5.jpg', NULL, NULL),
(14, 2, 2, 'public/smartstore/images/mobile/samsung-galaxy-note-5--6.jpg', NULL, NULL),
(15, 2, 2, 'public/smartstore/images/mobile/samsung-galaxy-note-5--7.jpg', NULL, NULL),
(16, 3, 1, 'public/smartstore/images/mobile/sony-xperia-z5-full-details.jpg', NULL, NULL),
(17, 3, 2, 'public/smartstore/images/mobile/samsung-galaxy-note-5-details.jpg', NULL, NULL),
(18, 4, 1, 'public/smartstore/images/mobile/sony-xperia-z5.jpg', NULL, NULL),
(19, 4, 2, 'public/smartstore/images/mobile/samsung-galaxy-note-5.jpg', NULL, NULL),
(21, 1, 3, 'public/smartstore/images/mobile/iphone-se-16gb/iphone-se-16gb.jpg', NULL, NULL),
(31, 2, 3, 'public/smartstore/images/mobile/iphone-se-16gb/iphone-se-16gb--1.jpg', NULL, NULL),
(32, 2, 3, 'public/smartstore/images/mobile/iphone-se-16gb/iphone-se-16gb--2.jpg', NULL, NULL),
(33, 2, 3, 'public/smartstore/images/mobile/iphone-se-16gb/iphone-se-16gb--3.jpg', NULL, NULL),
(34, 2, 3, 'public/smartstore/images/mobile/iphone-se-16gb/iphone-se-16gb--4.jpg', NULL, NULL),
(35, 2, 3, 'public/smartstore/images/mobile/iphone-se-16gb/iphone-se-16gb--5.jpg', NULL, NULL),
(36, 3, 3, 'public/smartstore/images/mobile/iphone-se-16gb/iphone-se-16gb-mo-ta-chuc-nang.jpg', NULL, NULL),
(37, 4, 3, 'public/smartstore/images/mobile/iphone-se-16gb/iphone-se-16gb-400x460.png', NULL, NULL),
(39, 1, 7, 'public/smartstore/uploads\\iphone-5s-16gb-16.jpg', '2016-10-08 15:59:04', '2016-10-08 15:59:04'),
(40, 2, 7, 'public/smartstore/uploads\\iphone-5s-16gb---1.jpg', '2016-10-08 15:59:04', '2016-10-08 15:59:04'),
(41, 2, 7, 'public/smartstore/uploads\\iphone-5s-16gb---2.jpg', '2016-10-08 15:59:04', '2016-10-08 15:59:04'),
(42, 2, 7, 'public/smartstore/uploads\\iphone-5s-16gb---3.jpg', '2016-10-08 15:59:05', '2016-10-08 15:59:05'),
(43, 2, 7, 'public/smartstore/uploads\\iphone-5s-16gb---4.jpg', '2016-10-08 15:59:05', '2016-10-08 15:59:05'),
(44, 2, 7, 'public/smartstore/uploads\\iphone-5s-16gb---5.jpg', '2016-10-08 15:59:05', '2016-10-08 15:59:05'),
(45, 3, 7, 'public/smartstore/uploads\\tinh-nang-iphone-5S.jpg', '2016-10-08 15:59:05', '2016-10-08 15:59:05'),
(46, 4, 7, 'public/smartstore/uploads\\iphone-5s-16gb-6-400x460.png', '2016-10-08 15:59:05', '2016-10-08 15:59:05'),
(47, 1, 8, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime-2017\\samsung-galaxy-j7-prime-600-277.jpg', '2016-10-17 20:35:11', '2016-10-18 20:35:08'),
(48, 2, 8, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime\\samsung-galaxy-j7-prime--1.jpg', '2016-10-17 20:35:11', '2016-10-17 20:35:11'),
(49, 2, 8, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime\\samsung-galaxy-j7-prime--2.jpg', '2016-10-17 20:35:11', '2016-10-17 20:35:11'),
(50, 2, 8, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime\\samsung-galaxy-j7-prime--3.jpg', '2016-10-17 20:35:11', '2016-10-17 20:35:11'),
(51, 2, 8, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime\\samsung-galaxy-j7-prime--4.jpg', '2016-10-17 20:35:11', '2016-10-17 20:35:11'),
(52, 2, 8, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime\\samsung-galaxy-j7-prime-bo-ban-hang-chuan-org.jpg', '2016-10-17 20:35:11', '2016-10-17 20:35:11'),
(53, 3, 8, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime\\samsung-galaxy-j7-prime-mo-ta-chuc-nang.jpg', '2016-10-17 20:35:11', '2016-10-17 20:35:11'),
(54, 4, 8, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime\\samsung-galaxy-j7-prime-1-400x460.png', '2016-10-17 20:35:11', '2016-10-17 20:35:11'),
(56, 2, 9, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime-2016\\samsung-galaxy-j7-prime--1.jpg', '2016-10-17 21:31:02', '2016-10-17 21:31:02'),
(57, 2, 9, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime-2016\\samsung-galaxy-j7-prime--2.jpg', '2016-10-17 21:31:03', '2016-10-17 21:31:03'),
(58, 2, 9, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime-2016\\samsung-galaxy-j7-prime--3.jpg', '2016-10-17 21:31:03', '2016-10-17 21:31:03'),
(59, 2, 9, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime-2016\\samsung-galaxy-j7-prime--4.jpg', '2016-10-17 21:31:03', '2016-10-17 21:31:03'),
(60, 2, 9, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime-2016\\samsung-galaxy-j7-prime-bo-ban-hang-chuan-org.jpg', '2016-10-17 21:31:04', '2016-10-17 21:31:04'),
(61, 3, 9, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime-2016\\samsung-galaxy-j7-prime-mo-ta-chuc-nang.jpg', '2016-10-17 21:31:04', '2016-10-17 21:31:04'),
(63, 1, 9, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime-2017\\samsung-galaxy-j7-prime-600-277.jpg', NULL, '2016-10-18 21:22:02'),
(64, 4, 9, 'public/smartstore/uploads/Samsung-Galaxy-J7-Prime-2017\\samsung-galaxy-j7-prime-1-400x460.png', NULL, '2016-10-19 10:04:07'),
(105, 1, 18, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge-(Pink-Gold-Edition)\\samsung-galaxy-s7-edge-pink-gold-edition-ft.jpg', '2016-10-20 19:20:16', '2016-10-20 19:20:16'),
(106, 2, 18, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge-(Pink-Gold-Edition)\\s7-edge-pink.jpg', '2016-10-20 19:20:17', '2016-10-20 19:20:17'),
(107, 2, 18, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge-(Pink-Gold-Edition)\\samsung-galaxy-s7-edge--2.jpg', '2016-10-20 19:20:17', '2016-10-20 19:20:17'),
(108, 2, 18, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge-(Pink-Gold-Edition)\\samsung-galaxy-s7-edge--4.jpg', '2016-10-20 19:20:17', '2016-10-20 19:20:17'),
(109, 2, 18, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge-(Pink-Gold-Edition)\\samsung-galaxy-s7-edge--6.jpg', '2016-10-20 19:20:17', '2016-10-20 19:20:17'),
(110, 2, 18, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge-(Pink-Gold-Edition)\\samsung-galaxy-s7-edge-pink-gold-edition-bobanhangchuan2-org.jpg', '2016-10-20 19:20:17', '2016-10-20 19:20:17'),
(111, 3, 18, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge-(Pink-Gold-Edition)\\samsung-galaxy-s7-edge-pink-gold-edition-mo-ta-chuc-nang2.jpg', '2016-10-20 19:20:17', '2016-10-20 19:20:17'),
(112, 4, 18, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge-(Pink-Gold-Edition)\\samsung-galaxy-s7-edge-pink-gold-edition-400x460.png', '2016-10-20 19:20:17', '2016-10-20 19:20:17'),
(113, 1, 19, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge\\samsung-galaxy-s7-edge-600-277-7.jpg', '2016-10-22 19:39:34', '2016-10-22 19:39:34'),
(114, 2, 19, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge\\samsung-galaxy-s7-edge--3.jpg', '2016-10-22 19:39:34', '2016-10-22 19:39:34'),
(115, 2, 19, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge\\samsung-galaxy-s7-edge--4.jpg', '2016-10-22 19:39:34', '2016-10-22 19:39:34'),
(116, 2, 19, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge\\samsung-galaxy-s7-edge--6.jpg', '2016-10-22 19:39:34', '2016-10-22 19:39:34'),
(117, 2, 19, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge\\samsung-galaxy-s7-edge--9.jpg', '2016-10-22 19:39:34', '2016-10-22 19:39:34'),
(118, 2, 19, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge\\samsung-galaxy-s7-edge-bobanhangchuan-org.jpg', '2016-10-22 19:39:34', '2016-10-22 19:39:34'),
(119, 3, 19, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge\\samsung-galaxy-s7-edge-mo-ta-chuc-nang.jpg', '2016-10-22 19:39:34', '2016-10-22 19:39:34'),
(120, 4, 19, 'public/smartstore/uploads/Samsung-Galaxy-S7-Edge\\samsung-galaxy-s7-edge-1-400x460.png', '2016-10-22 19:39:34', '2016-10-22 19:39:34'),
(121, 1, 20, 'public/smartstore/uploads/Oppo-F1S\\oppo-f1s-ft-1.jpg', '2016-10-28 17:21:05', '2016-10-28 17:21:05'),
(122, 2, 20, 'public/smartstore/uploads/Oppo-F1S\\oppo-f1s-slider01-copy.jpg', '2016-10-28 17:21:06', '2016-10-28 17:21:06'),
(123, 2, 20, 'public/smartstore/uploads/Oppo-F1S\\oppo-f1s-slider05.jpg', '2016-10-28 17:21:06', '2016-10-28 17:21:06'),
(124, 2, 20, 'public/smartstore/uploads/Oppo-F1S\\oppo-f1s-slider03-copy.jpg', '2016-10-28 17:21:06', '2016-10-28 17:21:06'),
(125, 2, 20, 'public/smartstore/uploads/Oppo-F1S\\oppo-f1s-slider04.jpg', '2016-10-28 17:21:06', '2016-10-28 17:21:06'),
(126, 2, 20, 'public/smartstore/uploads/Oppo-F1S\\oppo-f1s-bobanhangchuan1-org.jpg', '2016-10-28 17:21:06', '2016-10-28 17:21:06'),
(127, 3, 20, 'public/smartstore/uploads/Oppo-F1S\\oppo-f1s-mo-ta-chuc-nang.jpg', '2016-10-28 17:21:06', '2016-10-28 17:21:06'),
(128, 4, 20, 'public/smartstore/uploads/Oppo-F1S\\oppo-f1s-hero-400x460-400x460.png', '2016-10-28 17:21:06', '2016-10-28 17:21:06'),
(129, 1, 21, 'public/smartstore/uploads/Nokia-Lumia-730-Dual-Sim\\1.jpg', '2016-10-28 17:31:23', '2016-10-28 21:45:38'),
(130, 2, 21, 'public/smartstore/uploads/Nokia-Lumia-730-Dual-Sim\\1.jpg', '2016-10-28 17:31:23', '2016-10-28 17:31:23'),
(131, 2, 21, 'public/smartstore/uploads/Nokia-Lumia-730-Dual-Sim\\2.jpg', '2016-10-28 17:31:23', '2016-10-28 17:31:23'),
(132, 2, 21, 'public/smartstore/uploads/Nokia-Lumia-730-Dual-Sim\\3.jpg', '2016-10-28 17:31:23', '2016-10-28 17:31:23'),
(133, 2, 21, 'public/smartstore/uploads/Nokia-Lumia-730-Dual-Sim\\5.1.jpg', '2016-10-28 17:31:23', '2016-10-28 17:31:23'),
(134, 2, 21, 'public/smartstore/uploads/Nokia-Lumia-730-Dual-Sim\\nokia-lumia-730-dual-sim-bobanhangchuan1-org.jpg', '2016-10-28 17:31:23', '2016-10-28 17:31:23'),
(135, 3, 21, 'public/smartstore/uploads/Nokia-Lumia-730-Dual-Sim\\nokia-lumia-730-dual-sim-mo-ta-chuc-nang-1.jpg', '2016-10-28 17:31:23', '2016-10-28 21:47:00'),
(136, 4, 21, 'public/smartstore/uploads/Nokia-Lumia-730-Dual-Sim\\nokia-lumia-730-dual-sim-11-300x300.jpg', '2016-10-28 17:31:23', '2016-10-28 21:47:00'),
(137, 1, 22, 'public/smartstore/uploads/Htc-One-Me\\htc-one-me-feature-1.jpg', '2016-10-28 17:42:40', '2016-10-28 17:42:40'),
(138, 2, 22, 'public/smartstore/uploads/Htc-One-Me\\one-me-1.jpg', '2016-10-28 17:42:41', '2016-10-28 17:42:41'),
(139, 2, 22, 'public/smartstore/uploads/Htc-One-Me\\one-me-2.jpg', '2016-10-28 17:42:41', '2016-10-28 17:42:41'),
(140, 2, 22, 'public/smartstore/uploads/Htc-One-Me\\one-me-3.jpg', '2016-10-28 17:42:41', '2016-10-28 17:42:41'),
(141, 2, 22, 'public/smartstore/uploads/Htc-One-Me\\one-me-4.jpg', '2016-10-28 17:42:41', '2016-10-28 17:42:41'),
(142, 2, 22, 'public/smartstore/uploads/Htc-One-Me\\htc-one-me-bobanhangchuan-org.jpg', '2016-10-28 17:42:41', '2016-10-28 17:42:41'),
(143, 3, 22, 'public/smartstore/uploads/Htc-One-Me\\htc-one-me-mo-ta-chuc-nang.jpg', '2016-10-28 17:42:41', '2016-10-28 17:42:41'),
(144, 4, 22, 'public/smartstore/uploads/Htc-One-Me\\htc-one-me9-global-gold-sepia-sketchfab-443x425.png', '2016-10-28 17:42:41', '2016-10-28 17:42:41'),
(145, 1, 23, 'public/smartstore/uploads/Asus-Zenfone-Go-Zc500Tg\\asus-zenfone-go-zc500tg--2.jpg', '2016-10-28 21:51:54', '2016-10-28 21:51:54'),
(146, 2, 23, 'public/smartstore/uploads/Asus-Zenfone-Go-Zc500Tg\\asus-zenfone-go-zc500tg--1.jpg', '2016-10-28 21:51:54', '2016-10-28 21:51:54'),
(147, 2, 23, 'public/smartstore/uploads/Asus-Zenfone-Go-Zc500Tg\\asus-zenfone-go-zc500tg--2.jpg', '2016-10-28 21:51:54', '2016-10-28 21:51:54'),
(148, 2, 23, 'public/smartstore/uploads/Asus-Zenfone-Go-Zc500Tg\\asus-zenfone-go-zc500tg--3.jpg', '2016-10-28 21:51:54', '2016-10-28 21:51:54'),
(149, 2, 23, 'public/smartstore/uploads/Asus-Zenfone-Go-Zc500Tg\\asus-zenfone-go-zc500tg--4.gif', '2016-10-28 21:51:54', '2016-10-28 21:51:54'),
(150, 2, 23, 'public/smartstore/uploads/Asus-Zenfone-Go-Zc500Tg\\asus-zenfone-go-zc500tg-bobanhangchuan-org.jpg', '2016-10-28 21:51:54', '2016-10-28 21:51:54'),
(151, 3, 23, 'public/smartstore/uploads/Asus-Zenfone-Go-Zc500Tg\\asus-zenfone-go-zc500tg-mo-ta-chuc-nang-1.jpg', '2016-10-28 21:51:54', '2016-10-28 21:51:54'),
(152, 4, 23, 'public/smartstore/uploads/Asus-Zenfone-Go-Zc500Tg\\asus-zenfone-go-zc500tg-1-400x460.png', '2016-10-28 21:51:54', '2016-10-28 21:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_laps`
--

CREATE TABLE `hinh_anh_laps` (
  `id` int(10) UNSIGNED NOT NULL,
  `loai_hinh` int(10) UNSIGNED NOT NULL,
  `hinh_lt` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hangs`
--

CREATE TABLE `khach_hangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioi_tinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dia_chi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hangs`
--

INSERT INTO `khach_hangs` (`id`, `ho_ten`, `gioi_tinh`, `email`, `sdt`, `dia_chi`, `created_at`, `updated_at`) VALUES
(43, 'Minh Khoi', 'Nam', 'khoi@gmail.com', '01676506019', 'Ca Mau', '2016-10-23 17:44:43', '2016-10-23 17:44:43'),
(44, 'Phuoc Loc', 'Nam', 'phuocloc@gmail.com', '01676506019', 'An Giang', '2016-10-23 19:42:16', '2016-10-23 19:42:16'),
(45, 'Nguyễn Văn A', 'Nam', 'nguyena@gmail.com', '01676506019', 'Chợ Mới, An Giang', '2016-10-24 19:31:11', '2016-10-24 19:31:11'),
(46, 'Thanh Tâm Tài Nhân', 'Nam', 'thanhnhan@gmail.com', '01676506019', 'Chợ Mới, An Giang', '2016-10-24 19:47:39', '2016-10-24 19:47:39'),
(47, 'Thanh Tâm Tài Nhân', 'Nam', 'thanhnhan@gmail.com', '01676506019', 'Chợ Mới, An Giang', '2016-10-24 19:48:46', '2016-10-24 19:48:46'),
(48, 'Nguyễn Văn Nhập Đại', 'Nam', 'nhapdai@gmail.com', '01676506019', 'Chợ Mới, An Giang', '2016-10-24 22:28:05', '2016-10-24 22:28:05'),
(49, 'Nguyễn Văn Khách Hàng', 'Nam', 'khachhang@gmail.com', '01676506019', 'Chợ Mới, An Giang', '2016-10-27 22:08:23', '2016-10-27 22:08:23'),
(50, 'Nguyễn Văn Nhập Đại', 'Nam', 'dai@gmail.com', '01676506019', 'Châu Thành, Kiên Giang', '2016-11-02 20:53:51', '2016-11-02 20:53:51'),
(51, 'Nguyễn Văn Nhập Đại', 'Nam', 'dai@gmail.com', '01676506019', 'Châu Thành, Kiên Giang', '2016-11-02 20:56:00', '2016-11-02 20:56:00'),
(52, 'Nguyễn Văn Nhập Đại', 'Nam', 'dai@gmail.com', '01676506019', 'Châu Thành, Kiên Giang', '2016-11-02 20:57:39', '2016-11-02 20:57:39'),
(53, 'Nguyễn Văn Nhập Đại', 'Nam', 'dai@gmail.com', '01676506019', 'Châu Thành, Kiên Giang', '2016-11-02 20:58:56', '2016-11-02 20:58:56'),
(54, 'Nguyễn Văn Nhập Đại', 'Nam', 'dai@gmail.com', '01676506019', 'Châu Thành, Kiên Giang', '2016-11-02 21:00:03', '2016-11-02 21:00:03'),
(55, 'Nguyễn Văn Nhập Đại', 'Nam', 'dai@gmail.com', '01676506019', 'Châu Thành, Kiên Giang', '2016-11-02 21:01:27', '2016-11-02 21:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_lt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_nsx` int(10) UNSIGNED NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_luong_con` int(11) NOT NULL,
  `so_luong_ban` int(11) NOT NULL,
  `lt_moi` int(11) NOT NULL,
  `xuat_xu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_hinh_anhs`
--

CREATE TABLE `loai_hinh_anhs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_loai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai_hinh_anhs`
--

INSERT INTO `loai_hinh_anhs` (`id`, `ten_loai`, `created_at`, `updated_at`) VALUES
(1, 'Hình ảnh quảng cáo', NULL, NULL),
(2, 'Hình ảnh đặc điểm nổi bật', NULL, NULL),
(3, 'Hình ảnh mô tả chức năng', NULL, NULL),
(4, 'Hình ảnh hiển thị giỏ hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loai_nguoi_dungs`
--

CREATE TABLE `loai_nguoi_dungs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_loai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai_nguoi_dungs`
--

INSERT INTO `loai_nguoi_dungs` (`id`, `ten_loai`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, NULL),
(2, 'Khách hàng', NULL, NULL),
(3, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_01_172024_News', 1),
('2016_09_01_181043_Products', 1),
('2016_09_01_181605_Images_products', 1),
('2016_09_08_094934_UserSystem', 1),
('2016_09_10_160430_create_thanh_viens_table', 1),
('2016_09_16_113538_create_hoc_sinhs_table', 1),
('2016_09_20_072147_create_mobiles_table', 1),
('2016_09_20_072501_create_detail_mobiles_table', 2),
('2016_09_20_074138_create_prices_table', 3),
('2016_09_20_105541_create_hang_san_xuats_table', 4),
('2016_09_20_105912_create_loai_nguoi_dungs_table', 5),
('2016_09_20_110137_create_nguoi_dungs_table', 6),
('2016_09_20_113212_create_loai_hinh_anhs_table', 7),
('2016_09_20_114232_create_hinh_anhs_table', 7),
('2016_09_20_115606_create_dien_thoais_table', 8),
('2016_09_20_120501_create_laptops_table', 9),
('2016_09_20_123446_create_hinh_anh_dien_thoais_table', 10),
('2016_09_20_123810_create_hinh_anh_lap_tops_table', 11),
('2016_09_20_144853_create_chi_tiet_dien_thoais_table', 12),
('2016_09_20_154224_create_hinh_anh_laps_table', 13),
('2016_09_20_154855_create_chi_tiet_lap_tops_table', 14),
('2016_09_20_161723_create_gia_dien_thoais_table', 15),
('2016_09_20_164835_create_gia_lap_tops_table', 16),
('2016_10_05_180609_create_khach_hangs_table', 17),
('2016_10_05_183441_create_phieu_dat_hangs_table', 18),
('2016_10_05_185042_create_phieu_dat_hang_dien_thoais_table', 19),
('2016_10_05_185625_create_chi_tiet_phieu_dat_hangs_table', 20),
('2016_10_26_032545_create_binh_luans_table', 21),
('2016_11_04_002652_create_quang_caos_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieu_dat_hang_dien_thoais`
--

CREATE TABLE `phieu_dat_hang_dien_thoais` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kh` int(10) UNSIGNED NOT NULL,
  `tong_tien` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_dat` date NOT NULL,
  `ngay_nhan` date DEFAULT NULL,
  `cach_nhan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `id_admin` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieu_dat_hang_dien_thoais`
--

INSERT INTO `phieu_dat_hang_dien_thoais` (`id`, `id_kh`, `tong_tien`, `ngay_dat`, `ngay_nhan`, `cach_nhan`, `trang_thai`, `id_admin`, `created_at`, `updated_at`) VALUES
(33, 43, '24.980.000', '2016-10-24', '2016-10-25', 'Giao hàng thu tiền tại nhà', 2, 3, '2016-10-23 17:44:43', '2016-10-23 17:44:43'),
(34, 44, '13.900.000', '2016-10-24', '2016-10-27', 'Giao hàng thu tiền tại nhà', 2, 5, '2016-10-23 19:42:17', '2016-10-23 19:42:17'),
(35, 45, '6.990.000', '2016-10-25', '2016-10-30', 'Thanh toán tại cửa hàng', 2, 3, '2016-10-24 19:31:11', '2016-10-24 19:31:11'),
(36, 47, '18.490.000', '2016-10-25', '2016-10-29', 'Thanh toán tại cửa hàng', 2, 3, '2016-10-24 19:48:47', '2016-10-24 19:48:47'),
(37, 49, '25.390.000', '2016-10-28', '2016-10-30', 'Giao hàng thu tiền tại nhà', 2, 3, '2016-10-27 22:08:23', '2016-10-27 22:08:23'),
(38, 50, '2.990.000', '2016-11-03', NULL, 'Thanh toán tại cửa hàng', 1, NULL, '2016-11-02 20:53:51', '2016-11-02 20:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `quang_caos`
--

CREATE TABLE `quang_caos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dt` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quang_caos`
--

INSERT INTO `quang_caos` (`id`, `id_dt`, `img`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 8, 'public/smartstore/quangcao/uploads/samsung-galaxy-j7.png', 1, NULL, NULL),
(2, 20, 'public/smartstore/quangcao/uploads/oppo-f1s.jpg', 1, NULL, NULL),
(3, 23, 'public/smartstore/quangcao/uploads/asus-zenfone-go.jpg', 2, NULL, NULL),
(6, 19, 'public/smartstore/quangcao/uploads/samsung-galaxy-s7.jpg', 1, NULL, NULL),
(9, 23, 'public/smartstore/quangcao/uploads\\asus-zenfone-go.jpg', 1, '2016-11-08 23:50:17', '2016-11-08 23:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Đỗ Phước Lộc', 'doloccit@gmail.com', '$2y$10$2i.Gzbfrsr8XWwufOIwuS.5WVUsJ.IopscwdEQNvMFE5T6MXvlkmG', 1, 1, 'odbCIE6XOAxFKuXoskZWL4FRuw14KppDVAG2bBFfOhp3mbTh3BhPg5ZTJevY', '2016-10-12 18:33:59', '2016-11-03 16:57:22'),
(5, 'Thanh Lộc', 'thanhloc@gmail.com', '$2y$10$jD7IEJpinRe8BcVpeDWm9utgG6NIHzyUunvEfJEs1gwKy5SiSYxFa', 1, 1, 'ZY8qeP8HdcjEJfwGPnpxYaAeCSSFswvTRo59QWekzcfiZwdo0OPlzoypxNHI', '2016-10-12 21:03:46', '2016-10-27 19:17:57'),
(8, 'Nguyễn Phạm Minh Khôi', 'ngminhkhoi@gmail.com', '$2y$10$p8XlABnh4l.ZumdrvNqW2.h5hBcswES5u3Mrpz4ZledQhYzYnwR52', 3, 1, 'jQNvsoP8Arp6VUgmk0ZkcmbzstHQx2ahof8FRGlDXX1OkkdhpsMR1vEJcya3', '2016-10-27 19:28:59', '2016-10-27 23:08:20'),
(9, 'Nguyễn Thiện Ân', 'ngthienan@gmail.com', '$2y$10$fBJOJWsS2w3Y4xBs85bHYunsxPL3i3/zcaqfsYK7sKM0WeyCEGT/m', 3, 1, NULL, '2016-10-27 19:29:19', '2016-10-27 19:29:19'),
(11, 'Nguyễn Văn Khách Hàng', 'khachhang@gmail.com', '$2y$10$9hl0QAqD2odQ.D7p6h5U3uobrw/IKMVYshNjvX11klF/sOvjp/oya', 2, 1, NULL, '2016-10-27 22:07:51', '2016-10-27 22:07:51'),
(12, 'Trần Thanh Tâm', 'thanhtam@gmail.com', '$2y$10$eeGkJOQBhBN4CKC/TrvF8OZUphhMLteJ4WUfvJhFeyH0Zan3HsLaa', 3, 1, NULL, '2016-10-27 23:05:44', '2016-10-27 23:05:44'),
(14, 'Phước Lộc', 'phuocloc@gmail.com', '$2y$10$uINFOhSL0vDnbWMEOGD3/edNSAxaYiYLoaF9H1QR3IAqG9uAmG47e', 3, 1, NULL, '2016-10-29 21:53:13', '2016-10-29 21:53:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binh_luans_id_dt_foreign` (`id_dt`);

--
-- Indexes for table `chi_tiet_dien_thoais`
--
ALTER TABLE `chi_tiet_dien_thoais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dt` (`id_dt`);

--
-- Indexes for table `chi_tiet_lap_tops`
--
ALTER TABLE `chi_tiet_lap_tops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_lap_tops_id_lt_foreign` (`id_lt`);

--
-- Indexes for table `chi_tiet_phieu_dat_hangs`
--
ALTER TABLE `chi_tiet_phieu_dat_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_phieu_dat_hangs_id_pdh_foreign` (`id_pdh`),
  ADD KEY `chi_tiet_phieu_dat_hangs_id_dt_foreign` (`id_dt`);

--
-- Indexes for table `dien_thoais`
--
ALTER TABLE `dien_thoais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dien_thoais_id_nsx_foreign` (`id_nsx`);

--
-- Indexes for table `gia_dien_thoais`
--
ALTER TABLE `gia_dien_thoais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dt` (`id_dt`);

--
-- Indexes for table `gia_lap_tops`
--
ALTER TABLE `gia_lap_tops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gia_lap_tops_id_lt_foreign` (`id_lt`);

--
-- Indexes for table `hang_san_xuats`
--
ALTER TABLE `hang_san_xuats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinh_anh_dien_thoais`
--
ALTER TABLE `hinh_anh_dien_thoais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinh_anh_dien_thoais_loai_hinh_foreign` (`loai_hinh`),
  ADD KEY `hinh_dt` (`hinh_dt`);

--
-- Indexes for table `hinh_anh_laps`
--
ALTER TABLE `hinh_anh_laps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinh_anh_laps_loai_hinh_foreign` (`loai_hinh`),
  ADD KEY `hinh_anh_laps_hinh_lt_foreign` (`hinh_lt`);

--
-- Indexes for table `khach_hangs`
--
ALTER TABLE `khach_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laptops_id_nsx_foreign` (`id_nsx`);

--
-- Indexes for table `loai_hinh_anhs`
--
ALTER TABLE `loai_hinh_anhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_nguoi_dungs`
--
ALTER TABLE `loai_nguoi_dungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `phieu_dat_hang_dien_thoais`
--
ALTER TABLE `phieu_dat_hang_dien_thoais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phieu_dat_hang_dien_thoais_id_kh_foreign` (`id_kh`);

--
-- Indexes for table `quang_caos`
--
ALTER TABLE `quang_caos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quang_caos_id_dt_foreign` (`id_dt`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `chi_tiet_dien_thoais`
--
ALTER TABLE `chi_tiet_dien_thoais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `chi_tiet_lap_tops`
--
ALTER TABLE `chi_tiet_lap_tops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chi_tiet_phieu_dat_hangs`
--
ALTER TABLE `chi_tiet_phieu_dat_hangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `dien_thoais`
--
ALTER TABLE `dien_thoais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `gia_dien_thoais`
--
ALTER TABLE `gia_dien_thoais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `gia_lap_tops`
--
ALTER TABLE `gia_lap_tops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hang_san_xuats`
--
ALTER TABLE `hang_san_xuats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `hinh_anh_dien_thoais`
--
ALTER TABLE `hinh_anh_dien_thoais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `hinh_anh_laps`
--
ALTER TABLE `hinh_anh_laps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `khach_hangs`
--
ALTER TABLE `khach_hangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loai_hinh_anhs`
--
ALTER TABLE `loai_hinh_anhs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `loai_nguoi_dungs`
--
ALTER TABLE `loai_nguoi_dungs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `phieu_dat_hang_dien_thoais`
--
ALTER TABLE `phieu_dat_hang_dien_thoais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `quang_caos`
--
ALTER TABLE `quang_caos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `binh_luans_id_dt_foreign` FOREIGN KEY (`id_dt`) REFERENCES `dien_thoais` (`id`);

--
-- Constraints for table `chi_tiet_dien_thoais`
--
ALTER TABLE `chi_tiet_dien_thoais`
  ADD CONSTRAINT `chi_tiet_dien_thoais_ibfk_1` FOREIGN KEY (`id_dt`) REFERENCES `dien_thoais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chi_tiet_dien_thoais_id_dt_foreign` FOREIGN KEY (`id_dt`) REFERENCES `dien_thoais` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `chi_tiet_lap_tops`
--
ALTER TABLE `chi_tiet_lap_tops`
  ADD CONSTRAINT `chi_tiet_lap_tops_id_lt_foreign` FOREIGN KEY (`id_lt`) REFERENCES `laptops` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `chi_tiet_phieu_dat_hangs`
--
ALTER TABLE `chi_tiet_phieu_dat_hangs`
  ADD CONSTRAINT `chi_tiet_phieu_dat_hangs_id_dt_foreign` FOREIGN KEY (`id_dt`) REFERENCES `dien_thoais` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_phieu_dat_hangs_id_pdh_foreign` FOREIGN KEY (`id_pdh`) REFERENCES `phieu_dat_hang_dien_thoais` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `dien_thoais`
--
ALTER TABLE `dien_thoais`
  ADD CONSTRAINT `dien_thoais_id_nsx_foreign` FOREIGN KEY (`id_nsx`) REFERENCES `hang_san_xuats` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `gia_dien_thoais`
--
ALTER TABLE `gia_dien_thoais`
  ADD CONSTRAINT `gia_dien_thoais_ibfk_1` FOREIGN KEY (`id_dt`) REFERENCES `dien_thoais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gia_dien_thoais_id_dt_foreign` FOREIGN KEY (`id_dt`) REFERENCES `dien_thoais` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `gia_lap_tops`
--
ALTER TABLE `gia_lap_tops`
  ADD CONSTRAINT `gia_lap_tops_id_lt_foreign` FOREIGN KEY (`id_lt`) REFERENCES `laptops` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `hinh_anh_dien_thoais`
--
ALTER TABLE `hinh_anh_dien_thoais`
  ADD CONSTRAINT `hinh_anh_dien_thoais_hinh_dt_foreign` FOREIGN KEY (`hinh_dt`) REFERENCES `dien_thoais` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hinh_anh_dien_thoais_ibfk_1` FOREIGN KEY (`hinh_dt`) REFERENCES `dien_thoais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hinh_anh_dien_thoais_loai_hinh_foreign` FOREIGN KEY (`loai_hinh`) REFERENCES `loai_hinh_anhs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `hinh_anh_laps`
--
ALTER TABLE `hinh_anh_laps`
  ADD CONSTRAINT `hinh_anh_laps_hinh_lt_foreign` FOREIGN KEY (`hinh_lt`) REFERENCES `laptops` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hinh_anh_laps_loai_hinh_foreign` FOREIGN KEY (`loai_hinh`) REFERENCES `loai_hinh_anhs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `laptops`
--
ALTER TABLE `laptops`
  ADD CONSTRAINT `laptops_id_nsx_foreign` FOREIGN KEY (`id_nsx`) REFERENCES `hang_san_xuats` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `phieu_dat_hang_dien_thoais`
--
ALTER TABLE `phieu_dat_hang_dien_thoais`
  ADD CONSTRAINT `phieu_dat_hang_dien_thoais_id_kh_foreign` FOREIGN KEY (`id_kh`) REFERENCES `khach_hangs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `quang_caos`
--
ALTER TABLE `quang_caos`
  ADD CONSTRAINT `quang_caos_id_dt_foreign` FOREIGN KEY (`id_dt`) REFERENCES `dien_thoais` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
