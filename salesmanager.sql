-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 27, 2018 lúc 04:20 PM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `salesmanager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mypham`
--

CREATE TABLE `mypham` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `mypham`
--

INSERT INTO `mypham` (`id`, `image`, `product_name`, `product_code`, `description`, `price`, `type`, `status`) VALUES
(1, 'img/cushion.png', 'Cushion', 'NT2201', 'Concealer', '500.00VND', '', 'Stock'),
(10, 'img/innisfree.jpg', 'Mask', 'MK2000', 'Moisturizes, brightens skin', '50.000 VND', '', 'Stock'),
(13, 'img/3ce.png', ' 3CE lipstick', 'SM5502', 'Sweet, seductive 3CE  Matte Lip Color, a line of ultra gloss and trendy color palettes. Possibly the color is quite Western, this is the lipstick that many her favorite and pick.', '300.000 VND', '', 'Stock'),
(15, 'img/2018-05-26_04_35_02mascara.jpg', 'Mascara 3CE', 'MC2006', 'Mascara for sparse eyelashes, just a brush for eye', '250.000 VND', '', 'Stock'),
(18, 'img/2018-05-27_16_19_22serum.png', 'Serum OHUI', 'SR0064', '', '', '', 'Sold out ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `mypham`
--
ALTER TABLE `mypham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `mypham`
--
ALTER TABLE `mypham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
