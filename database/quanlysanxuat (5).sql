-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 03, 2022 at 03:09 PM
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
(2, 'may');

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
(44, 'ycsx001', 'tổ 1', '2022-12-01', '2022-12-07');

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
('tổ 1', 12, 50, 4000000),
('tổ 2', 13, 50, 4000000);

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
(1, 1, 200),
(2, 1, 600),
(3, 1, 40),
(4, 1, 40);

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
(0, 22, 20),
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
('lsx10', 'abc', 1, 'ycsx002', 'tổ 1', '2022-12-09', 'adminsinh', '2022-12-02', 40),
('lsx5', 'sản xuất bù', 1, 'ycsx002', 'tổ 1', '2023-11-03', 'quyadmin', '2022-11-29', 20),
('lsx52', 'sx bù', 1, 'ycsx002', 'tổ 1', '2022-12-07', 'sinhadmin', '2022-11-30', 46),
('lsx522', '312321', 2, 'ycsx002', 'tổ 1', '2023-11-11', 'sinhadmin', '2022-11-30', 12),
('lsx528', 'sản xuất bù s', 2, 'ycsx002', 'tổ 1', '2022-12-09', 'quyadmin', '2022-12-01', 2),
('lsx53', 'adaa', 2, 'ycsx002', 'tổ 1', '2022-12-04', 'sinhadmin', '2022-11-01', 20),
('lsx62', 'sda', 2, 'ycsx001', 'tổ 1', '2022-12-03', 'sinhadmin', '2022-12-01', 56);

--
-- Triggers `lenhsanxuat`
--
DELIMITER $$
CREATE TRIGGER `insertl` BEFORE INSERT ON `lenhsanxuat` FOR EACH ROW BEGIN    
            UPDATE yeucausanxuat 
          SET yeucausanxuat.soLuong=(yeucausanxuat.soLuong-new.soLuongSX)
          WHERE yeucausanxuat.maYeuCauSanXuat = new.maYeuCauSanXuat;
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
(4, 1, 'khóa', 'cái');

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
(22, 'dép', 'https://xinhmoingay.net/wp-content/uploads/2020/09/de%CC%81p-la%CC%80o1.jpg', 'chưa sản xuất', 'cái', 4000),
(23, 'áo thun', 'https://baohothaison.com/wp-content/uploads/2016/07/ao-thanh-nien-tinh-nguyen-tay-dai.jpg', 'chưa sản xuất', 'cái', 7000),
(24, 'bình giữ nhiệt', 'https://cdn.nguyenkimmall.com/images/detailed/828/10052401-binh-giu-nhiet-elmich-420ml-el3667-1.jpg', 'chưa sản xuất', 'cái', 20000);

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
('admin', 'admin', '25d55ad283aa400af464c76d713c07ad', 'phankimsinh20@gmail.com', '0961294993', 'https://scontent.fhan5-2.fna.fbcdn.net/v/t1.18169-9/17757493_1756589318004197_8515261495779378798_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=19026a&_nc_ohc=QEmrwefKjlQAX922WGa&_nc_ht=scontent.fhan5-2.fna&oh=00_AfChRMQE071BWYwSSjKiFJWP1WxgRfn7NuDD_jI0A-eInw&oe=63AB675E', 'admin'),
('dungadmin', 'adminstrator', '25d55ad283aa400af464c76d713c07ad', 'dung@gmail.com', '097373232', 'https://scontent.fhan5-2.fna.fbcdn.net/v/t1.18169-9/17757493_1756589318004197_8515261495779378798_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=19026a&_nc_ohc=QEmrwefKjlQAX922WGa&_nc_ht=scontent.fhan5-2.fna&oh=00_AfChRMQE071BWYwSSjKiFJWP1WxgRfn7NuDD_jI0A-eInw&oe=63AB675E', 'adminsx'),
('quyadmin', 'adminstrator', '25d55ad283aa400af464c76d713c07ad', 'quy@gmail.com', '0973732323', 'https://kenh14cdn.com/2020/6/30/img0096-1592366363868430058761-1593507888983990295582.jpeg', 'adminsx'),
('sinhadmin', 'adminstrator', '25d55ad283aa400af464c76d713c07ad', 'sinh@gmail.com', '097123172', 'https://kenh14cdn.com/2020/6/30/img0096-1592366363868430058761-1593507888983990295582.jpeg', 'adminsx'),
('user1', 'user', '25d55ad283aa400af464c76d713c07ad', 'user1@gmail.com', '0973722323', 'https://phunugioi.com/wp-content/uploads/2021/10/Nhung-mau-anh-the-dep-tip-chup-anh-the-dep-1.jpg', 'user');

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
('lsx10', 1, 20, '2022-11-10'),
('lsx62', 2, 4, '2022-11-03'),
('lsx10', 3, 4, '2022-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `yeucausanxuat`
--

CREATE TABLE `yeucausanxuat` (
  `maYeuCauSanXuat` varchar(50) NOT NULL,
  `maSanPham` int(11) NOT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `ngayGiaoHang` date DEFAULT NULL,
  `donGia` double DEFAULT NULL,
  `tinhTrang` varchar(40) NOT NULL,
  `ngayTao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yeucausanxuat`
--

INSERT INTO `yeucausanxuat` (`maYeuCauSanXuat`, `maSanPham`, `soLuong`, `ngayGiaoHang`, `donGia`, `tinhTrang`, `ngayTao`) VALUES
('ycsx001', 22, 32, '2022-11-19', 600000000, 'chưa xử lý', '2022-11-28'),
('ycsx001', 23, 25, '2022-11-01', 300000000, 'chưa xử lý', '2022-11-25'),
('ycsx002', 22, 21, '2022-12-16', 3000000, 'chưa xỷ lý', '2022-12-03');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`maYeuCauSanXuat`,`maSanPham`),
  ADD KEY `maSanPham` (`maSanPham`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `congdoan`
--
ALTER TABLE `congdoan`
  MODIFY `maCongDoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `maPhieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `khonvl`
--
ALTER TABLE `khonvl`
  ADD CONSTRAINT `khonvl_ibfk_1` FOREIGN KEY (`maNguyenVatLieu`) REFERENCES `nguyenvatlieu` (`maNguyenVatLieu`),
  ADD CONSTRAINT `khonvl_ibfk_2` FOREIGN KEY (`maKho`) REFERENCES `kho` (`maKho`);

--
-- Constraints for table `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD CONSTRAINT `phieuxuat_ibfk_1` FOREIGN KEY (`maYeuCauSanXuat`) REFERENCES `yeucausanxuat` (`maYeuCauSanXuat`),
  ADD CONSTRAINT `phieuxuat_ibfk_2` FOREIGN KEY (`maNguyenVatLieu`) REFERENCES `khonvl` (`maNguyenVatLieu`);

--
-- Constraints for table `yeucausanxuat`
--
ALTER TABLE `yeucausanxuat`
  ADD CONSTRAINT `yeucausanxuat_ibfk_1` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`maSanPham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
