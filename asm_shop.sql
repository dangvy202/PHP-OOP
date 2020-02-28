-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 07:01 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(50) NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_hh` int(10) NOT NULL,
  `ma_kh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_bl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `ma_loai` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`ma_loai`, `ten`) VALUES
(1, 'Balo thú cưng'),
(2, 'Túi xách thú cưng'),
(3, 'Nhà ở thú cưng'),
(4, 'Thuốc cho thú cưng'),
(5, 'Vòng cổ thú cưng'),
(6, 'Quần áo thú cưng'),
(7, 'Vật dụng thú cưng'),
(8, 'Đồ chơi thú cưng');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kich_hoat` bit(10) NOT NULL,
  `hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vai_tro` bit(10) NOT NULL,
  `lever` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `kich_hoat`, `hinh`, `email`, `vai_tro`, `lever`) VALUES
('1', '123', 'dangvy', b'0000000000', '', '', b'0000000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ma_hh` int(9) NOT NULL,
  `ten_hh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `don_gia` double NOT NULL,
  `hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ngaynhap` date NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `luotxem` int(10) NOT NULL DEFAULT '0',
  `giam_gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ma_hh`, `ten_hh`, `don_gia`, `hinh`, `ma_loai`, `ngaynhap`, `mota`, `luotxem`, `giam_gia`) VALUES
(1, 'Bóng lớn cho chó', 60, 'toy1.jpg', 8, '2019-06-05', '', 0, 0),
(2, 'Bóng dễ thương cho chó', 70, 'toy2.jpg', 8, '2019-06-08', '', 0, 0),
(3, 'Bóng đôi cho chó', 90, 'toy3.jpg', 8, '2019-06-15', 'aa', 0, 0),
(4, 'Bóng bảy màu', 90, 'toy4.jpg', 8, '2019-06-15', '', 0, 0),
(5, 'Sữa tắm ', 120000, 'vd1.jpg', 7, '2019-06-26', '', 0, 0),
(6, 'Thuốc thú cưng', 30000, 'vd2.jpg', 7, '2019-06-29', '', 0, 0),
(7, 'Bát thức ăn', 97900, 'vd3.jpg', 7, '2019-06-24', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'dangvy', '2002'),
(2, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `khachhang_binhluan` (`ma_kh`),
  ADD KEY `ma_hh` (`ma_hh`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `FK_hanghoavscatalog` (`ma_loai`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ma_hh` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `product` (`ma_hh`),
  ADD CONSTRAINT `khachhang_binhluan` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_hanghoavscatalog` FOREIGN KEY (`ma_loai`) REFERENCES `catalog` (`ma_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
