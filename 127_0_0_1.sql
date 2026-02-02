-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 31, 2026 lúc 08:51 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baitap`
--
CREATE DATABASE IF NOT EXISTS `baitap` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `baitap`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Trinhvanhoan2005@', 'Hoan282005@');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Cơ sở dữ liệu: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Đang đổ dữ liệu cho bảng `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"webbansach\",\"table\":\"donhang\"},{\"db\":\"webbansach\",\"table\":\"danhmuc\"},{\"db\":\"webbansach\",\"table\":\"tintuc\"},{\"db\":\"webbansach\",\"table\":\"chitietdonhang\"},{\"db\":\"webbansach\",\"table\":\"sach\"},{\"db\":\"webbansach\",\"table\":\"nguoidung\"},{\"db\":\"webbansach\",\"table\":\"SACH\"},{\"db\":\"webbansach\",\"table\":\"DANHMUC\"},{\"db\":\"webbansach\",\"table\":\"NGUOIDUNG\"},{\"db\":\"test\",\"table\":\"users\"}]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Đang đổ dữ liệu cho bảng `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2026-01-31 19:49:59', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"vi\"}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Chỉ mục cho bảng `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Chỉ mục cho bảng `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Chỉ mục cho bảng `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Chỉ mục cho bảng `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Chỉ mục cho bảng `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Chỉ mục cho bảng `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Chỉ mục cho bảng `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Chỉ mục cho bảng `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Chỉ mục cho bảng `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Chỉ mục cho bảng `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Cơ sở dữ liệu: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Trinhvanhoan2005@', 'Hoan282005@');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Cơ sở dữ liệu: `webbansach`
--
CREATE DATABASE IF NOT EXISTS `webbansach` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `webbansach`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MACT` int(11) NOT NULL,
  `SOLUONG` int(11) DEFAULT NULL,
  `DONGIA` int(11) DEFAULT NULL,
  `MADH` int(11) DEFAULT NULL,
  `MASACH` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MADM` int(11) NOT NULL,
  `TENDM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MADM`, `TENDM`) VALUES
(1, 'Van hoc'),
(2, 'Kinh te'),
(3, 'Thieu nhi'),
(4, 'Cong nghe'),
(5, 'Ky nang song'),
(6, 'Nau an'),
(7, 'Am thuc'),
(8, 'Du lich'),
(9, 'Van hoa'),
(10, 'Lich su'),
(11, 'Dia ly'),
(12, 'Khoa hoc'),
(13, 'Lap trinh'),
(14, 'Tri tue nhan tao'),
(15, 'Mang may tinh'),
(16, 'An ninh mang'),
(17, 'Toan hoc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MADH` int(11) NOT NULL,
  `TONGTIEN` int(11) DEFAULT NULL,
  `TRANGTHAI` enum('cho_xac_nhan','dang_giao','da_hoan_thanh','da_huy') DEFAULT 'cho_xac_nhan',
  `NGAYDAT` timestamp NOT NULL DEFAULT current_timestamp(),
  `MAND` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MAGH` int(11) NOT NULL,
  `MAND` int(11) DEFAULT NULL,
  `MASACH` int(11) DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `MALH` int(11) NOT NULL,
  `HOTEN` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `NOIDUNG` text DEFAULT NULL,
  `NGAYGUI` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MAND` int(11) NOT NULL,
  `TENDN` varchar(50) NOT NULL,
  `MK` varchar(255) NOT NULL,
  `HOTEN` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `VAITRO` enum('ADMIN','NGUOIDUNG') DEFAULT 'NGUOIDUNG',
  `NGAYTAO` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MAND`, `TENDN`, `MK`, `HOTEN`, `EMAIL`, `SDT`, `VAITRO`, `NGAYTAO`) VALUES
(1, 'admin', '123456', 'TRINH VAN HOAN', 'Hoan28@gmail.com', '0647129857', 'ADMIN', '2026-01-29 23:34:45'),
(2, 'Trinh123', '123456', 'Phan Quoc Trinh', 'Trinh12@gmail.com', '0865129768', 'NGUOIDUNG', '2026-01-29 23:34:45'),
(3, 'Phong123', '123456', 'Nguyen Viet Phong', 'Phong23@gmail.com', '0873085143', 'NGUOIDUNG', '2026-01-29 23:34:45'),
(4, 'Hung123', '123456', 'Le Van Hung', 'Hung34@gmail.com', '0163975035', 'NGUOIDUNG', '2026-01-29 23:34:45'),
(5, 'Lap123', '123456', 'Nguyen Dinh Lap', 'lap44@gmail.com', '0463267085', 'NGUOIDUNG', '2026-01-29 23:34:45'),
(6, 'Huyen123', '123456', 'Pham Minh Huyen', 'Huyen76@gmail.com', '0649053159', 'NGUOIDUNG', '2026-01-29 23:34:45'),
(7, 'Trang123', '123456', 'Le Thu Trang', 'Trang34@gmail.com', '0684075666', 'NGUOIDUNG', '2026-01-29 23:34:45'),
(8, 'Hien123', '123456', 'Phan Thu Hien', 'Hien45@gmail.com', '0534632975', 'NGUOIDUNG', '2026-01-29 23:34:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MASACH` int(11) NOT NULL,
  `TENSACH` varchar(255) NOT NULL,
  `TACGIA` varchar(100) DEFAULT NULL,
  `GIA` int(11) NOT NULL,
  `HINHANH` varchar(255) DEFAULT NULL,
  `MOTA` text DEFAULT NULL,
  `MADM` int(11) DEFAULT NULL,
  `NGAYTHEM` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`MASACH`, `TENSACH`, `TACGIA`, `GIA`, `HINHANH`, `MOTA`, `MADM`, `NGAYTHEM`) VALUES
(33, 'Mat Biec', 'Nguyen Nhat Anh', 62000, 'sach11.jpg', 'Tieu thuyet tinh cam noi tieng', 1, '2026-01-30 00:06:06'),
(34, 'Ong Gia Va Bien Ca', 'Ernest Hemingway', 85000, 'sach12.jpg', 'Tac pham van hoc kinh dien', 2, '2026-01-30 00:06:06'),
(35, 'Harry Potter va Hon Da Phu Thuy', 'J.K. Rowling', 99000, 'sach13.jpg', 'Tieu thuyet vien tuong thieu nhi', 11, '2026-01-30 00:06:06'),
(36, 'Nha Lan Dao', 'Kazuo Ishiguro', 110000, 'sach14.jpg', 'Van hoc hien dai nuoc ngoai', 2, '2026-01-30 00:06:06'),
(37, 'Ban Dat Gia Bao Nhieu', 'Vinh Duy', 72000, 'sach15.jpg', 'Sach phat trien ban than', 13, '2026-01-30 00:06:06'),
(38, 'Tu Duy Mo', 'Adam Grant', 135000, 'sach16.jpg', 'Phat trien tu duy sang tao', 13, '2026-01-30 00:06:06'),
(39, 'Giau Co Dau Tu Chung Khoan', 'William J. O\'Neil', 155000, 'sach17.jpg', 'Sach dau tu tai chinh', 4, '2026-01-30 00:06:06'),
(40, 'Kinh Te Hoc Vi Mo', 'Gregory Mankiw', 145000, 'sach18.jpg', 'Giao trinh kinh te hoc', 3, '2026-01-30 00:06:06'),
(41, 'Marketing Can Ban', 'Philip Kotler', 165000, 'sach19.jpg', 'Sach marketing nen tang', 3, '2026-01-30 00:06:06'),
(42, 'Quan Tri Hoc', 'Nguyen Van D', 98000, 'sach20.jpg', 'Sach quan tri doanh nghiep', 5, '2026-01-30 00:06:06'),
(43, 'Lap Trinh Web PHP & MySQL', 'Tran Van Hoang', 160000, 'sach21.jpg', 'Lap trinh web tu co ban', 6, '2026-01-30 00:06:06'),
(44, 'HTML CSS Co Ban', 'Le Van Huyen', 90000, 'sach22.jpg', 'Thiet ke giao dien web', 6, '2026-01-30 00:06:06'),
(45, 'JavaScript Nang Cao', 'Nguyen Van Giang', 175000, 'sach23.jpg', 'Lap trinh JS thuc te', 6, '2026-01-30 00:06:06'),
(46, 'Python Co Ban', 'Pham Van Hoan', 150000, 'sach24.jpg', 'Ngon ngu lap trinh pho bien', 6, '2026-01-30 00:06:06'),
(47, 'Tri Tue Nhan Tao Co Ban', 'Andrew Ng', 185000, 'sach25.jpg', 'Nhap mon AI', 8, '2026-01-30 00:06:06'),
(48, 'Cho Toi Xin Mot Ve Di Tuoi Tre', 'Nguyen Nhat Anh', 58000, 'sach26.jpg', 'Truyen dai cam dong', 1, '2026-01-30 00:06:06'),
(49, 'Nguoi Dua Dieu', 'Khaled Hosseini', 92000, 'sach27.jpg', 'Tieu thuyet noi tieng', 2, '2026-01-30 00:06:06'),
(50, 'Bi Mat Tu Duy Trieu Phu', 'T. Harv Eker', 88000, 'sach28.jpg', 'Tu duy tai chinh', 4, '2026-01-30 00:06:06'),
(51, 'Tam Ly Hoc Dam Dong', 'Gustave Le Bon', 108000, 'sach29.jpg', 'Sach tam ly hoc kinh dien', 13, '2026-01-30 00:06:06'),
(52, 'Dac Nhan Tam Ban Day Du', 'Dale Carnegie', 125000, 'sach30.jpg', 'Phien ban mo rong', 13, '2026-01-30 00:06:06'),
(53, 'Doraemon Tap 1', 'Fujiko F Fujio', 30000, 'tn1.jpg', 'Truyen tranh thieu nhi noi tieng', 11, '2026-01-30 00:06:06'),
(54, 'Than Dong Dat Viet', 'Le Linh', 28000, 'tn2.jpg', 'Truyen tranh lich su Viet Nam', 11, '2026-01-30 00:06:06'),
(55, 'Hoang Tu Be', 'Antoine de Saint-Exupery', 60000, 'tn3.jpg', 'Truyen thieu nhi kinh dien', 11, '2026-01-30 00:06:06'),
(56, '7 Thoi Quen Hieu Qua', 'Stephen R. Covey', 145000, 'kn1.jpg', 'Phat trien ban than', 13, '2026-01-30 00:06:06'),
(57, 'Tu Duy Tich Cuc', 'Norman Vincent Peale', 120000, 'kn2.jpg', 'Song lac quan', 13, '2026-01-30 00:06:06'),
(58, 'Doc Vi Bat Ky Ai', 'David J. Lieberman', 138000, 'kn3.jpg', 'Tam ly ung dung', 13, '2026-01-30 00:06:06'),
(59, 'Dac nhan tam', 'Dale Carnegie', 120000, 'kt1.jpg', 'Nghe thuat giao tiep', 2, '2026-01-30 00:06:06'),
(60, 'Tu duy nhanh va cham', 'Daniel Kahneman', 150000, 'kt2.jpg', 'Tu duy kinh te hien dai', 2, '2026-01-30 00:06:06'),
(61, 'Am thuc Viet Nam', 'Tran Van Phong', 135000, 'at1.jpg', 'Van hoa am thuc Viet', 7, '2026-01-30 00:06:06'),
(62, 'Am thuc chau A', 'Pham Thi My Lan', 145000, 'at2.jpg', 'Am thuc truyen thong', 7, '2026-01-30 00:06:06'),
(63, 'Du lich Viet Nam', 'Nguyen Van khanh', 120000, 'dl1.jpg', 'Cam nang du lich', 8, '2026-01-30 00:06:06'),
(64, 'Du lich bui', 'Le Van Hoan', 95000, 'dl2.jpg', 'Trai nghiem du lich tu tuc', 8, '2026-01-30 00:06:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `MATT` int(11) NOT NULL,
  `TIEUDE` varchar(255) DEFAULT NULL,
  `NOIDUNG` text DEFAULT NULL,
  `HINHANH` varchar(255) DEFAULT NULL,
  `NGAYDANG` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MACT`),
  ADD KEY `MADH` (`MADH`),
  ADD KEY `MASACH` (`MASACH`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MADM`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MADH`),
  ADD KEY `MAND` (`MAND`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MAGH`),
  ADD UNIQUE KEY `MAND` (`MAND`,`MASACH`),
  ADD KEY `MASACH` (`MASACH`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`MALH`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MAND`),
  ADD UNIQUE KEY `TENDN` (`TENDN`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MASACH`),
  ADD KEY `MADM` (`MADM`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MATT`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MACT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MADM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MADH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MAGH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `MALH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MAND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `MASACH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `MATT` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`MADH`) REFERENCES `donhang` (`MADH`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`MASACH`) REFERENCES `sach` (`MASACH`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MAND`) REFERENCES `nguoidung` (`MAND`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MAND`) REFERENCES `nguoidung` (`MAND`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`MASACH`) REFERENCES `sach` (`MASACH`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`MADM`) REFERENCES `danhmuc` (`MADM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
