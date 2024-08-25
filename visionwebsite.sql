-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 12:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visionwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Ryzen'),
(2, 'Asus'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(500) NOT NULL,
  `brand` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `brand`) VALUES
(1, 'RAM', 1),
(2, 'Motherboard', 1),
(3, 'GPU', 1),
(4, 'Processor', 1),
(5, 'PC Cases', NULL),
(6, 'Others', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `p_price` int(100) NOT NULL,
  `p_name` varchar(1000) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_des` varchar(2000) NOT NULL,
  `o_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custompc_checkout`
--

CREATE TABLE `tbl_custompc_checkout` (
  `product_image` varchar(1000) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_custompc_checkout`
--

INSERT INTO `tbl_custompc_checkout` (`product_image`, `product_name`, `product_cat`, `product_price`, `order_id`) VALUES
('pc2.jpg2023-08-20-19-04', 'Black PC Case ', 5, 12000, 1),
('m2.jpg2023-08-18-23-29', 'Biostar B450M Motherboard', 2, 16999, 1),
('g4.jpg2023-08-18-23-12', 'ROG Strix Gaming', 3, 15000, 1),
('p3.jpg2023-08-18-23-18', 'Asus Processor', 4, 40000, 1),
('r2.jpg2023-08-18-23-38', 'G.SKILL Trident Z RGB Memory', 1, 4999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custompc_orders`
--

CREATE TABLE `tbl_custompc_orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_address` varchar(2000) NOT NULL,
  `order_message` varchar(1000) NOT NULL,
  `order_phone_no` int(12) NOT NULL,
  `total_purchase` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_custompc_orders`
--

INSERT INTO `tbl_custompc_orders` (`order_id`, `order_date`, `user_id`, `order_address`, `order_message`, `order_phone_no`, `total_purchase`) VALUES
(1, '2023-08-20', 1, 'karachi', 'i need it urgent', 2147483647, 88998);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `o_id` int(11) NOT NULL,
  `o_date` date NOT NULL,
  `u_id` int(11) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `total_purchase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `p_brand` int(11) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_img` varchar(5000) NOT NULL,
  `p_description` mediumtext NOT NULL,
  `p_cat` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`p_id`, `p_name`, `p_brand`, `p_price`, `p_img`, `p_description`, `p_cat`, `p_qty`) VALUES
(15, 'MSI B550M PRO-VDH WIFI.', 1, 14999, 'm1.jpg2023-08-18-23-55', 'Before purchasing, make sure to check the specific specifications and features of the MSI B550M PRO-VDH WIFI, as motherboard models can vary slightly. This motherboard is well-suited for users who want a compact solution with WiFi capabilities and modern features for their AMD Ryzen system.', 2, 60),
(16, 'Biostar B450M Motherboard', 1, 16999, 'm2.jpg2023-08-18-23-29', 'The Biostar B450M Motherboard is ideal for users who want a cost-effective solution that covers the basics while providing room for upgrades in the future. It can be a suitable option for building a reliable system for everyday tasks, light gaming, and general computing needs.', 2, 50),
(17, 'ASUS Z97-P Motherboard', 2, 11999, 'm3.jpg2023-08-18-23-38', 'The ASUS Z97-P motherboard is a solid choice for users seeking a balance between performance and affordability. Built on the Intel Z97 chipset, this ATX motherboard offers a range of features that cater to both casual computing and light gaming needs', 2, 50),
(18, 'ASUS B560M-Plus Motherboard', 2, 13999, 'm4.jpg2023-08-18-23-09', 'The ASUS B560M-Plus motherboard offers a powerful and feature-rich solution for users seeking performance, versatility, and a smaller form factor. Designed for 10th and 11th generation Intel Core processors, this micro ATX motherboard combines efficiency with modern features.', 2, 50),
(19, 'G.SKILL Trident Z Memory', 1, 5600, 'r1.jpg2023-08-18-23-22', 'G.SKILL Trident Z memory is the perfect solution for enthusiasts who demand both exceptional performance and aesthetic appeal in their PC builds.', 1, 78),
(20, 'G.SKILL Trident Z RGB Memory', 1, 4999, 'r2.jpg2023-08-18-23-38', 'G.SKILL Trident Z RGB memory sets a new standard for performance, aesthetics, and customizable lighting effects. Designed for enthusiasts and gamers who crave both high-speed computing and stunning visual impact, Trident Z RGB takes your system to the next level', 1, 90),
(21, 'ROG Strix RAM', 2, 6999, 'r3.png2023-08-18-23-33', 'ROG Strix RAM is a premium line of memory modules designed by ASUS under their Republic of Gamers (ROG) brand. Engineered for gamers, enthusiasts, and system builders seeking the perfect blend of performance and aesthetics, ROG Strix RAM sets a new standard for memory excellence.', 1, 50),
(22, 'ROG Certified RAM', 2, 7800, 'r4.jpg2023-08-18-23-40', 'ROG Certified RAM is a hallmark of exceptional memory modules developed by ASUS under their Republic of Gamers (ROG) brand. Created for gamers, enthusiasts, and high-performance seekers, ROG Certified RAM delivers unparalleled performance, reliability, and compatibility for an unmatched gaming experience.', 1, 89),
(24, 'RX 7900 RADEON', 1, 7800, 'g2.jpg2023-08-18-23-27', ' the \"RX 7900 Radeon\" is indeed a new graphics card model that has been released after September 2021', 3, 90),
(25, 'ASUS 4070Ti', 2, 12000, 'g2.jpg2023-08-18-23-21', '\"ASUS 4070Ti\" is indeed a new graphics card model that has been released after September 2021', 3, 78),
(26, 'ROG Strix Gaming', 2, 15000, 'g4.jpg2023-08-18-23-12', '\"ROG Strix Gaming\" is indeed a new graphics card model that has been released after September 2021', 3, 56),
(27, 'Ryzen Processor', 1, 60000, 'p1.jpg2023-08-18-23-14', 'Ryzen AMD is indeed a new processor that has been released after September 2021', 4, 89),
(28, 'Ryzen AMD Gaming Processor', 1, 50000, 'p2.jpg2023-08-18-23-32', 'Ryzen AMD is indeed a new gaming processor card model that has been released after September 2021', 4, 678),
(29, 'Asus Processor', 2, 40000, 'p3.jpg2023-08-18-23-18', '\"ASUS 4070Ti\" is indeed a new processor that has been released after September 2021', 4, 123),
(30, 'Asus Gaming Processor', 2, 5900, 'p4.jpg2023-08-18-23-15', '\"ASUS Gaming Processor\" is indeed a new graphics card model that has been released after September 2021', 4, 12),
(31, 'Computer Mouse', 3, 1200, 'o1.jpg2023-08-18-23-36', 'TheMouse is designed to redefine your computing experience, putting precision and comfort at your fingertips. With its ergonomic design, advanced tracking technology, and customizable features, this mouse empowers you to navigate, create, and game with confidence.', 6, 45),
(32, 'LogiTech Mouse', 3, 2000, 'o2.jpg2023-08-18-23-37', 'The LogiTech mouse is designed to redefine your computing experience, putting precision and comfort at your fingertips. With its ergonomic design, advanced tracking technology, and customizable features, this mouse empowers you to navigate, create, and game with confidence.', 6, 56),
(33, 'Gaming Keyboard', 3, 900, 'o3.jpg2023-08-18-23-07', 'Introducing the Gaming Keyboard, a keyboard that combines performance, comfort, and style to transform the way you interact with your digital world. With its responsive keys, customizable features, and sleek design, this keyboard is your gateway to enhanced productivity and seamless typing', 6, 12),
(34, 'Profeesional use Keyboard', 3, 1500, 'o4.jpg2023-08-18-23-57', 'The keyboard that combines performance, comfort, and style to transform the way you interact with your digital world. With its responsive keys, customizable features, and sleek design, this keyboard is your gateway to enhanced productivity and seamless typing', 6, 56),
(35, 'RX RADEON 600', 1, 5600, 'g1.jpg2023-08-18-23-17', 'AMD today announced the Radeon RX RX 6000 series of gaming graphics cards. Built on the new 7nm RDNA 2 architecture, these cards provide up to 2x improvement in performance', 3, 56),
(36, 'White PC Case ', 3, 11000, 'pc1.jpg2023-08-20-19-04', 'A gaming PC case combines striking aesthetics with efficient cooling, supporting high-performance components and customizable RGB lighting to create an immersive gaming experience.', 5, 56),
(37, 'Black PC Case ', 3, 12000, 'pc2.jpg2023-08-20-19-04', 'A gaming PC case combines striking aesthetics with efficient cooling, supporting high-performance components and customizable RGB lighting to create an immersive gaming experience.', 5, 45),
(38, 'Tempered Glass Case', 3, 10000, 'pc3.jpg2023-08-20-19-40', 'A gaming PC case combines striking aesthetics with efficient cooling, supporting high-performance components and customizable RGB lighting to create an immersive gaming experience.', 5, 45),
(39, 'Premium Black Case ', 3, 15000, 'pc4.jpg2023-08-20-19-32', 'A gaming PC case combines striking aesthetics with efficient cooling, supporting high-performance components and customizable RGB lighting to create an immersive gaming experience.', 5, 67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_pic` varchar(1000) NOT NULL DEFAULT 'icons/icon-header-03.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `uname`, `lastname`, `email`, `password`, `user_pic`) VALUES
(1, 'Huzaifa', 'Irfan', 'huzaifairfan2144@gmail.com', '123', 'card.jpg2023-08-18-23-31'),
(2, 'ali', 'khan', 'ahmad@gmail.com', '5231', 'icons/icon-header-03.png'),
(3, 'Sarim', 'Khan', 'sarimkhan@gmail.com', '1234', 'icons/icon-header-03.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usercontact`
--

CREATE TABLE `tbl_usercontact` (
  `id` int(11) NOT NULL,
  `u_name` varchar(500) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email` varchar(5000) NOT NULL,
  `message` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usercontact`
--

INSERT INTO `tbl_usercontact` (`id`, `u_name`, `phone_no`, `email`, `message`) VALUES
(1, 'huzaifa', 2147483647, 'huzaifa@gmail.com', 'message'),
(2, 'huzaifa', 2147483647, 'huzaifa@gmail.com', 'message');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `brand` (`brand`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `tbl_custompc_checkout`
--
ALTER TABLE `tbl_custompc_checkout`
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `tbl_custompc_orders`
--
ALTER TABLE `tbl_custompc_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_brand` (`p_brand`),
  ADD KEY `tbl_products_ibfk_1` (`p_cat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usercontact`
--
ALTER TABLE `tbl_usercontact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_custompc_orders`
--
ALTER TABLE `tbl_custompc_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_usercontact`
--
ALTER TABLE `tbl_usercontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD CONSTRAINT `tbl_category_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `tbl_brand` (`brand_id`);

--
-- Constraints for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD CONSTRAINT `tbl_checkout_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `tbl_order` (`o_id`);

--
-- Constraints for table `tbl_custompc_checkout`
--
ALTER TABLE `tbl_custompc_checkout`
  ADD CONSTRAINT `tbl_custompc_checkout_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_custompc_orders` (`order_id`);

--
-- Constraints for table `tbl_custompc_orders`
--
ALTER TABLE `tbl_custompc_orders`
  ADD CONSTRAINT `tbl_custompc_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`p_cat`) REFERENCES `tbl_category` (`cat_id`),
  ADD CONSTRAINT `tbl_products_ibfk_2` FOREIGN KEY (`p_brand`) REFERENCES `tbl_brand` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
