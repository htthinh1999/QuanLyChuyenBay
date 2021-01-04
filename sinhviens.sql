-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2020 lúc 11:09 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bt_ap`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhviens`
--

CREATE TABLE `sinhviens` (
  `SV_id` int(11) NOT NULL,
  `hovaten` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Diachi` varchar(30) NOT NULL,
  `gioitinh` varchar(15) NOT NULL,
  `Quocgia` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sinhviens`
--

INSERT INTO `sinhviens` (`SV_id`, `hovaten`, `email`, `Diachi`, `gioitinh`, `Quocgia`, `datetime`) VALUES
(1, 'Rubel', 'r@a.com', '01712727574', 'Male', 'Bangladesh', '2017-08-23 10:15:23'),
(16, 'Tá»« Trung Hiáº¿u', 'tutrunghieu@gmail.com', 'HÃ  Ná»™i', 'Male', 'Vietnam', '2020-11-12 11:12:53'),
(13, 'Abc', 'admin@bicri.com', 'asdf', 'Male', 'VN', '2017-08-24 09:25:07'),
(12, 'Abc', 'admin@bicri.com', '34534532', 'Female', '43534', '2017-08-24 09:07:00'),
(6, 'asdf', 'bicri@admi.com', '345234', '', 'asdf', '2017-08-23 11:19:39'),
(7, 'dsfg', 'bicri@admi.com', 'Female', 'asdf', '3245', '2017-08-23 11:21:53'),
(9, 'dsfg', 'bicri@admi.com', 'Female', 'asdf', 'asdf', '2017-08-23 11:27:53'),
(10, 'ccde', 'admin@bicri.com', '53245', 'Male', 'asdf', '2017-08-23 11:30:37'),
(11, 'Abc', 'admin@bicri.com', '34534532', 'Female', '2345', '2017-08-24 08:10:34'),
(14, 'Abc', 'admin@bicri.com', '34534532', 'Male', 'asdf', '2017-08-24 09:44:21'),
(15, 'Nguyá»…n VÄƒn HoÃ n', 'nguyenvanhoan76@gmail.com', 'Nha trang', 'Male', 'VN', '2020-11-12 10:08:25'),
(17, 'Nguyá»…n ChÃ¡nh', 'nguyenvanhoan76@gmail.com', '', 'Male', 'vn', '2020-12-15 11:09:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sinhviens`
--
ALTER TABLE `sinhviens`
  ADD PRIMARY KEY (`SV_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sinhviens`
--
ALTER TABLE `sinhviens`
  MODIFY `SV_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
