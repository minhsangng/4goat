-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2025 at 06:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4goat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandID` int(5) NOT NULL,
  `brandName` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandID`, `brandName`, `contact`, `image`) VALUES
(1, 'Canifa', '02473006666', 'canifa.png'),
(2, 'Routine', '02836221011', 'routine.png'),
(3, 'Ninomaxx', '02862988222', 'ninomaxx.png'),
(4, 'Blue Exchange', '02839366699', 'blueexchange.png'),
(5, 'Hnoss', '02873099996', 'hnoss.png'),
(6, 'Couple TX', '02838114020', 'coupletx.png'),
(7, 'Unimedia', '02437617189', 'unimedia.png'),
(8, 'Yody', '18002086', 'yody.png'),
(9, 'Owen', '02438572222', 'owen.png'),
(10, 'An Phước', '02839250560', 'anphuoc.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `customerID`, `date`) VALUES
(1, 1, '2025-04-08 11:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `size` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `discount` decimal(10,2) DEFAULT 0.00,
  `promotionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cartID`, `productID`, `price`, `quantity`, `size`, `color`, `discount`, `promotionID`) VALUES
(1, 1, 199000.00, 2, 'M', 'Xanh', 0.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'Áo thun'),
(2, 'Áo sơ mi'),
(3, 'Áo khoác'),
(4, 'Phụ kiện'),
(5, 'Hoodie & nỉ'),
(6, 'Quần jean'),
(7, 'Quần dài'),
(8, 'Quần đùi'),
(9, 'Áo polo'),
(10, 'Đồ lót'),
(11, 'Đồ bộ'),
(12, 'Vớ/tất'),
(13, 'Chân váy'),
(14, 'Đầm/váy'),
(15, 'Giày/dép'),
(16, 'Đồ thể thao'),
(17, 'Áo kiểu');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `collectionID` int(5) NOT NULL,
  `colletctionName` varchar(50) NOT NULL,
  `author` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collectionID`, `colletctionName`, `author`) VALUES
(1, 'Xuân Hè 2024', 'Aurora Nguyễn'),
(2, 'Limited Edition', 'Zephyr Lê'),
(3, 'Thời trang công sở', 'Elara Trần'),
(4, 'Street Style 2024', 'Orion Bùi'),
(5, 'Phong cách Vintage', 'Selene Vũ'),
(6, 'Bộ sưu tập Unisex', 'Lysander Hoàng'),
(7, 'Hè năng động', 'Nova Đặng'),
(8, 'Thể thao & Fitness', 'Atlas Phạm'),
(9, 'Thời trang dạo phố', 'Cosmo Ngô'),
(10, 'Bộ sưu tập Minimalism', 'Echo Đỗ'),
(11, 'Phong cách đường phố', 'Horizon Nguyễn'),
(12, 'Winter Collection', 'Luna Lý'),
(13, 'Casual Wear 2024', 'Sol Trịnh'),
(14, 'Đồ đôi Couple', 'Venus Hà'),
(15, 'Luxury Fashion', 'Eros Cao');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `loginName` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `customerType` tinyint(1) NOT NULL DEFAULT 0,
  `blackList` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `phoneNumber`, `email`, `loginName`, `password`, `address`, `customerType`, `blackList`) VALUES
(1, 'Nguyễn Minh Sang', '0941802624', NULL, 'msang', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, 1),
(11, 'Nguyễn Minh Sang', '0941802111', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `finalPrice` decimal(10,2) NOT NULL,
  `paymentMethod` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `userID`, `customerID`, `finalPrice`, `paymentMethod`, `date`, `status`) VALUES
(1, 1, 1, 299000.00, 0, '2025-04-10 15:37:30', 1),
(4, 1, 8, 1699000.00, 0, '2025-04-10 23:41:30', 1),
(5, 1, 11, 531000.00, 0, '2025-04-10 23:49:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `discount` decimal(10,2) DEFAULT 0.00,
  `promotionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderID`, `productID`, `price`, `quantity`, `discount`, `promotionID`) VALUES
(1, 1, 150000.00, 1, 0.00, NULL),
(1, 2, 160000.00, 1, 0.00, NULL),
(4, 1, 199000.00, 15, 0.00, NULL),
(4, 9, 349000.00, 1, 0.00, NULL),
(4, 11, 99000.00, 4, 0.00, NULL),
(4, 12, 89000.00, 9, 0.00, NULL),
(4, 23, 476000.00, 5, 0.00, NULL),
(4, 24, 166000.00, 11, 0.00, NULL),
(4, 25, 189000.00, 14, 0.00, NULL),
(4, 26, 259000.00, 10, 0.00, NULL),
(4, 51, 265000.00, 2, 0.00, NULL),
(4, 54, 319000.00, 1, 0.00, NULL),
(5, 1, 199000.00, 18, 0.00, NULL),
(5, 9, 349000.00, 1, 0.00, NULL),
(5, 11, 99000.00, 4, 0.00, NULL),
(5, 12, 89000.00, 9, 0.00, NULL),
(5, 23, 476000.00, 5, 0.00, NULL),
(5, 24, 166000.00, 16, 0.00, NULL),
(5, 25, 189000.00, 14, 0.00, NULL),
(5, 26, 259000.00, 10, 0.00, NULL),
(5, 51, 265000.00, 2, 0.00, NULL),
(5, 54, 319000.00, 1, 0.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `brandID` int(11) DEFAULT NULL,
  `collecttionID` int(11) DEFAULT NULL,
  `sex` tinyint(4) NOT NULL DEFAULT 0,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `variant` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `categoryID`, `brandID`, `collecttionID`, `sex`, `price`, `image`, `variant`, `status`) VALUES
(1, 'Áo Sơ Mi Nam Dài Tay', 2, 0, 0, 1, 199000.00, 'áo sơ mi nam dài tay/aosominamdaitay', 1, 1),
(2, 'Áo Thun Nam Basic Cotton', 1, 0, 0, 1, 249000.00, 'áo thun nam basic cotton/aothunnambasiccotton', 1, 1),
(3, 'Quần Jean Nam Co Giãn', 6, 0, 0, 1, 179000.00, 'quần jean nam co giãn/quanjeannamcogian', 1, 1),
(4, 'Áo Hoodie Nam Form Rộng', 5, 0, 0, 1, 299000.00, 'áo hoodie nam form rộng/aohoodienamformrong', 1, 1),
(5, 'Quần Short Kaki Nam', 8, 0, 0, 1, 150000.00, 'quần short kaki nam/quanshortkakinam', 1, 1),
(6, 'Đầm Maxi Nữ Dự Tiệc', 14, 0, 0, 2, 220000.00, 'đầm maxi nữ dự tiệc/dammaxinudutiec', 1, 1),
(7, 'Áo Croptop Nữ Cá Tính', 17, 0, 0, 2, 280000.00, 'áo croptop nữ cá tính/aocroptopnucatinh', 1, 1),
(8, 'Quần Legging Nữ Tập Gym', 16, 0, 0, 2, 199000.00, 'quần legging nữ tập gym/quanleggingnutapgym', 1, 1),
(9, 'Áo Sơ Mi Nữ Công Sở', 2, 0, 0, 2, 349000.00, 'áo sơ mi nữ công sở/aosominunucongso', 1, 1),
(10, 'Váy Xòe Hoa Nữ Dễ Thương', 14, 0, 0, 2, 275000.00, 'váy xòe hoa nữ dễ thương/vayxoehoanudethuong', 1, 1),
(11, 'Nón Lưỡi Trai Unisex', 4, 0, 0, 0, 99000.00, 'nón lưỡi trai unisex/nonluoitraiunisex', 1, 1),
(12, 'Thắt Lưng Da Nam Cao Cấp', 4, 0, 0, 1, 89000.00, 'thắt lưng da nam cao cấp/thatlungdanamcaocap', 1, 1),
(13, 'Túi Đeo Chéo Thời Trang', 4, 0, 0, 0, 120000.00, 'túi đeo chéo thời trang/tuideocheothoitrang', 1, 1),
(14, 'Kính Mát Thời Trang Unisex', 4, 0, 0, 0, 150000.00, 'kính mát thời trang unisex/kinhmatthoitrangunisex', 1, 1),
(15, 'Găng Tay Da', 4, 0, 0, 0, 130000.00, 'găng tay da/gangtayda', 1, 1),
(16, 'Giày Sneaker Nam Thể Thao', 15, 0, 0, 1, 299000.00, 'giày sneaker nam thể thao/giaysneakernamthethao', 1, 1),
(17, 'Giày Cao Gót Nữ Thanh Lịch', 15, 0, 0, 2, 399000.00, 'giày cao gót nữ thanh lịch/giaycaogotnuthanhlich', 1, 1),
(18, 'Giày Thể Thao Unisex', 15, 0, 0, 1, 250000.00, 'giày thể thao unisex/giaythethaounisex', 1, 1),
(19, 'Dép Sandal Nam', 15, 0, 0, 1, 329000.00, 'dép sandal nam/depsandalnam', 1, 1),
(20, 'Dép Lê Nữ Nhẹ Êm', 15, 0, 0, 2, 289000.00, 'dép lê nữ nhẹ êm/deplenunheem', 1, 1),
(21, 'Quần Lót Su Yody', 10, 8, 15, 2, 297000.00, 'quần lót su yody/quanlotsuyody', 1, 1),
(22, 'Giày Dép Owen Nam/Nữ', 15, 9, 0, 0, 366000.00, 'giày dép owen nam nữ/giaydepowennamnu', 1, 1),
(23, 'Áo Thun Nam Owen Trẻ Trung', 1, 9, 6, 1, 476000.00, 'áo thun nam owen trẻ trung/aothunnamowentretrung', 1, 1),
(24, 'Áo Thun Couple TX Cặp Đôi', 1, 6, 2, 1, 166000.00, 'áo thun couple tx cặp đôi/aothuncoupletxcapdoi', 1, 1),
(25, 'Áo Sơ Mi Nam Canifa Lịch Lãm', 2, 1, 3, 1, 189000.00, 'áo sơ mi nam canifa lịch lãm/aosominamcanifalichlam', 1, 1),
(26, 'Áo Sơ Mi Nữ An Phước Công Sở', 2, 10, 9, 2, 259000.00, 'áo sơ mi nữ an phước công sở/aosominuanphuoccongso', 1, 1),
(27, 'Áo Khoác Nam Blue Exchange', 3, 4, 12, 1, 349000.00, 'áo khoác nam blue exchange/aokhoacnamblueexchange', 1, 1),
(28, 'Áo Hoodie Nữ Routine Năng Động', 5, 2, 5, 2, 319000.00, 'áo hoodie nữ routine năng động/aohoodienuroutinenangdong', 1, 1),
(29, 'Quần Jean Nữ Ninomaxx Basic', 6, 3, 7, 2, 199000.00, 'quần jean nữ ninomaxx basic/quanjeannununomaxxbasic', 1, 1),
(30, 'Quần Tây Nam Owen Công Sở', 7, 9, 3, 1, 249000.00, 'quần tây nam owen công sở/quantaynamowencongso', 1, 1),
(31, 'Quần Short Kaki Nữ Hnoss Cá Tính', 8, 5, 1, 2, 179000.00, 'quần short kaki nữ hnoss cá tính/quanshortkakinuhnosscatinh', 1, 1),
(32, 'Áo Polo Nam Yody Trẻ Trung', 9, 8, 11, 1, 225000.00, 'áo polo nam yody trẻ trung/aopolonamyodytretrung', 1, 1),
(33, 'Áo Polo Nữ Routine Thanh Lịch', 9, 2, 11, 2, 210000.00, 'áo polo nữ routine thanh lịch/aopolonuroutinethanhlich', 1, 1),
(34, 'Quần Lót Nam An Phước Cotton', 10, 10, 0, 2, 129000.00, 'quần lót nam an phước cotton/quanlotnamanphuoccotton', 1, 1),
(35, 'Đồ Bộ Nam Canifa Mặc Nhà', 11, 1, 14, 1, 275000.00, 'đồ bộ nam canifa mặc nhà/dobonamcanifamacnha', 1, 1),
(36, 'Đồ Bộ Nữ Hnoss Dễ Thương', 11, 5, 14, 2, 299000.00, 'đồ bộ nữ hnoss dễ thương/dobonuhnossdethuong', 1, 1),
(37, 'Vớ Nam Blue Exchange Cổ Thấp', 12, 4, 0, 1, 79000.00, 'vớ nam blue exchange cổ thấp/vonamblueexchangecothap', 1, 1),
(38, 'Vớ Nữ Unimedia Mềm Mại', 12, 7, 0, 2, 85000.00, 'vớ nữ unimedia mềm mại/vonuunimediamemmai', 1, 1),
(39, 'Chân Váy Vintage Hnoss Nữ', 13, 5, 5, 2, 329000.00, 'chân váy vintage hnoss nữ/chanvayvintagehnossnu', 1, 1),
(40, 'Đầm Công Sở Nữ An Phước', 14, 10, 3, 2, 389000.00, 'đầm công sở nữ an phước/damcongsounanphuoc', 1, 1),
(41, 'Váy Dạ Hội Nữ Luxury Fashion', 14, 9, 15, 2, 499000.00, 'váy dạ hội nữ luxury fashion/vaydahoinuluxuryfashion', 1, 1),
(42, 'Giày Sneaker Nam Canifa Năng Động', 15, 1, 8, 1, 399000.00, 'giày sneaker nam canifa năng động/giaysneakernamcanifanangdong', 1, 1),
(43, 'Giày Cao Gót Nữ Routine Thời Trang', 15, 2, 4, 2, 450000.00, 'giày cao gót nữ routine thời trang/giaycaogotnuroutinethoitrang', 1, 1),
(44, 'Giày Thể Thao Unisex Ninomaxx', 15, 3, 6, 0, 299000.00, 'giày thể thao unisex ninomaxx/giaythethaounisexninomaxx', 1, 1),
(45, 'Dép Sandal Nữ Yody Êm Ái', 15, 8, 0, 2, 199000.00, 'dép sandal nữ yody êm ái/depsandalnuyodyemai', 1, 1),
(46, 'Dép Lê Nam Owen Đơn Giản', 15, 9, 0, 1, 159000.00, 'dép lê nam owen đơn giản/deplenamowendonian', 1, 1),
(47, 'Áo Thể Thao Nam Couple TX Co Giãn', 16, 6, 8, 1, 220000.00, 'áo thể thao nam couple tx co giãn/aothethaonamcoupletxcogian', 1, 1),
(48, 'Áo Thể Thao Nữ Unimedia', 16, 7, 8, 2, 230000.00, 'áo thể thao nữ unimedia/aothethaonuunimediadechiu', 1, 1),
(49, 'Quần Dài Thể Thao Nữ Blue Exchange', 16, 4, 8, 2, 249000.00, 'quần dài thể thao nữ blue exchange/quandaithethaonublueexchange', 1, 1),
(50, 'Phụ Kiện Thời Trang Yody Đa Dụng', 4, 8, 9, 0, 327000.00, 'phụ kiện thời trang yody đa dụng/phukienthoitrangyodydadung', 1, 1),
(51, 'Áo Sơ Mi Nam Trắng Trơn Cao Cấp', 2, 1, 0, 1, 265000.00, 'áo sơ mi nam trắng trơn cao cấp/aosominamtrangtroncaocap', 1, 1),
(52, 'Quần Tây Nam Công Sở Lịch Lãm', 7, 2, 0, 1, 279000.00, 'quần tây nam công sở lịch lãm/quantaynamcongsolichlam', 1, 1),
(53, 'Váy Đầm Dự Tiệc Nữ Kiểu Dáng Ôm Body', 14, 5, 0, 2, 459000.00, 'váy đầm dự tiệc nữ kiểu dáng ôm body/vaydamdutiecnukieudangombody', 1, 1),
(54, 'Áo Khoác Dù Nam Chống Nước', 3, 3, 0, 1, 319000.00, 'áo khoác dù nam chống nước/aokhoacdunamchongnuoc', 1, 1),
(55, 'Chân Váy Xếp Ly Nữ Vintage', 13, 5, 0, 2, 235000.00, 'chân váy xếp ly nữ vintage/chanvayxeplynuvintage', 1, 1),
(56, 'Đồ Bộ Pijama Nữ Cotton Mềm Mại', 11, 4, 0, 2, 349000.00, 'đồ bộ pijama nữ cotton mềm mại/dobopijamanucottonmemmai', 1, 1),
(57, 'Giày Tây Nam Da Bóng Lịch Lãm', 15, 2, 0, 1, 499000.00, 'giày tây nam da bóng lịch lãm/giaytaynamdabonglichlam', 1, 1),
(58, 'Túi Tote Nữ Phối Màu Hàn Quốc', 4, 6, 0, 2, 189000.00, 'túi tote nữ phối màu hàn quốc/tuitotenuphoimauhanquoc', 1, 1),
(59, 'Thắt Lưng Nam Da Thật Cao Cấp', 4, 9, 0, 1, 210000.00, 'thắt lưng nam da thật cao cấp/thatlungnamdathatcaocap', 1, 1),
(60, 'Vớ Cổ Cao Nữ Mềm Mại', 12, 7, 0, 2, 69000.00, 'vớ cổ cao nữ mềm mại/vococaonumemmai', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `productID` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`productID`, `size`, `color`) VALUES
(1, 'M', 'Trắng'),
(1, 'L', 'Trắng'),
(1, 'M', 'Nâu'),
(1, 'L', 'Nâu'),
(1, 'M', 'Xanh'),
(1, 'L', 'Xanh');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotionID` int(11) NOT NULL,
  `promotionName` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `percentDiscount` decimal(5,2) NOT NULL,
  `maxDiscount` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  `categoryID` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `content` text NOT NULL,
  `rate` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`customerID`, `productID`, `content`, `rate`, `status`) VALUES
(1, 1, 'Vải đẹp, đúng form, mặc vừa vặn, sẽ mua tiếp', 5, 1),
(2, 1, 'Tạm ổn', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `storageID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `phoneNumber` varchar(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(11) NOT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `phoneNumber`, `email`, `password`, `role`, `status`) VALUES
(1, 'admin', '0987654321', 'admin@example.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(2, 'employee01', '0912233445', 'employee01@example.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 1),
(3, 'employee02', '0903344556', 'employee02@example.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 1),
(4, 'employee03', '0922233445', 'employee03@example.com', 'e10adc3949ba59abbe56e057f20f883e', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collectionID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `loginName` (`loginName`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderID`,`productID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `order_detail_ibfk_3` (`promotionID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD KEY `product_detail_ibfk_1` (`productID`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotionID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`customerID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`storageID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistID`),
  ADD KEY `productID` (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collectionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
