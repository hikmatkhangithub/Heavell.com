-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 05:31 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(64) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(132) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com'),
(4, 'sagar', 'b0f50707fe13753210c7afd387bb5c12', 'nephopsagar@gmail.com'),
(6, 'hello', '300bedd5a8a0b2f1c4bf26d3cd69cc9b', 'nephopsagar@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
`id` int(64) NOT NULL,
  `brandName` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brandName`) VALUES
(7, 'Armani'),
(9, 'WoodLand'),
(10, 'Nike'),
(11, 'Levis'),
(12, 'Patela'),
(13, 'Gucci'),
(14, 'Miss'),
(15, 'Not Required');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` int(64) NOT NULL,
  `categoryName` varchar(128) NOT NULL,
  `gender` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `gender`) VALUES
(17, 'Pant', 'male'),
(18, 'Footwear', 'male'),
(19, 'Shirt', 'male'),
(20, 'One Piece', 'female'),
(21, 'T-Shirt', 'female'),
(22, 'Footwears', 'female'),
(23, 'Jacket', 'male'),
(24, 'Shoes', ''),
(25, 'Meat Items', ''),
(26, 'grocery', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(64) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `lastName` varchar(128) NOT NULL,
  `phone` int(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `quantity` int(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstName`, `lastName`, `phone`, `address`, `username`, `password`, `quantity`) VALUES
(1, 'sagar', 'kafle', 999, 'ashajk', 'sagar', '21232f297a57a5a743894a0e4a801fc3', 0),
(4, 'sagar', 'kafle', 9841, 'kalanki', 'kafle', 'b0f50707fe13753210c7afd387bb5c12', 0),
(5, 'anup', 'pandey', 98497777, 'pepsicola', 'anup', '0653a342bcbe488c7a0e74423425678b', 0),
(6, 'join', 'join', 9841, 'asdfghjk', 'join', '731b886d80d2ea138da54d30f43b2005', 0),
(7, 'raghav', 'kafle', 9999, 'ajvhaj', 'raghav', '300bedd5a8a0b2f1c4bf26d3cd69cc9b', 0),
(8, 'aryan', 'silwal', 98, 'ajksba', 'aryan', 'e2071528cf1aa685779d9898ccd9b308', 0),
(9, 'wILLIAM', 'LAMICHHANE', 2147483647, 'kALANKI', 'WILLIAM.LAMICHHANE', '870b2bc38af72590da87e9f4f4373136', 0),
(10, 'MANOJ', 'DAHL', 2147483647, 'HKHK', 'MANOJ.DAHAL', '89291172fd34aa5c69b94094c1fa818a', 0),
(11, 'Utsav', 'bista', 975647, 'drfghjkl', 'utsav', '293f4c20a14b49ce509a4e53f600fb8d', 0),
(12, 'ajil', 'joshi', 98, 'ijk', 'ajil', '1ed09e82663a771ec7c98e896e37a501', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(64) NOT NULL,
  `customerId` int(64) NOT NULL,
  `productId` int(64) NOT NULL,
  `payDate` date NOT NULL,
  `status` varchar(128) NOT NULL,
  `price` int(32) NOT NULL,
  `quantity` int(32) NOT NULL,
  `size` int(32) NOT NULL,
  `totalPrice` int(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerId`, `productId`, `payDate`, `status`, `price`, `quantity`, `size`, `totalPrice`) VALUES
(1, 4, 53, '0000-00-00', 'Delivered', 99, 1, 0, 99),
(2, 4, 43, '0000-00-00', 'Dispatched from godown', 333, 1, 0, 333),
(3, 6, 39, '0000-00-00', '', 99, 1, 0, 99),
(4, 7, 42, '0000-00-00', '', 177, 1, 0, 177),
(5, 7, 42, '0000-00-00', '', 177, 1, 0, 177),
(6, 8, 39, '0000-00-00', '', 99, 3, 0, 297),
(7, 9, 50, '0000-00-00', '', 211, 1, 32, 211),
(8, 9, 50, '0000-00-00', '', 211, 1, 32, 211),
(9, 10, 55, '0000-00-00', '', 999, 1, 43, 999),
(10, 4, 42, '0000-00-00', '', 177, 1, 0, 177),
(11, 4, 46, '0000-00-00', '', 555, 1, 0, 555),
(12, 4, 39, '0000-00-00', '', 99, 1, 0, 99),
(13, 4, 39, '0000-00-00', '', 99, 1, 0, 99),
(14, 11, 31, '0000-00-00', '', 210, 1, 33, 210),
(15, 4, 55, '0000-00-00', '', 999, 1, 43, 999),
(16, 12, 55, '0000-00-00', 'Dispatched', 999, 1, 45, 999),
(17, 4, 32, '0000-00-00', '', 399, 1, 34, 399);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(64) NOT NULL,
  `productName` varchar(64) NOT NULL,
  `productDescription` longtext NOT NULL,
  `image` varchar(128) NOT NULL,
  `price` int(64) NOT NULL,
  `instock` varchar(64) NOT NULL,
  `brandid` int(64) NOT NULL,
  `categoryid` int(64) NOT NULL,
  `featured` varchar(128) NOT NULL,
  `sizeAvailable` varchar(64) NOT NULL,
  `tradersId` int(128) NOT NULL,
  `shopId` int(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productName`, `productDescription`, `image`, `price`, `instock`, `brandid`, `categoryid`, `featured`, `sizeAvailable`, `tradersId`, `shopId`) VALUES
(25, 'Casual Pant', 'Very Nice Pant!!. Imported Directly from Hong Kong.', '$T2eC16FHJHYE9nzpcCu-BRY0lq5P8w--_35.JPG', 145, 'Y', 7, 17, 'Y', '28-34', 1, 2),
(26, 'Grey Pant', 'Very Very Nice Garment Specially Designed For You .', '2cce12146499e0be39f48144eab0728d.jpg', 140, 'Y', 8, 17, 'N', '25-38', 0, 0),
(27, 'Sleek Pant', 'Very Very Silky Designed Pant Only for You.', 'carhartt-twill-double-knee-work-pants-for-men-in-black-p-3707d_04-1500.5.jpg', 150, 'Y', 7, 17, 'N', '29-31', 0, 0),
(28, 'Grey Pant', 'Sexy Grey Designed only for you!!', '2cce12146499e0be39f48144eab0728d.jpg', 189, 'Y', 11, 17, 'Y', '28-36', 0, 0),
(29, 'Leather Pant', 'Made from very very fine leather.', 'leather-pants-are-look-best.jpg', 200, 'Y', 11, 17, 'N', '28-35', 0, 0),
(30, 'Lazy Shoe', 'Very very fine and elegant look.', '2014-Free-Shipping-casual-shoes-men-Big-Size-Shoe-footwear-sneakers-men-shoes-oxfords-men-s.jpg', 210, 'Y', 9, 18, 'N', '34-44', 0, 0),
(31, 'Crazy Shoe', 'It haves very very casual look and suits for every gentle man.', 'Best-selling-Men-s-winter-shoes-bussiness-shoes-leather-shoes-leisure-shoes-Black-Free-shipping.jpg', 210, 'Y', 10, 18, 'Y', '33-45', 0, 0),
(32, 'Premium Boot', 'Premium boot designed only for master classers!!', 'boot2.jpg', 399, 'Y', 9, 18, 'N', '34-41', 2, 1),
(33, 'Slipper ', 'Very very nice slipper designed for the naughty boys.', 'boot4.jpg', 45, 'Y', 9, 18, 'N', '31-44', 0, 0),
(34, 'Dam Boot', 'Dam boot designed for the swag hunters..', 'boot1.jpg', 322, 'Y', 9, 18, 'Y', '30-45', 0, 0),
(35, 'Lined Shirt', ' Made from very fine fabrics. It fits to everyone out there for a shirt.', '2015-Mens-Shirt-Designs-Men-Autumn-Korean-Fashion-Slim-Tops-Male-Formal-Casual-Long-Sleeve-Dress-Shirts-3.jpg', 145, 'Y', 12, 19, 'Y', 'Small medium Large', 0, 0),
(39, 'Collored Shirt', 'Red is out ther in market to impress girl.', 'wpid-Formal-Shirt-Designs-For-Men-Slim-Fit-2015-2016-1.jpg', 99, 'Y', 12, 19, 'Y', 'Medium And Large only', 0, 0),
(40, 'Hlav Shirt', 'Hlav shirrt is out there in the market to impress the girls.', '459941005_948.jpg', 88, 'Y', 12, 19, 'N', 'Small only', 0, 0),
(42, 'White Shirt', 'Sexy White', 'mens-designer-formal-shirts-250x250.jpg', 177, 'Y', 12, 19, 'N', 'Large Only', 0, 0),
(43, 'Red One Piece', 'Beautiful One Pice', '2014Newest-OL-Sexy-Ladies-Pencil-Dress-Women-Slim-one-piece-dress-V-neck-Knee-Length-Red.jpg_640x640.jpg', 333, 'Y', 14, 20, 'Y', 'Small-Medium-Large', 0, 0),
(44, 'Blaackie', 'Blackie is out there to impress the boys', '1 (1).jpg', 290, 'Y', 14, 20, 'N', 'Small-Medium', 0, 0),
(45, 'Two Colored', 'Two colored One piece only for limited edition girls', '2013-summer-women-s-chiffon-one-piece-dress.jpg', 333, 'Y', 12, 20, 'N', 'Small-Large', 0, 0),
(46, 'Check', 'Check One piece only for you!!', '2012-fashion-V-neck-fashion-one-piece-dress-ladies-dress-3-color-stripe-one-piece-dress.jpg', 555, 'Y', 14, 20, 'N', 'Small-Medium-Large', 0, 0),
(47, 'Rainbow', 'High heels to make you look Sexy!!', 'Ana-Locking-womens-footwear-f-w-2010.jpg', 177, 'Y', 10, 22, 'Y', '36-43', 0, 0),
(48, 'Cloz Shoe', 'Only for limited Edition Girls .', 'Best-Styles-Womens-Shoes.jpg', 122, 'Y', 14, 22, 'N', '33-40', 0, 0),
(49, 'Caz Sandal', 'Caz is there for your daily use.', '300x300_ddf2c452c2de834d063774134bea2f4f.jpg', 78, 'Y', 9, 22, 'N', '36-43', 0, 0),
(50, 'Daam Heel', 'Daam Heel. Heel Lovers Only for You..', 'womendress2.jpg', 211, 'Y', 12, 22, 'N', '31-40', 0, 0),
(51, 'Leaf T-Shirt', 'Made up of Fine Cotton makes you warm in winter and cool in summer.', 'New-2015-fashion-t-shirt-for-women-laser-backless-angel-wings-women-s-White-Black-shorts.jpg', 122, 'Y', 12, 21, 'N', 'Small-Large ', 0, 0),
(52, 'Black T-Shirt', 'Fine Black T-shirt made up of silk.', 'upload2272372715466523837.jpg', 220, 'Y', 14, 21, 'N', 'Small-Medium-Large', 0, 0),
(53, 'White T-Shirt', 'White T-Shirt is already here for you. Hurry up grab it.', 'upload777084270390800191.jpg', 99, 'Y', 14, 21, 'N', 'Large only', 0, 0),
(54, 'Cool T-Shirt', 'Pretty cool and beautiful t-shirt is there in the market for girls to attract the handsome boys', 'original_let-me-go-back-to-bed-women-s-loose-fit-t-shirt.jpg', 145, 'Y', 14, 21, 'Y', 'Small only', 0, 0),
(55, 'Jacket', 'nice!!', '4.png', 999, 'Y', 10, 23, 'Y', '43-47', 0, 0),
(56, 'Jeans', ' this is my jeans. ', '._apartment.jpg', 2000, 'Y', 13, 22, 'N', 'Small', 0, 0),
(57, 'Dry Meat1', '1 Best!!', '5.png', 1, 'N', 9, 22, 'N', '12', 1, 1),
(59, 'aksjasjk', 'sdjkdjsk', 'apartment.jpg', 22, 'Y', 11, 24, 'N', '12', 1, 1),
(60, 'Spinach', 'sajksajk', '35Nepal~120Bhaktapur~230Bhaktapur_66^1920x.jpg', 11, 'Y', 8, 26, 'N', '21', 2, 4),
(61, 'Cabbage', 'Masjkasjk', 'about.jpg', 7, 'Y', 15, 26, 'N', 'Small', 1, 1),
(62, 'Brocoli', 'Very good Brocoli', 'aboutus.jpg', 99, 'Y', 15, 26, 'N', 'small', 3, 6),
(63, 'Dam Boot', 'assasa', 'boot1.jpg', 222, 'Y', 15, 22, 'N', '33-44', 4, 8),
(64, 'Dam Boot', 'assa', '2014-Free-Shipping-casual-shoes-men-Big-Size-Shoe-footwear-sneakers-men-shoes-oxfords-men-s.jpg', 22, 'Y', 15, 22, 'N', '33-43', 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
`id` int(128) NOT NULL,
  `traderId` int(128) NOT NULL,
  `shopName` varchar(128) NOT NULL,
  `location` varchar(128) NOT NULL,
  `permission` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `traderId`, `shopName`, `location`, `permission`) VALUES
(1, 1, 'assa', 'asas', 'Yes'),
(2, 1, 'kafle Shoe Center', 'Kalanki', 'No'),
(6, 3, 'Kafle Grocery Center', 'Kathmandu', 'Yes'),
(7, 3, 'Kafle Meat Center', 'Kupandole', 'No'),
(8, 4, 'Prashid Shoe Collection', 'Banepa', 'Yes'),
(9, 5, 'Subodh Shoe collection', 'kalanki', 'Yes'),
(10, 6, 'Abhisek Shoe center', 'samakhusi', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `traders`
--

CREATE TABLE IF NOT EXISTS `traders` (
`id` int(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` int(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traders`
--

INSERT INTO `traders` (`id`, `name`, `address`, `phone`, `email`, `username`, `password`) VALUES
(1, 'Alfonso Meat Shop', '22-JumpStreet', 9841, 'alfonso@gmail.com', 'alfonso', '3f128e570b3a9009d7b52a0523af43dd'),
(3, 'Kafle Traders', 'Syangja', 9841, 'kafle@gmail.com', 'kafle', 'b0f50707fe13753210c7afd387bb5c12'),
(4, 'Prashid Store', 'Banepa', 2147483647, 'prashid@live.com', 'prashid', '79007285e04cf6b4ccb767b77010455b'),
(6, 'Abhisek', 'ajasjl', 8989, 'hunt@gmail.com', 'kafle123', '2f32553d595db8690be4d20c36987899');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `traders`
--
ALTER TABLE `traders`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(64) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
MODIFY `id` int(64) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(64) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(64) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(64) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(64) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
MODIFY `id` int(128) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `traders`
--
ALTER TABLE `traders`
MODIFY `id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
