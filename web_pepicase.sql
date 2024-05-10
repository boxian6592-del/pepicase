-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2024 lúc 10:29 AM
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
-- Cơ sở dữ liệu: `web_pepicase`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `Cart_ID` char(20) NOT NULL,
  `User_ID` char(20) NOT NULL,
  `Product_Name` varchar(225) NOT NULL,
  `Note` text NOT NULL,
  `Price` float(10,2) NOT NULL,
  `Quantity` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `InvoiceID` char(20) NOT NULL,
  `ProductID` char(20) NOT NULL,
  `Order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Phone` char(20) NOT NULL,
  `Email` char(20) NOT NULL,
  `Status` text NOT NULL,
  `Ship_address` text NOT NULL,
  `Price` float(10,2) NOT NULL,
  `Payment_method` char(20) NOT NULL,
  `Note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collection`
--

CREATE TABLE `collection` (
  `Collect_ID` char(20) NOT NULL,
  `Collect_Name` varchar(225) NOT NULL,
  `Product_ID` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `User_ID` char(20) NOT NULL,
  `ProductID` char(20) NOT NULL,
  `Created_At` datetime NOT NULL,
  `Comment` varchar(200) NOT NULL,
  `Star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `Cart_ID` char(20) NOT NULL,
  `UserID` char(20) NOT NULL,
  `Total_Price` float(10,2) NOT NULL,
  `Total_Amount` float(10,2) NOT NULL,
  `Product_ID` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `Invoice_ID` varchar(20) NOT NULL,
  `User_ID` varchar(20) NOT NULL,
  `Product_ID` varchar(20) NOT NULL,
  `Voucher_ID` varchar(20) NOT NULL,
  `Total_Amount` float NOT NULL,
  `Total_Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `Product_ID` char(20) NOT NULL,
  `Name_Product` varchar(200) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `Model` text NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Image` text NOT NULL,
  `QuantityInStock` int(11) NOT NULL,
  `IsInStock` tinyint(1) NOT NULL,
  `IsDeleted` tinyint(1) NOT NULL,
  `Created_At` datetime NOT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Color` text NOT NULL,
  `Collect_ID` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `User_ID` char(20) NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `Voucher_ID` char(20) NOT NULL,
  `Voucher_Name` varchar(255) NOT NULL,
  `Discount_Type` int(20) NOT NULL,
  `Start_Date` datetime NOT NULL,
  `End_Date` datetime NOT NULL,
  `Max_Usage` int(200) NOT NULL,
  `Current_Usage` int(200) NOT NULL,
  `Deleted_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_At` datetime NOT NULL,
  `Updated_At` datetime NOT NULL,
  `Discount_Value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `ProductID` char(20) NOT NULL,
  `UserID` char(20) NOT NULL,
  `Created_At` datetime NOT NULL,
  `Updated_At` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`Cart_ID`,`User_ID`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`InvoiceID`);

--
-- Chỉ mục cho bảng `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`Collect_ID`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`User_ID`,`ProductID`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`Voucher_ID`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
