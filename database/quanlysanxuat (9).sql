-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 10, 2022 at 09:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlysanxuat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietyeucau`
--

CREATE TABLE `chitietyeucau` (
  `maYeuCauSanXuat` varchar(50) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietyeucau`
--

INSERT INTO `chitietyeucau` (`maYeuCauSanXuat`, `maSanPham`, `soLuong`) VALUES
('ycsx001', 24, 18),
('ycsx002', 23, 26),
('ycsx003', 22, 17),
('ycsx004', 24, 14);

-- --------------------------------------------------------

--
-- Table structure for table `congdoan`
--

CREATE TABLE `congdoan` (
  `maCongDoan` int(11) NOT NULL,
  `tenCongDoan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `congdoan`
--

INSERT INTO `congdoan` (`maCongDoan`, `tenCongDoan`) VALUES
(1, 'cắt'),
(2, 'may'),
(4, 'đóng gói');

-- --------------------------------------------------------

--
-- Table structure for table `danhmucnvl`
--

CREATE TABLE `danhmucnvl` (
  `maDanhMuc` int(11) NOT NULL,
  `tenDanhMuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danhmucnvl`
--

INSERT INTO `danhmucnvl` (`maDanhMuc`, `tenDanhMuc`) VALUES
(1, 'đồ gốm'),
(2, 'may mặc');

-- --------------------------------------------------------

--
-- Table structure for table `dinhmucnvl`
--

CREATE TABLE `dinhmucnvl` (
  `maNguyenVatLieu` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuongNVL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dinhmucnvl`
--

INSERT INTO `dinhmucnvl` (`maNguyenVatLieu`, `maSanPham`, `soLuongNVL`) VALUES
(1, 22, 20),
(1, 23, 40),
(2, 23, 40),
(3, 22, 3),
(4, 22, 6);

-- --------------------------------------------------------

--
-- Table structure for table `kehoachsanxuat`
--

CREATE TABLE `kehoachsanxuat` (
  `maKeHoachSanXuat` int(11) NOT NULL,
  `maYeuCauSanXuat` varchar(50) NOT NULL,
  `tenToSanXuat` varchar(50) NOT NULL,
  `ngayBatDau` date DEFAULT NULL,
  `ngayKetThuc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kehoachsanxuat`
--

INSERT INTO `kehoachsanxuat` (`maKeHoachSanXuat`, `maYeuCauSanXuat`, `tenToSanXuat`, `ngayBatDau`, `ngayKetThuc`) VALUES
(1, 'ycsx003', 'tổ 1', '2022-12-07', '2022-12-08'),
(3, 'ycsx002', 'tổ 2', '2022-12-09', '2023-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `khanangsanxuat`
--

CREATE TABLE `khanangsanxuat` (
  `tenToSanXuat` varchar(50) NOT NULL,
  `soLuongNhanVien` int(11) NOT NULL,
  `congSuatNgay` double DEFAULT NULL,
  `luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khanangsanxuat`
--

INSERT INTO `khanangsanxuat` (`tenToSanXuat`, `soLuongNhanVien`, `congSuatNgay`, `luong`) VALUES
('tổ 1', 12, 53, 4000000),
('tổ 2', 13, 50, 4000000),
('tổ 3', 23, 122, 23223);

-- --------------------------------------------------------

--
-- Table structure for table `kho`
--

CREATE TABLE `kho` (
  `maKho` int(11) NOT NULL,
  `tenKho` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kho`
--

INSERT INTO `kho` (`maKho`, `tenKho`) VALUES
(0, 'kho thành phẩm'),
(1, 'kho nguyên vật liệu');

-- --------------------------------------------------------

--
-- Table structure for table `khonvl`
--

CREATE TABLE `khonvl` (
  `maNguyenVatLieu` int(11) NOT NULL,
  `maKho` int(11) NOT NULL,
  `soLuongNVL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khonvl`
--

INSERT INTO `khonvl` (`maNguyenVatLieu`, `maKho`, `soLuongNVL`) VALUES
(1, 1, 300),
(2, 1, 276),
(3, 1, 367),
(4, 1, 334);

-- --------------------------------------------------------

--
-- Table structure for table `khothanhpham`
--

CREATE TABLE `khothanhpham` (
  `maKho` int(11) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuongSP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khothanhpham`
--

INSERT INTO `khothanhpham` (`maKho`, `maSanPham`, `soLuongSP`) VALUES
(0, 22, 62),
(0, 23, 29),
(0, 24, 24);

-- --------------------------------------------------------

--
-- Table structure for table `lenhsanxuat`
--

CREATE TABLE `lenhsanxuat` (
  `maLenhSanXuat` varchar(50) NOT NULL,
  `tenLenhSanXuat` varchar(40) NOT NULL,
  `maCongDoan` int(11) NOT NULL,
  `maYeuCauSanXuat` varchar(50) NOT NULL,
  `tenToSanXuat` varchar(50) NOT NULL,
  `ngayHoanThanh` date DEFAULT NULL,
  `nguoiLap` varchar(40) NOT NULL,
  `ngaylap` date NOT NULL,
  `soLuongSX` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lenhsanxuat`
--

INSERT INTO `lenhsanxuat` (`maLenhSanXuat`, `tenLenhSanXuat`, `maCongDoan`, `maYeuCauSanXuat`, `tenToSanXuat`, `ngayHoanThanh`, `nguoiLap`, `ngaylap`, `soLuongSX`) VALUES
('lsx2', 'sx bù', 1, 'ycsx004', 'tổ 2', '2022-12-12', 'dungadmin', '2022-12-07', 9),
('lsx5', 'sx bù', 1, 'ycsx001', 'tổ 1', '2022-12-15', 'dungadmin', '2022-12-07', 12),
('lsx6', 'sản xuất bù s', 1, 'ycsx002', 'tổ 2', '2022-12-14', 'dungadmin', '2022-12-07', 4),
('lsx8', 'sản xuất đơn hàng 001', 1, 'ycsx003', 'tổ 1', '2022-12-15', 'dungadmin', '2022-12-07', 13);

--
-- Triggers `lenhsanxuat`
--
DELIMITER $$
CREATE TRIGGER `insertl` BEFORE INSERT ON `lenhsanxuat` FOR EACH ROW BEGIN    
            UPDATE chitietyeucau 
          SET chitietyeucau.soLuong=(chitietyeucau.soLuong-new.soLuongSX)
          WHERE chitietyeucau.maYeuCauSanXuat = new.maYeuCauSanXuat;
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `nguyenvatlieu`
--

CREATE TABLE `nguyenvatlieu` (
  `maNguyenVatLieu` int(11) NOT NULL,
  `maDanhMuc` int(11) DEFAULT NULL,
  `tenNguyenVatLieu` varchar(50) NOT NULL,
  `donViTinh` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nguyenvatlieu`
--

INSERT INTO `nguyenvatlieu` (`maNguyenVatLieu`, `maDanhMuc`, `tenNguyenVatLieu`, `donViTinh`) VALUES
(1, 2, 'vải', 'mét'),
(2, 1, 'chỉ', 'cuộn'),
(3, 1, 'cúc áo', 'cái'),
(4, 1, 'khóa', 'cái'),
(20, 1, 'đất sét', 'kg'),
(22, 2, 'đất sét', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `maPhieu` int(11) NOT NULL,
  `maYeuCauSanXuat` varchar(40) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuongNhap` int(11) DEFAULT NULL,
  `ngayThucHien` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `phieunhap`
--
DELIMITER $$
CREATE TRIGGER `insertphieunhap` BEFORE INSERT ON `phieunhap` FOR EACH ROW BEGIN    
            UPDATE yeucausanxuat 
          SET yeucausanxuat.tinhTrang='đã nhập kho'
          WHERE    yeucausanxuat.maYeuCauSanXuat=new.maYeuCauSanXuat;
        END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertpn` BEFORE INSERT ON `phieunhap` FOR EACH ROW BEGIN    
            UPDATE khothanhpham
          SET khothanhpham.soLuongSP=(khothanhpham.soLuongSP+new.soLuongNhap)
          WHERE khothanhpham.maSanPham=new.maSanPham;
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `maPhieu` int(11) NOT NULL,
  `maYeuCauSanXuat` varchar(40) NOT NULL,
  `maNguyenVatLieu` int(11) NOT NULL,
  `maKho` int(50) NOT NULL,
  `soLuongXuat` int(11) DEFAULT NULL,
  `ngayThucHien` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `phieuxuat`
--
DELIMITER $$
CREATE TRIGGER `insertphieuxuat` BEFORE INSERT ON `phieuxuat` FOR EACH ROW BEGIN    
            UPDATE yeucausanxuat 
          SET yeucausanxuat.tinhTrang='đã xuất kho'
          WHERE yeucausanxuat.maYeuCauSanXuat=new.maYeuCauSanXuat;
        END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertpx` BEFORE INSERT ON `phieuxuat` FOR EACH ROW BEGIN    
            UPDATE khonvl 
          SET khonvl.soLuongNVL=(khonvl.soLuongNVL-new.soLuongXuat)
          WHERE khonvl.maKho = new.maKho and khonvl.maNguyenVatLieu=new.maNguyenVatLieu;
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `maSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(70) DEFAULT NULL,
  `anhMinhHoa` varchar(100) DEFAULT NULL,
  `trangThai` varchar(50) NOT NULL,
  `donViTinh` varchar(40) NOT NULL,
  `chiPhiSx` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSanPham`, `tenSanPham`, `anhMinhHoa`, `trangThai`, `donViTinh`, `chiPhiSx`) VALUES
(22, 'giày', 'anh1.jpg', 'chưa sản xuất', 'cái', 20000),
(23, 'dép', 'anhdep.jpg', 'chưa sản xuất', 'cái', 31231),
(24, 'áo thu đông', 'anh2', 'chưa sản xuất', 'cái', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tenDangNhap` varchar(50) NOT NULL,
  `hoVaTen` varchar(50) NOT NULL,
  `matKhau` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `soDienThoai` varchar(40) NOT NULL,
  `anh` varchar(300) NOT NULL,
  `vaiTro` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`tenDangNhap`, `hoVaTen`, `matKhau`, `email`, `soDienThoai`, `anh`, `vaiTro`) VALUES
('admin', 'admin', '25d55ad283aa400af464c76d713c07ad', 'phankimsinh20@gmail.com', '0961294993', 'anhthea.jpg', 'admin'),
('dungadmin', 'nguyễn tiến dũng abc', '25d55ad283aa400af464c76d713c07ad', 'dungadmin@gmail.com', '092932132', 'anhtheb.jpg', 'adminsx'),
('quyadmin', 'adminstrator', '25d55ad283aa400af464c76d713c07ad', 'quy@gmail.com', '0973732323', 'anhthec.jpg', 'adminsx'),
('sinhadmin', 'phan kim sinh', '25d55ad283aa400af464c76d713c07ad', 'phankimsinh20@gmail.com', '0961294993', 'anhthea.jpg', 'adminsx'),
('user1', 'user', '25d55ad283aa400af464c76d713c07ad', 'user1@gmail.com', '0973722323', 'anhthec.jpg', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `thuctesanxuat`
--

CREATE TABLE `thuctesanxuat` (
  `maLenhSanXuat` varchar(50) NOT NULL,
  `maThucTeSanXuat` int(11) NOT NULL,
  `soLuongDaSanXuat` int(11) DEFAULT NULL,
  `ngaySanXuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thuctesanxuat`
--

INSERT INTO `thuctesanxuat` (`maLenhSanXuat`, `maThucTeSanXuat`, `soLuongDaSanXuat`, `ngaySanXuat`) VALUES
('lsx2', 1, 2, '2022-11-10'),
('lsx8', 3, 4, '2022-12-01'),
('lsx8', 5, 13, '2022-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `yeucausanxuat`
--

CREATE TABLE `yeucausanxuat` (
  `maYeuCauSanXuat` varchar(50) NOT NULL,
  `ngayGiaoHang` date DEFAULT NULL,
  `donGia` double DEFAULT NULL,
  `tinhTrang` varchar(40) NOT NULL,
  `ngayTao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yeucausanxuat`
--

INSERT INTO `yeucausanxuat` (`maYeuCauSanXuat`, `ngayGiaoHang`, `donGia`, `tinhTrang`, `ngayTao`) VALUES
('ycsx001', '2022-12-09', 30000000, 'chưa xỷ lý', '2023-01-04'),
('ycsx002', '2024-02-01', 30000000, 'chưa xỷ lý', '2022-12-03'),
('ycsx003', '2022-12-23', 70000000, 'chưa xỷ lý', '2022-12-06'),
('ycsx004', '2022-12-31', 3000000, 'thành phẩm', '2022-12-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietyeucau`
--
ALTER TABLE `chitietyeucau`
  ADD PRIMARY KEY (`maYeuCauSanXuat`,`maSanPham`),
  ADD KEY `maSanPham` (`maSanPham`);

--
-- Indexes for table `congdoan`
--
ALTER TABLE `congdoan`
  ADD PRIMARY KEY (`maCongDoan`);

--
-- Indexes for table `danhmucnvl`
--
ALTER TABLE `danhmucnvl`
  ADD PRIMARY KEY (`maDanhMuc`);

--
-- Indexes for table `dinhmucnvl`
--
ALTER TABLE `dinhmucnvl`
  ADD PRIMARY KEY (`maNguyenVatLieu`,`maSanPham`),
  ADD KEY `maSanPham` (`maSanPham`);

--
-- Indexes for table `kehoachsanxuat`
--
ALTER TABLE `kehoachsanxuat`
  ADD PRIMARY KEY (`maKeHoachSanXuat`),
  ADD KEY `maYeuCauSanXuat` (`maYeuCauSanXuat`),
  ADD KEY `tenToSanXuat` (`tenToSanXuat`);

--
-- Indexes for table `khanangsanxuat`
--
ALTER TABLE `khanangsanxuat`
  ADD PRIMARY KEY (`tenToSanXuat`);

--
-- Indexes for table `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`maKho`);

--
-- Indexes for table `khonvl`
--
ALTER TABLE `khonvl`
  ADD PRIMARY KEY (`maNguyenVatLieu`,`maKho`),
  ADD KEY `maKho` (`maKho`),
  ADD KEY `maNguyenVatLieu` (`maNguyenVatLieu`);

--
-- Indexes for table `khothanhpham`
--
ALTER TABLE `khothanhpham`
  ADD PRIMARY KEY (`maKho`,`maSanPham`),
  ADD KEY `maSanPham` (`maSanPham`);

--
-- Indexes for table `lenhsanxuat`
--
ALTER TABLE `lenhsanxuat`
  ADD PRIMARY KEY (`maLenhSanXuat`),
  ADD KEY `maYeuCauSanXuat` (`maYeuCauSanXuat`),
  ADD KEY `tenToSanXuat` (`tenToSanXuat`),
  ADD KEY `maCongDoan` (`maCongDoan`);

--
-- Indexes for table `nguyenvatlieu`
--
ALTER TABLE `nguyenvatlieu`
  ADD PRIMARY KEY (`maNguyenVatLieu`),
  ADD KEY `maDanhMuc` (`maDanhMuc`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`maPhieu`,`maYeuCauSanXuat`,`ngayThucHien`),
  ADD KEY `phieuxuat_ibfk_1` (`maYeuCauSanXuat`),
  ADD KEY `phieuxuat_ibfk_2` (`maSanPham`);

--
-- Indexes for table `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`maPhieu`,`maYeuCauSanXuat`,`ngayThucHien`),
  ADD KEY `phieuxuat_ibfk_1` (`maYeuCauSanXuat`),
  ADD KEY `phieuxuat_ibfk_2` (`maNguyenVatLieu`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSanPham`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tenDangNhap`);

--
-- Indexes for table `thuctesanxuat`
--
ALTER TABLE `thuctesanxuat`
  ADD PRIMARY KEY (`maThucTeSanXuat`),
  ADD KEY `maLenhSanXuat` (`maLenhSanXuat`);

--
-- Indexes for table `yeucausanxuat`
--
ALTER TABLE `yeucausanxuat`
  ADD PRIMARY KEY (`maYeuCauSanXuat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `congdoan`
--
ALTER TABLE `congdoan`
  MODIFY `maCongDoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nguyenvatlieu`
--
ALTER TABLE `nguyenvatlieu`
  MODIFY `maNguyenVatLieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `maPhieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `khonvl`
--
ALTER TABLE `khonvl`
  ADD CONSTRAINT `khonvl_ibfk_1` FOREIGN KEY (`maNguyenVatLieu`) REFERENCES `nguyenvatlieu` (`maNguyenVatLieu`),
  ADD CONSTRAINT `khonvl_ibfk_2` FOREIGN KEY (`maKho`) REFERENCES `kho` (`maKho`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
