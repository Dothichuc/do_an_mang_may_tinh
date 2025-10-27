-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 31, 2025 lúc 11:50 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webdienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int(11) NOT NULL,
  `id_don_hang` int(11) DEFAULT NULL,
  `id_san_pham` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `don_gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `id_don_hang`, `id_san_pham`, `so_luong`, `don_gia`) VALUES
(1, 0, 23, 1, 8890000),
(2, 2, 17, 5, 30000000),
(3, 3, 27, 1, 5690000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `id_nguoi_dung` int(11) DEFAULT NULL,
  `ten_nguoi_nhan` varchar(100) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `tong_tien` int(11) DEFAULT NULL,
  `ngay_dat` datetime DEFAULT current_timestamp(),
  `trang_thai` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `id_nguoi_dung`, `ten_nguoi_nhan`, `sdt`, `dia_chi`, `ghi_chu`, `tong_tien`, `ngay_dat`, `trang_thai`) VALUES
(2, NULL, 'chuc', '0981640794', '28 ngõ 1 phố viên', '334', 150000000, '2025-08-01 03:57:20', 1),
(3, NULL, 'Minh', '02345678', 'phố viên', 'giao chiều', 5690000, '2025-08-01 04:15:07', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten_sp` varchar(100) NOT NULL,
  `gia_ban` int(11) NOT NULL,
  `mo_ta` text NOT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `avatar_path` varchar(255) DEFAULT NULL,
  `thuong_hieu` varchar(100) DEFAULT NULL,
  `noi_bat` tinyint(1) DEFAULT NULL,
  `quang_cao` varchar(255) DEFAULT NULL,
  `loai_san_pham` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_sp`, `gia_ban`, `mo_ta`, `so_luong`, `avatar_path`, `thuong_hieu`, `noi_bat`, `quang_cao`, `loai_san_pham`) VALUES
(16, 'Xiaomi Redmi Note 14 128GB Chính Hãng', 4500000, 'Xiaomi Redmi Note 14 128GB là smartphone tầm trung chính hãng với thiết kế hiện đại, màn hình AMOLED 6.67 inch 120Hz siêu mượt, chip Helio G99 Ultra (hoặc Dimensity 7025 bản 5G), RAM 6–8GB, bộ nhớ 128GB. Máy có camera chính 108MP, pin lớn 5500mAh, sạc nhanh 33–45W, hỗ trợ NFC, loa stereo và chạy hệ điều hành HyperOS (Android 14). Phù hợp cho nhu cầu học tập, giải trí và sử dụng hàng ngày.', 10, 'avatar/0023024_xiaomi-redmi-note-14-pro-8gb256gb.png', 'Xiaomi Redmi ', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/dA5NUQ_W62M?si=HmuN6lILIkDcy4_H\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Điện thoại'),
(17, 'IPhone 16 Pro Max 256GB | Chính hãng VN/A', 30000000, 'iPhone 16 Pro Max là mẫu cao cấp nhất của Apple năm 2024, nổi bật với thiết kế khung titan siêu bền, màn hình 6.9 inch Super Retina XDR 120Hz viền siêu mỏng, chip A18 Pro mạnh mẽ và hỗ trợ trí tuệ nhân tạo Apple Intelligence. Máy có hệ thống 3 camera 48MP chuyên nghiệp, zoom quang 5x, quay video 4K/120fps và nút chụp ảnh riêng. Pin lâu, sạc nhanh qua USB-C, hỗ trợ MagSafe, 5G và Wi-Fi 7.', 21, 'avatar/iphone-16-pro-max-titan-sa-mac-thumbnew-650x650.png', 'Iphone', 1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/70gCxCTpvBg?si=zHOjGjxgDoLUVJ2R\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Điện thoại'),
(18, 'IPhone 15 Pro Max', 27000000, 'iPhone 16 Pro Max là mẫu cao cấp nhất của Apple năm 2024, nổi bật với thiết kế khung titan siêu bền, màn hình 6.9 inch Super Retina XDR 120Hz viền siêu mỏng, chip A18 Pro mạnh mẽ và hỗ trợ trí tuệ nhân tạo Apple Intelligence. Máy có hệ thống 3 camera 48MP chuyên nghiệp, zoom quang 5x, quay video 4K/120fps và nút chụp ảnh riêng. Pin lâu, sạc nhanh qua USB-C, hỗ trợ MagSafe, 5G và Wi-Fi 7.', 20, 'avatar/iphone-15-pro-max-blue-1-2-650x650.png', 'Iphone', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/keYat4iSYAQ?si=PWK11M6M9Kr3wfXV\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Điện thoại'),
(19, 'IPhone 15 Plus', 18000000, 'iPhone 15 Plus có màn hình lớn 6.7 inch Super Retina XDR, sử dụng thiết kế viền bo mềm, mặt lưng kính nhám mới và khung nhôm. Máy trang bị chip Apple A16 Bionic, mạnh mẽ và tiết kiệm pin hơn đời trước. Cụm camera kép 48MP + 12MP, cho chất lượng ảnh sắc nét và hỗ trợ chụp chân dung xóa phông tốt hơn. Camera trước 12MP hỗ trợ Face ID và quay video 4K. Máy sử dụng cổng sạc USB-C, pin dung lượng lớn (dài hơn cả iPhone 15 Pro), hỗ trợ sạc nhanh, MagSafe và chạy iOS 17.', 21, 'avatar/iphone-15-plus-green-1-2-650x650.png', 'Iphone', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Gg_ncsRWboo?si=xbY1sqJ0UHBJBMh8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Điện thoại'),
(20, 'IPhone 16 Plus 128GB', 21000000, 'iPhone 16 Plus là bản iPhone màn hình lớn (6.7 inch) dòng tiêu chuẩn 2024. Máy dùng chip A18 mạnh mẽ, RAM 8GB, camera kép 48MP hỗ trợ quay video không gian (Spatial Video). Có nút Action mới, thêm nút Camera điều khiển cảm ứng lực, pin trâu ~27 giờ, sạc nhanh USB-C và hỗ trợ Apple Intelligence (AI). Chạy iOS 18, thiết kế nhôm bền, nhiều màu mới.', 21, 'avatar/iphone-16-plus-xanh-mong-ket-thumb-650x650.png', 'Iphone', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/GDlkCkcIqTs?si=BhdwucXQlrg-RkNo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Điện thoại'),
(21, 'IPhone 13', 16000000, 'Màn hình: 6.1 inch Super Retina XDR OLED, sắc nét, độ sáng cao Chip: Apple A15 Bionic – mạnh mẽ, tiết kiệm pin Camera kép 12MP: chụp ảnh đẹp, hỗ trợ chế độ chụp ban đêm và quay video 4K Thiết kế: viền nhôm, mặt lưng kính bóng, nhiều màu sắc trẻ trung Pin: tốt hơn iPhone 12 (~19 giờ xem video), sạc nhanh và hỗ trợ MagSafe Hệ điều hành: iOS 15 (có thể nâng cấp lên iOS 18)', 6, 'avatar/iphone-13-pink-1-1-2-3-4-5-650x650.png', 'Iphone', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/wEM_13ZCJGE?si=-XcTZDq5qgbPKTsp\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Điện thoại'),
(23, 'IPad A16 WiFi', 8890000, 'Chip A16 Bionic: CPU 5 nhân, GPU 4 nhân, Neural Engine 16 nhân. Hiệu năng tăng ~30% so với A14 \r\nTechRadar\r\n+15\r\nWikipedia\r\n+15\r\nhuyhoangmobile.com.vn\r\n+15\r\n\r\nRAM: 6 GB LPDDR5 – hỗ trợ đa nhiệm mượt mà \r\nWikipedia\r\nmaconline.vn\r\n\r\n', 10, 'avatar/ipad-11-wifi-sliver-thumb-650x650.png', 'Iphone', 1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/J2h-bXe76kY?si=ez3RSmDVWlV7r6DE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Máy tính bảng'),
(24, 'Loa Bluetooth Marshall Emberton III', 4680000, 'True Stereophonic 360°: tạo âm trường rộng, âm trung rõ ràng, âm bass sâu và cân bằng với dải 65–20.000 Hz \r\nCellphoneS\r\n+8\r\nHoàng Hà Mobile\r\n+8\r\nFPT Shop\r\n+8\r\n.\r\n\r\nCông suất mạnh mẽ: Amp Class D 2 × 20W (tổng ~38W) cùng 2 tản nhiệt thụ động, mang lại âm trầm ấn tượng với độ rõ nét cao \r\nThe Times\r\n+14\r\nHoàng Hà Mobile\r\n+14\r\nMytour.vn\r\n+14\r\n.\r\n\r\nHỗ trợ Dynamic Loudness để giữ âm sắc cân bằng ở cả mức âm lượng cao', 5, 'avatar/loa-bluetooth-marshall-emberton-iii-den-1-638614953620315289-650x650.jpg', 'Marshall', 1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/IvEpYMYCmmo?si=QVhqAvreRLXtwBBI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Phụ kiện'),
(25, 'AirPods 4', 3290000, 'AirPods 4 dự kiến sẽ sở hữu thiết kế tinh gọn, cải tiến chất lượng âm thanh với chống ồn chủ động (ANC), Adaptive Audio, cùng thời lượng pin dài hơn. Tích hợp USB-C, chip mới (có thể H2), và tương thích tối ưu với hệ sinh thái Apple. Một lựa chọn lý tưởng cho cả giải trí và công việc.\r\n\r\n', 20, 'avatar/airpods-4-thumb-1-650x650.png', 'Iphone', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JMHj8rk96LE?si=aEsM42JDtM54P8d9\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Phụ kiện'),
(26, 'Apple Pencil (USB-C)', 2090000, 'Apple Pencil (USB-C) là bút cảm ứng do Apple sản xuất, tương thích với iPad có cổng USB-C. Nó hỗ trợ độ nhạy áp lực, độ nghiêng để vẽ và viết chính xác. Tuy không có tính năng sạc không dây, độ nhạy cao như Pencil 2, nhưng vẫn mang lại trải nghiệm mượt mà và tiện lợi với giá thành phải chăng hơn.', 20, 'avatar/apple-pencil-usb-c-091123-031115-650x650.png', 'Iphone', 1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iZOxHQXUWO8?si=u3JIQnhX1eH-8ewI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Phụ kiện'),
(27, 'Apple Watch SE 2 GPS 40mm viền nhôm dây vải', 5690000, 'Apple Watch SE 2 GPS 40mm viền nhôm dây vải là mẫu đồng hồ thông minh nhẹ, bền với vỏ nhôm, màn hình Retina sáng rõ. Hỗ trợ các tính năng sức khỏe cơ bản như đo nhịp tim, phát hiện té ngã, Crash Detection. Dây vải mềm, thoáng khí, đeo thoải mái cả ngày. Phù hợp người dùng yêu thích thiết kế gọn nhẹ và hiệu năng ổn định.', 10, 'avatar/tách nền site 16 (1)-650x650.png', 'Iphone', 1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/e6T34u51MaA?si=Baq5c5yLAp8mKMH6\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Phụ kiện'),
(28, 'IPad Pro M4 13 inch WiFi', 33990000, 'iPad Pro M4 13‑inch Wi‑Fi (bản chỉ kết nối Wi‑Fi) là mẫu máy tính bảng cao cấp của Apple ra mắt năm 2024, tích hợp chip Apple M4, màn hình 13‑inch OLED Ultra Retina XDR với ProMotion (10–120 Hz), độ phân giải 2752×2064 và độ sáng HDR lên đến 1600 nits', 20, 'avatar/ipad-pro-13-inch-wifi-silver-650x650.png', 'Iphone', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Quaf2Psuyww?si=AIWjNcI68IVWemHS\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Máy tính bảng'),
(29, 'iPad Air 6 M2 13 inch WiFi', 175930, 'Chip M2 (CPU 8 lõi + GPU 9 lõi), RAM 8 GB, hiệu năng mạnh mẽ cho việc xử lý ảnh, video và ứng dụng AI \r\nWikipedia\r\n+15\r\nWikipedia\r\n+15\r\nCellphoneS\r\n+15\r\n\r\nMàn hình 13″ Liquid Retina, độ phân giải 2732×2048 (264 ppi), độ sáng ~600 nits, hỗ trợ dải màu rộng P3, True Tone, màn hình ép kính giảm phản quang \r\nApple8 Store\r\n+6\r\nWikipedia\r\n+6\r\nCellphoneS\r\n+6\r\n\r\nCamera trước 12 MP Ultra Wide đặt ngang hỗ trợ Center Stage, camera sau 12 MP góc rộng quay video 4K \r\nlifewire.com\r\n+14\r\nCellphoneS\r\n+14\r\nCellphoneS\r\n+14\r\n\r\nKết nối Wi‑Fi 6E MIMO, Bluetooth 5.3, cổng USB‑C Thunderbolt tương thích Apple Pencil Pro & Magic Keyboard \r\nWikipedia\r\n+10\r\nCellphoneS\r\n+10\r\nCellphoneS\r\n+10', 20, 'avatar/ipad-air-m2-13-inch-wifi-gray-thumb-650x650.png', 'Iphone', 0, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/M19ywsgBFqA?si=bRGt3c4KdWrJb5sI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" r', 'Máy tính bảng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `tai_khoan` varchar(100) NOT NULL,
  `mat_khau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_admin`
--

INSERT INTO `user_admin` (`id`, `tai_khoan`, `mat_khau`) VALUES
(1, 'Admin', 12345);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_nguoi_dung`
--

CREATE TABLE `user_nguoi_dung` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nam_sinh` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `mat_khau` int(11) NOT NULL,
  `gioi_tinh` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_nguoi_dung`
--

INSERT INTO `user_nguoi_dung` (`id`, `name`, `nam_sinh`, `email`, `mat_khau`, `gioi_tinh`) VALUES
(13, 'Lưu Quang Mạnh', '2002-09-10', 'mluu85670@gmail.com', 123, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_nguoi_dung`
--
ALTER TABLE `user_nguoi_dung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_nguoi_dung`
--
ALTER TABLE `user_nguoi_dung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
