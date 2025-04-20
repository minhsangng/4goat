-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 07:24 PM
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
(1, 1, '2025-04-08 11:23:04'),
(3, 2, '2025-04-19 18:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `cart_detailID` int(11) NOT NULL,
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

INSERT INTO `cart_detail` (`cart_detailID`, `cartID`, `productID`, `price`, `quantity`, `size`, `color`, `discount`, `promotionID`) VALUES
(26, 3, 24, 166000.00, 2, 'M', 'Cam', 0.00, NULL);

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
  `collectionName` varchar(50) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `releaseDate` date NOT NULL DEFAULT current_timestamp(),
  `imageAuthor` varchar(100) NOT NULL,
  `imageCollection` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collectionID`, `collectionName`, `brand`, `author`, `releaseDate`, `imageAuthor`, `imageCollection`, `description`) VALUES
(1, 'LifeWear Xuân Hè 2025', 'UNIQLO', 'Naoki Takizawa', '2025-04-17', 'collections/authors/naokitakizawa', 'collections/lifewear2025uniqlo/img', 'Chủ đề \"Essential for City Life\", tập trung vào chất liệu hiện đại, phom dáng tinh tế và màu sắc thời thượng.'),
(2, 'Ready-to-Wear Xuân Hè 2025', 'CHANEL', 'Virginie Viard', '2025-03-15', 'collections/authors/virginieviard', 'collections/albums/', 'Tôn vinh sự nhẹ nhàng và chuyển động, lấy cảm hứng từ các nữ phi công tiên phong và nhà văn Colette.'),
(3, 'Haute Couture Xuân Hè 2025', 'Dior', 'Maria Grazia Chiuri', '2025-03-01', 'collections/authors/maria graziachiuri', 'collections/albums/', 'Khám phá trí tưởng tượng tuổi thơ, kết hợp giữa ký ức may đo và sự sáng tạo của thế kỷ trước.'),
(4, 'Xuân Hè 2025', 'Louis Vuitton', 'Pharrell Williams', '2025-03-10', 'collections/authors/pharrellwilliams', 'collections/albums/pharrellwilliams', 'Tập trung vào áo sơ mi dáng rộng, quần jean, túi Keepall Cargo và giày thể thao, mang phong cách hiện đại.'),
(5, 'Xuân Hè 2025', 'Burberry', 'Daniel Lee', '2025-03-05', 'collections/authors/daniellee', 'collections/albums/', 'Trở về với sự đằm tính, kết hợp giữa cổ điển và hiện đại trong thiết kế.'),
(6, 'Xuân Hè 2025', 'Tommy Hilfiger', 'Tommy Hilfiger', '2025-03-08', 'collections/authors/tommyhilfiger', 'collections/albums/', 'Lấy cảm hứng từ hàng hải và phong cách \"Old Money\", mang đến sự sang trọng và cổ điển.'),
(7, 'Xuân Hè 2025', 'Coach', 'Stuart Vevers', '2025-03-12', 'collections/authors/stuartvevers', 'collections/albums/', 'Đưa bạn lạc vào thế giới của cửa hàng đồ cũ New York, kết hợp giữa cổ điển và hiện đại.'),
(8, 'Xuân Hè 2025', 'Trần Hùng', 'Trần Hùng', '2025-03-15', 'collections/authors/tranhung', 'collections/albums/', 'Lấy cảm hứng từ hoa lan và tình yêu với môi trường, thể hiện sự tinh tế và bền vững trong thiết kế.'),
(9, 'Xuân Hè 2025', 'Versace', 'Donatella Versace', '2025-03-20', 'collections/authors/donatellaversace', 'collections/xuanhe2025marcjacobs/img', 'Đưa các tín đồ trở về thập niên 90 với thiết kế lấy cảm hứng từ BST Versus Xuân 1997, kết hợp màu sắc và họa tiết đa dạng.'),
(10, 'Xuân Hè 2025', 'Marc Jacobs', 'Marc Jacobs', '2025-03-25', 'collections/authors/marcjacobs', 'collections/xuanhe2025donatellaversace/img', 'Biến tổn thương thành nghệ thuật, thể hiện cảm xúc qua thiết kế sáng tạo và độc đáo.');

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
  `blackList` tinyint(4) DEFAULT 1,
  `recoveryCode` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `phoneNumber`, `email`, `loginName`, `password`, `address`, `customerType`, `blackList`, `recoveryCode`) VALUES
(1, 'Nguyễn Minh Sang', '0942362333', 'sangminh4062@gmail.com', 'msang', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, 1, ''),
(2, 'Võ Ngọc Châu', '0723652126', '', 'nchou', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 1, ''),
(3, 'Tô Văn Dũng', '0941806666', NULL, NULL, NULL, NULL, 0, 1, ''),
(4, 'Hoắc Kiến Hoa', '0941806699', NULL, NULL, NULL, NULL, 0, 1, ''),
(5, 'Dương Tiễn', '0941806333', NULL, NULL, NULL, NULL, 0, 1, ''),
(6, 'Hao Thiên Khuyễn', '0941326251', NULL, NULL, NULL, NULL, 0, 1, ''),
(7, 'Lê Đỗ Quỳnh Hường', '0941812345', NULL, NULL, NULL, NULL, 0, 1, ''),
(8, 'Trần Cao Kiệt', '0923256421', NULL, NULL, NULL, NULL, 0, 1, '');
-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `paymentMethod` varchar(10) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `userID`, `customerID`, `paymentMethod`, `date`, `status`) VALUES
(1, 1, 1, 'Tiền mặt', '2025-04-10 15:37:30', 1),
(2, 1, 1, 'Tiền mặt', '2025-04-10 23:41:30', 1),
(3, 1, 1, 'Momo', '2025-04-10 23:49:22', 1),
(4, 1, 2, 'Tiền mặt', '2025-04-20 22:01:47', 1),
(5, 0, 3, 'Momo', '2025-04-20 22:11:06', 1),
(6, 0, 4, 'Momo', '2025-04-20 22:12:57', 1),
(7, 0, 5, 'VNPay', '2025-04-20 22:21:20', 1),
(8, 0, 6, 'Tiền mặt', '2025-04-20 22:21:54', 1),
(9, 0, 7, 'Tiền mặt', '2025-04-20 22:24:18', 1);

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
(2, 1, 199000.00, 5, 0.00, NULL),
(2, 9, 349000.00, 1, 0.00, NULL),
(2, 11, 99000.00, 4, 0.00, NULL),
(2, 12, 89000.00, 9, 0.00, NULL),
(2, 23, 476000.00, 5, 0.00, NULL),
(2, 24, 166000.00, 1, 0.00, NULL),
(2, 25, 189000.00, 9, 0.00, NULL),
(2, 26, 259000.00, 10, 0.00, NULL),
(2, 51, 265000.00, 2, 0.00, NULL),
(2, 54, 319000.00, 1, 0.00, NULL),
(3, 1, 199000.00, 18, 0.00, NULL),
(3, 9, 349000.00, 1, 0.00, NULL),
(3, 11, 99000.00, 4, 0.00, NULL),
(3, 12, 89000.00, 9, 0.00, NULL),
(3, 23, 476000.00, 5, 0.00, NULL),
(3, 24, 166000.00, 5, 0.00, NULL),
(3, 25, 189000.00, 6, 0.00, NULL),
(3, 26, 259000.00, 3, 0.00, NULL),
(3, 51, 265000.00, 2, 0.00, NULL),
(3, 54, 319000.00, 1, 0.00, NULL),
(4, 1, 199000.00, 9, 0.00, NULL),
(5, 1, 199000.00, 2, 0.00, NULL),
(6, 1, 199000.00, 1, 0.00, NULL),
(6, 24, 166000.00, 1, 0.00, NULL),
(7, 1, 199000.00, 1, 0.00, NULL),
(7, 23, 476000.00, 1, 0.00, NULL),
(7, 24, 166000.00, 1, 0.00, NULL),
(8, 1, 199000.00, 1, 0.00, NULL),
(8, 24, 166000.00, 1, 0.00, NULL),
(8, 25, 189000.00, 1, 0.00, NULL),
(9, 23, 476000.00, 1, 0.00, NULL),
(9, 24, 166000.00, 5, 0.00, NULL),
(9, 51, 265000.00, 2, 0.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `topic` varchar(20) NOT NULL,
  `keyword` varchar(100) DEFAULT NULL,
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
  `brandID` int(11) DEFAULT 0,
  `collecttionID` int(11) DEFAULT 0,
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
(9, 'Áo Sơ Mi Nữ Công Sở', 2, 0, 0, 2, 349000.00, 'áo sơ mi nữ công sở/aosominucongso', 1, 1),
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
(34, 'Quần Lót Nam An Phước Cotton', 10, 10, 0, 1, 129000.00, 'quần lót nam an phước cotton/quanlotnamanphuoccotton', 1, 1),
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
(1, 'M', 'Nâu'),
(1, 'M', 'Xanh'),
(1, 'L', 'Trắng'),
(1, 'L', 'Nâu'),
(1, 'L', 'Xanh'),
(2, 'M', 'Be'),
(2, 'M', 'Đen'),
(2, 'M', 'Xám'),
(2, 'M', 'Nâu'),
(2, 'L', 'Be'),
(2, 'L', 'Đen'),
(2, 'L', 'Xám'),
(2, 'L', 'Nâu'),
(3, 'M', 'Xanh nhạt'),
(3, 'M', 'Xanh đậm'),
(3, 'M', 'Xanh nâu'),
(3, 'M', 'Xanh vàng'),
(3, 'L', 'Xanh nhạt'),
(3, 'L', 'Xanh đậm'),
(3, 'L', 'Xanh nâu'),
(3, 'L', 'Xanh vàng'),
(4, 'Freesize', 'Đen'),
(5, 'S', 'Đen'),
(5, 'M', 'Đen'),
(5, 'L', 'Be'),
(6, 'S', 'Trắng'),
(6, 'M', 'Trắng'),
(6, 'L', 'Trắng'),
(7, 'S', 'Xám'),
(7, 'S', 'Đen'),
(7, 'S', 'Trắng'),
(7, 'M', 'Xám'),
(7, 'M', 'Đen'),
(7, 'M', 'Trắng'),
(7, 'L', 'Xám'),
(7, 'L', 'Đen'),
(7, 'L', 'Trắng'),
(8, 'M', 'Đen'),
(8, 'M', 'Xám'),
(8, 'M', 'Xanh đậm'),
(8, 'M', 'Xanh nhạt'),
(8, 'L', 'Đen'),
(8, 'L', 'Xám'),
(8, 'L', 'Xanh đậm'),
(8, 'L', 'Xanh nhạt'),
(9, 'S', 'Trắng'),
(9, 'S', 'Hồng'),
(9, 'S', 'Đen'),
(9, 'S', 'Xanh bơ'),
(9, 'M', 'Trắng'),
(9, 'M', 'Hồng'),
(9, 'M', 'Đen'),
(9, 'M', 'Xanh bơ'),
(9, 'L', 'Trắng'),
(9, 'L', 'Hồng'),
(9, 'L', 'Đen'),
(9, 'L', 'Xanh bơ'),
(10, 'S', 'Vàng'),
(10, 'M', 'Vàng'),
(10, 'L', 'Vàng'),
(11, 'Freesize', 'Hồng'),
(11, 'Freesize', 'Be'),
(11, 'Freesize', 'Xanh đậm'),
(11, 'Freesize', 'Xám'),
(12, 'Freesize', 'Đen'),
(13, '30x20x15', 'Be'),
(13, '30x20x15', 'Đen'),
(14, 'Freesize', 'Đen'),
(14, 'Freesize', 'Rêu'),
(14, 'Freesize', 'Trắng'),
(14, 'Freesize', 'Trong'),
(15, '20cm', 'Đen'),
(16, '36', 'Trắng'),
(16, '37', 'Trắng'),
(16, '38', 'Trắng'),
(16, '39', 'Trắng'),
(17, '36', 'Trắng'),
(17, '37', 'Trắng'),
(17, '38', 'Trắng'),
(17, '39', 'Trắng'),
(17, '36', 'Đen'),
(17, '37', 'Đen'),
(17, '38', 'Đen'),
(17, '39', 'Đen'),
(18, '36', 'Trắng'),
(18, '37', 'Trắng'),
(18, '38', 'Trắng'),
(18, '39', 'Trắng'),
(19, '36', 'Trắng'),
(19, '37', 'Trắng'),
(19, '38', 'Trắng'),
(19, '39', 'Trắng'),
(19, '36', 'Nâu'),
(19, '37', 'Nâu'),
(19, '38', 'Nâu'),
(19, '39', 'Nâu'),
(20, '36', 'Trắng'),
(20, '37', 'Trắng'),
(20, '38', 'Trắng'),
(20, '39', 'Trắng'),
(20, '36', 'Nâu'),
(20, '37', 'Nâu'),
(20, '38', 'Nâu'),
(20, '39', 'Nâu'),
(20, '36', 'Đen'),
(20, '37', 'Đen'),
(20, '38', 'Đen'),
(20, '39', 'Đen'),
(21, 'M', 'Nâu'),
(21, 'S', 'Nâu'),
(21, 'L', 'Nâu'),
(21, 'XL', 'Nâu'),
(21, 'M', 'Đen'),
(21, 'S', 'Đen'),
(21, 'L', 'Đen'),
(21, 'XL', 'Đen'),
(22, '38', 'Đen'),
(22, '39', 'Đen'),
(22, '40', 'Đen'),
(22, '41', 'Đen'),
(23, 'M', 'Trắng'),
(23, 'S', 'Trắng'),
(23, 'L', 'Trắng'),
(23, 'XL', 'Trắng'),
(23, 'M', 'Đen'),
(23, 'S', 'Đen'),
(23, 'L', 'Đen'),
(23, 'XL', 'Đen'),
(24, 'M', 'Nâu'),
(24, 'S', 'Nâu'),
(24, 'L', 'Nâu'),
(24, 'XL', 'Nâu'),
(24, 'M', 'Cam'),
(24, 'S', 'Cam'),
(24, 'L', 'Cam'),
(24, 'XL', 'Cam'),
(24, 'M', 'Vàng'),
(24, 'S', 'Vàng'),
(24, 'L', 'Vàng'),
(24, 'XL', 'Vàng'),
(25, 'M', 'Trắng'),
(25, 'S', 'Trắng'),
(25, 'L', 'Trắng'),
(25, 'XL', 'Trắng'),
(25, 'M', 'Xanh'),
(25, 'S', 'Xanh'),
(25, 'L', 'Xanh'),
(25, 'XL', 'Xanh'),
(26, 'M', 'Trắng'),
(26, 'S', 'Trắng'),
(26, 'L', 'Trắng'),
(26, 'XL', 'Trắng'),
(26, 'M', 'Xanh'),
(26, 'S', 'Xanh'),
(26, 'L', 'Xanh'),
(26, 'XL', 'Xanh'),
(26, 'M', 'Đen'),
(26, 'S', 'Đen'),
(26, 'L', 'Đen'),
(26, 'XL', 'Đen'),
(26, 'M', 'Hồng'),
(26, 'S', 'Hồng'),
(26, 'L', 'Hồng'),
(26, 'XL', 'Hồng'),
(27, 'M', 'Xanh nhạt'),
(27, 'S', 'Xanh nhạt'),
(27, 'L', 'Xanh nhạt'),
(27, 'XL', 'Xanh nhạt'),
(27, 'M', 'Xanh đậm'),
(27, 'S', 'Xanh đậm'),
(27, 'L', 'Xanh đậm'),
(27, 'XL', 'Xanh đậm'),
(28, 'M', 'Xám'),
(28, 'S', 'Xám'),
(28, 'L', 'Xám'),
(28, 'XL', 'Xám'),
(28, 'M', 'Xanh'),
(28, 'S', 'Xanh'),
(28, 'L', 'Xanh'),
(28, 'XL', 'Xanh'),
(28, 'M', 'Đen'),
(28, 'S', 'Đen'),
(28, 'L', 'Đen'),
(28, 'XL', 'Đen'),
(29, 'M', 'Xanh'),
(29, 'S', 'Xanh'),
(29, 'L', 'Xanh'),
(29, 'XL', 'Xanh'),
(30, 'M', 'Xanh nhạt'),
(30, 'S', 'Xanh nhạt'),
(30, 'L', 'Xanh nhạt'),
(30, 'XL', 'Xanh nhạt'),
(30, 'M', 'Xanh đậm'),
(30, 'S', 'Xanh đậm'),
(30, 'L', 'Xanh đậm'),
(30, 'XL', 'Xanh đậm'),
(30, 'M', 'Be'),
(30, 'S', 'Be'),
(30, 'L', 'Be'),
(30, 'XL', 'Be'),
(30, 'M', 'Đen'),
(30, 'S', 'Đen'),
(30, 'L', 'Đen'),
(30, 'XL', 'Đen'),
(31, 'M', 'Be'),
(31, 'M', 'Đen'),
(31, 'M', 'Trắng'),
(31, 'M', 'Xám'),
(31, 'L', 'Be'),
(31, 'L', 'Đen'),
(31, 'L', 'Trắng'),
(31, 'L', 'Xám'),
(32, 'M', 'Xanh dương'),
(32, 'M', 'Xanh lá'),
(32, 'M', 'Xanh than'),
(32, 'M', 'Đen'),
(32, 'L', 'Xanh dương'),
(32, 'L', 'Xanh lá'),
(32, 'L', 'Xanh than'),
(32, 'L', 'Đen'),
(33, 'M', 'Hồng'),
(33, 'M', 'Vàng'),
(33, 'M', 'Trắng'),
(33, 'M', 'Hồng'),
(33, 'L', 'Hồng'),
(33, 'L', 'Vàng'),
(33, 'L', 'Trắng'),
(33, 'L', 'Hồng'),
(34, 'M', 'Xanh'),
(34, 'M', 'Xanh'),
(34, 'M', 'Trắng'),
(34, 'M', 'Đen'),
(34, 'L', 'Xanh'),
(34, 'L', 'Xanh'),
(34, 'L', 'Trắng'),
(34, 'L', 'Đen'),
(35, 'M', 'Xanh'),
(35, 'L', 'Xanh'),
(36, 'M', 'Xanh'),
(36, 'M', 'Hồng'),
(36, 'M', 'Xanh dương'),
(36, 'M', 'Xanh nhạt'),
(36, 'L', 'Xanh'),
(36, 'L', 'Hồng'),
(36, 'L', 'Xanh dương'),
(36, 'L', 'Xanh nhạt'),
(37, 'M', 'Xanh'),
(37, 'M', 'Trắng'),
(37, 'M', 'Đen'),
(37, 'L', 'Xanh'),
(37, 'L', 'Trắng'),
(37, 'L', 'Đen'),
(38, 'M', 'Xanh'),
(38, 'M', 'Trắng'),
(38, 'M', 'Đen'),
(38, 'L', 'Xanh'),
(38, 'L', 'Trắng'),
(38, 'L', 'Đen'),
(39, 'M', 'Trắng'),
(39, 'M', 'Trắng'),
(39, 'L', 'Vàng'),
(39, 'L', 'Vàng'),
(40, 'M', 'Xanh'),
(40, 'M', 'Nâu'),
(40, 'M', 'Đen'),
(40, 'L', 'Xanh'),
(40, 'L', 'Nâu'),
(40, 'L', 'Đen'),
(41, 'M', 'Đen'),
(41, 'L', 'Đen'),
(42, 'M', 'Đen'),
(42, 'L', 'Đen'),
(43, 'M', 'Trắng'),
(43, 'M', 'Đen'),
(43, 'L', 'Trắng'),
(43, 'L', 'Đen'),
(44, 'M', 'Trắng'),
(44, 'M', 'Đen'),
(44, 'L', 'Trắng'),
(44, 'L', 'Đen'),
(45, 'M', 'Vàng'),
(45, 'L', 'Vàng'),
(46, '36', 'Đen'),
(46, '37', 'Đen'),
(46, '38', 'Đen'),
(46, '39', 'Đen'),
(46, '40', 'Đen'),
(47, 'S', 'Đen'),
(47, 'M', 'Đen'),
(47, 'L', 'Đen'),
(47, 'S', 'Xanh Đen'),
(47, 'M', 'Xanh Đen'),
(48, 'S', 'Trắng'),
(48, 'M', 'Trắng'),
(48, 'S', 'Xanh Đen'),
(48, 'M', 'Xanh Đen'),
(48, 'S', 'Đen'),
(49, 'S', 'Xanh Pastel'),
(49, 'M', 'Xanh Pastel'),
(49, 'S', 'Tím Mộng Mer'),
(49, 'S', 'Nâu Xám'),
(49, 'M', 'Xanh Lá Cây'),
(50, 'S', 'Đen'),
(50, 'M', 'Đen'),
(50, 'L', 'Đen'),
(50, 'S', 'Xám'),
(50, 'M', 'Xám'),
(51, 'S', 'Trắng'),
(51, 'M', 'Trắng'),
(51, 'L', 'Trắng'),
(51, 'XL', 'Trắng'),
(51, 'XXL', 'Trắng'),
(52, 'S', 'Đen'),
(52, 'M', 'Xanh Pastel'),
(52, 'S', 'Xanh Đen'),
(52, 'M', 'Xanh Đen'),
(52, 'S', 'Be'),
(53, 'S', 'Đen'),
(53, 'M', 'Đen'),
(53, 'L', 'Đen'),
(53, 'XL', 'Đen'),
(53, 'XXL', 'Đen'),
(54, 'S', 'Xanh Đen'),
(54, 'M', 'Xanh Đen'),
(54, 'L', 'Xanh Đen'),
(54, 'XL', 'Xanh Đen'),
(54, 'XXL', 'Xanh Đen'),
(55, 'S', 'Vàng'),
(55, 'M', 'Vàng'),
(55, 'L', 'Vàng'),
(55, 'S', 'Trắng'),
(55, 'M', 'Trắng'),
(56, 'S', 'Xanh'),
(56, 'M', 'Hồng'),
(56, 'L', 'Đen'),
(56, 'S', 'Trắng Xanh'),
(56, 'M', 'Trắng'),
(57, '37', 'Đen'),
(57, '38', 'Đen'),
(57, '39', 'Đen'),
(57, '40', 'Đen'),
(57, '41', 'Đen'),
(58, 'S', 'Be'),
(58, 'M', 'Đen'),
(58, 'L', 'Xanh Đen'),
(58, 'S', 'Đen'),
(58, 'M', 'Trắng'),
(59, 'S', 'Đen'),
(59, 'M', 'Đen'),
(59, 'L', 'Đen'),
(59, 'XL', 'Đen'),
(59, 'XXL', 'Đen'),
(60, 'S', 'Đen'),
(60, 'M', 'Hồng'),
(60, 'L', 'Xanh'),
(60, 'XL', 'Vàng'),
(60, 'XXL', 'Tím');

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
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`cart_detailID`);

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
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collectionID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
