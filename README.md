#  DATABASE SHOPEE DEMO
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 19, 2023 lúc 12:49 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopee`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordersss`
--

CREATE TABLE `ordersss` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ordersss`
--

INSERT INTO `ordersss` (`id`, `fullname`, `phone_number`, `email`, `address`, `order_date`) VALUES
(85, 'Nguyễn Tâm Phước', '', 'bintp@gmail.com', 'Thừa Thiên Huế', '2023-08-12 11:08:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `num`, `price`) VALUES
(73, 87, 1, 2, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productss`
--

CREATE TABLE `productss` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `thumbnail` varchar(500) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `price` float DEFAULT NULL,
  `priceCurrent` float DEFAULT NULL,
  `sold` varchar(50) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `national` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productss`
--

INSERT INTO `productss` (`id`, `title`, `thumbnail`, `content`, `price`, `priceCurrent`, `sold`, `brand`, `national`, `created_at`, `updated_at`) VALUES
(1, 'Quần âu nam Qthouse, quần tây nam sidetab lưng cao dáng baggy ống rộng màu sắc đen, nâu QTA01', 'https://cf.shopee.vn/file/vn-11134201-23030-vef8m716piov00_tn', 'Quần âu nam Qthouse, quần tây nam sidetab lưng cao dáng baggy ống rộng màu sắc đen, nâu QTA01', 200000, 169000, '8,8k đã bán', 'Qthouse', 'Hàn Quốc', '2023-07-11 09:38:51', '2023-07-21 09:38:51'),
(2, 'Áo sơ mi nam ngắn tay mùa hè thiết kề khóa cổ trụ form Hàn Quốc SHOPDONAM A68', 'https://cf.shopee.vn/file/sg-11134201-23020-8xoau52ztbnvf1_tn', 'Áo sơ mi nam ngắn tay mùa hè thiết kề khóa cổ trụ form Hàn Quốc SHOPDONAM A68', 250000, 115000, '1,1k đã bán', 'ShopDoNam', 'Nhật Bản', '2023-07-11 09:38:51', '2023-07-28 09:38:51'),
(3, 'Áo polo Tay Lửng Phong Cách Hong Kong Cổ Điển Thời Trang Cho Nam fashion áo polo nam from rộng simple áo thun nam có cổ  Hàn Quốc áo kiểu bigsize áo phông nam form rộng', 'https://cf.shopee.vn/file/sg-11134201-22110-pviopz0bchkvce_tn', 'Áo polo Tay Lửng Phong Cách Hong Kong Cổ Điển Thời Trang Cho Nam fashion áo polo nam from rộng simple áo thun nam có cổ  Hàn Quốc áo kiểu bigsize áo phông nam form rộng', 300000, 179000, '166 đã bán', 'Whoo', 'Hàn Quốc', '2023-07-04 23:06:40', '2023-07-21 23:06:40'),
(4, 'Quần Kaki Ống Rộng Unisex Quần Kaki Hàn Quốc', 'https://cf.shopee.vn/file/eb1956faf4e68e77ee1e0e35816d2986_tn', 'Quần Kaki Ống Rộng Unisex Quần Kaki Hàn Quốc', 450000, 399000, '6,9k đã bán', 'Qhon', 'Trung Quốc', '2023-07-19 23:06:40', '2023-07-28 23:06:40'),
(5, 'Áo Sơ Mi Trơn Tay Dài Thoáng Khí Màu Sắc Đơn Giản Dành Cho Nam', 'https://cf.shopee.vn/file/f54695b9623c0047a0f63bea43083250_tn', 'Áo Sơ Mi Trơn Tay Dài Thoáng Khí Màu Sắc Đơn Giản Dành Cho Nam', 300000, 145000, '1,2k đã bán', 'Tead', 'Hàn Quốc', '2023-07-19 23:11:32', '2023-07-28 23:11:32'),
(6, 'Quần kaki nam PEALO quần ống suông casual pants, chất liệu mới Loose Pants', 'https://cf.shopee.vn/file/vn-11134201-23030-jhx2wet0zjov9f_tn', 'Quần kaki nam PEALO quần ống suông casual pants, chất liệu mới Loose Pants', 600000, 380000, '1,8k đã bán', 'Loose', 'Nhật Bản', '2023-07-18 23:11:32', '2023-07-27 23:11:32'),
(7, 'Áo Sơ Mi Nhung Thời Trang Retro Đơn Giản Dành Cho Nam áo sơ mi nữ form rộng áo cặp nam nữ đồ đôi áo dài tay nữ form rộng', 'https://cf.shopee.vn/file/0977bfd2c495a72c117ed79ad90c16a3_tn', 'Áo Sơ Mi Nhung Thời Trang Retro Đơn Giản Dành Cho Nam áo sơ mi nữ form rộng áo cặp nam nữ đồ đôi áo dài tay nữ form rộng', 245000, 199000, '75 đã bán', 'Retro', 'Việt Nam', '2023-07-03 23:14:19', '2023-07-21 23:14:19'),
(8, 'Áo Sơ Mi Mỏng Tay Ngắn Dáng Rộng Cài Nút Co Giãn Màu Trơn Thời Trang Mùa Hè Chất Lượng Cao Phong Cách Hàn Quốc Cho Nam 2022', 'https://cf.shopee.vn/file/a8cfafe7424ac15e9dc9ca1655638f53_tn', 'Áo Sơ Mi Mỏng Tay Ngắn Dáng Rộng Cài Nút Co Giãn Màu Trơn Thời Trang Mùa Hè Chất Lượng Cao Phong Cách Hàn Quốc Cho Nam 2022', 220000, 150000, '454 đã bán', 'Tea', 'Nhật Bản', '2023-07-11 23:14:19', '2023-07-20 23:14:19'),
(9, '?Áo khoác cặp? đôi cổ điển cổ điển áo khoác giản dị cao áo khoác FARU162', 'https://cf.shopee.vn/file/e7e1b0df609c5424f17c62b34ee2be82_tn', '?Áo khoác cặp? đôi cổ điển cổ điển áo khoác giản dị cao áo khoác FARU162', 1200000, 999000, '888 đã bán', 'Coo', 'Nhật Bản', '2023-07-17 23:16:26', '2023-07-28 23:16:26'),
(10, 'Quần Jean Dài Dáng Rộng Mỏng Màu Trơn Thời Trang Thu Đông Hàn Quốc Đơn Giản Chất Lượng Cao Cho Nam', 'https://cf.shopee.vn/file/sg-11134201-22090-9qskopgljzhv9f_tn', 'Quần Jean Dài Dáng Rộng Mỏng Màu Trơn Thời Trang Thu Đông Hàn Quốc Đơn Giản Chất Lượng Cao Cho Nam', 890000, 490000, '1,4k đã bán', 'Bii', 'Hàn Quốc', '2023-07-12 23:16:26', '2023-07-22 23:16:26');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ordersss`
--
ALTER TABLE `ordersss`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productss`
--
ALTER TABLE `productss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ordersss`
--
ALTER TABLE `ordersss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `productss`
--
ALTER TABLE `productss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

