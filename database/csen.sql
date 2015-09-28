-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2015 at 11:36 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csen`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`cid`, `pid`) VALUES
(11, 17),
(11, 18);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `avatar` text NOT NULL,
  `Age` int(10) NOT NULL,
  `Bio` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `avatar`, `Age`, `Bio`) VALUES
(1, 'x', 'x', 'x', '611Vh8zOYUL._UL1000_.jpg', 0, ''),
(2, 'x', 'x', 'x', '12021868_10207907441793273_830172023_n.jpg', 0, ''),
(3, 'ee', 'ee', 'ee', '1.jpg', 0, ''),
(4, 'k', 'k', 'k', 'anima_bubbe.jpg', 0, ''),
(5, 'aaa', 'aaa', 'aaa', '12053407_725254757579197_944436363_n.jpg', 0, ''),
(6, 'kkk', 'kkk', 'kkk', '12048607_10153552558766138_1744215774_n.jpg', 0, ''),
(7, 'q', 'q', 'q', '11994370_10207757934415682_289782240_n.jpg', 0, ''),
(8, 'ssssss', 'ssssss', 'ssssss', 'bg-prl3.jpg', 0, 'najdshubgvfdehzjiudhygfdshajxdhgyedshujdhfgy'),
(9, 'ooo', 'ooo', 'ooo', 'ddddddddddddd (2).jpg', 20, 'ahudybegvysajiodsedsajiodg'),
(10, 'aaaaa', 'aaaaa', 'aaaaa', 'bag5.jpg', 19, 'aaaaa'),
(11, 'Rania ElSabbagh', 'raniimenem@gmail.com', 'Ranii', 'rania.jpg', 20, 'Hello! I like lollipops.'),
(12, 'Amira ElEwady', 'amiraewady@gmail.com', 'ammae', 'amira.jpg', 21, 'Bonjour zuzeko? :P'),
(13, 'Zozo', 'zozosaad@gmail.com', '12345', '1653970_1391074301158696_1425915272_n (2).jpg', 13, 'I love Rony.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`customerID` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf16 NOT NULL,
  `password` varchar(50) CHARACTER SET utf16 NOT NULL,
  `email` varchar(100) CHARACTER SET utf16 NOT NULL,
  `customerImage` blob NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `name`, `password`, `email`, `customerImage`) VALUES
(1, 'Amira', 'amira', 'amiraelewady@gmail.com', 0x4465736572742e6a7067),
(2, 'Dina Mohamed', 'dina', 'dinamohamed@gmail.com', 0x4368727973616e7468656d756d2e6a7067),
(3, 'Rania A.monem', 'rania', 'raniamonem@gmail.com', 0x48796472616e676561732e6a7067),
(4, 'Heba Ahmed', 'heba', 'hebaahmed@gmail.com', 0x54756c6970732e6a7067),
(5, 'Mohamed Ahmed', 'mohamed', 'mohamedahmed@gmail.com', 0x4c69676874686f7573652e6a7067),
(6, '', 'sd', 'sdsdi', ''),
(7, '', 'sa', 'sa', ''),
(8, 'Malak', 'malak', 'malak@gmail.com', 0x4a656c6c79666973682e6a7067),
(9, 'Yusif Mohamed', 'yusif', 'yusifmohamed@gmail.com', ''),
(10, 'Amira Mohamed', 'mohamed', 'amiramohamed@gmail.com', ''),
(11, 'Amira Ahmed', 'amira', 'amiraahmed@gmail.com', ''),
(12, 'Mai Mohamed', 'mai', 'maimohamed@hotmail.com', ''),
(13, 'Ashraf Amr', 'ashraf', 'ashrafamr@yahoo.com', ''),
(14, 'Ranii', '123', 'raniimenem@gmail.com', ''),
(15, 'zozo', '147', 'zozosaad@hotmail.com', ''),
(16, 'x', 'x', 'x', ''),
(17, 'ok', 'ok', 'ok', 0x322e6a7067),
(18, 'l', 'l', 'l', 0x626c6f757365732d6d616e6f6e2d62617074697374652d626c6f7573652d776974682d626f772d61707269636f742d6461726b2d626c75655f4131333038305f46343730372e6a7067),
(19, 'k', 'k', 'k', 0x31323032313836385f31303230373930373434313739333237335f3833303137323032335f6e2e6a7067),
(20, 's', 's', 's', 0x323031352d5269707065642d4a65616e732d466f722d576f6d656e2d312e6a7067),
(21, 'f', '123', 'ff', 0x322e6a7067),
(22, 'C', 'C', 'C', 0x31323035333430375f3732353235343735373537393139375f3934343433363336335f6e2e6a7067),
(23, 'E', 'E', 'E', 0x696d61676531786c2e6a7067),
(24, 'ad', 'ad', 'ad', 0x31313939343337305f31303230373735373933343431353638325f3238393738323234305f6e2e6a7067),
(25, 'z', 'z', 'z', 0x72656769737465722e6a7067),
(26, 'hi', 'hi', 'hi', 0x3631315668387a4f59554c2e5f554c313030305f2e6a7067),
(27, 'hello', 'hello', 'hello', 0x323031352d5269707065642d4a65616e732d466f722d576f6d656e2d312e6a7067),
(28, 'q', 'q', 'q', 0x62622e6a7067),
(29, 'st', 'st', 'st', 0x31323334353635343335362d3132333534333234352e6a7067),
(30, 'p', 'p', 'p', 0x31323334353635343335362d3132333534333234352e6a7067),
(31, 'xo', 'xo', 'xo', 0x6372656174652d7573657220617661746f722d69636f6e20283132292e6a7067),
(32, 'xxx', 'xxx', 'xxx', 0x31323035333430375f3732353235343735373537393139375f3934343433363336335f6e2e6a7067),
(33, 'xxxa', 'xxxa', 'xxxa', 0x31323035333430375f3732353235343735373537393139375f3934343433363336335f6e2e6a7067),
(34, 'eee', 'eee', 'eee', 0x616e696d615f62756262652e6a7067),
(35, 'fr', 'fr', 'fr', 0x363179776b6a65686e4d4c2e5f53583334325f2e6a7067),
(36, 'qqq', 'qqq', 'qqq', 0x4172726179),
(37, 'admin', '12345', 'admin', 0x732e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(10) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `Summary` text NOT NULL,
  `Price` double NOT NULL,
  `ProductImage` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf16 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `NAME`, `Quantity`, `type`, `Summary`, `Price`, `ProductImage`) VALUES
(17, 'Skater Belted Stretch', 0, 'Polyester', 'Approx 17" (43 cm)Available Colours: Brown, Royal Blue, Red', 200, '611Vh8zOYUL._UL1000_.jpg'),
(18, 'The Classic Tote ', 10, 'Handbag', 'Timeless and distinctive. Timeless, because we have been making them forever. Distinctive because this bag has been a classic for over 60 years. Our classic tote is an iconic shape and color scheme that is recognized around the world. Plus, we have a size for every purpose.', 100, 'naptholred_ice_bag.jpg'),
(19, 'Chelsa Ankle Boots', 6, 'boots', 'Smooth, leather-look upper \r\nBack tab \r\nElasticated inserts \r\nRound toe \r\nHigh chunky Heel\r\nGrip tread \r\nWipe with a soft cloth \r\nHeel height: 8cm/3"', 500, 'image1xl.jpg'),
(20, 'Prime Knit Stan Smith', 8, 'Trainers', 'Breathable and flexible mesh upper\r\nLace-up fastening\r\nBranded tongue \r\nPadded cuffs\r\nSignature toe cap design\r\nMoulded tread \r\nAvoid contact with liquids \r\n100% Textile upper', 800, 'image1xxl.jpg'),
(21, 'Travel Rucksack Shoulder Bag', 20, 'Backpack', 'Material: Synthetic\r\nClosure: Drawstring / Magnetic Snap\r\nBackpack Handbags, Shoulder Bags\r\nHeight: 38cm Width: 30cm Depth: 16cm\r\nAdjustable Shoulder Strap\r\nSize: Large', 350, '61ywkjehnML._SX342_.jpg'),
(23, 'Ripped Boyfriend Jeans', 6, 'jeans', 'Current/Elliott Super Loved destroyed look amazing if they are cuffed. The following design is crafted in faded ripped up denim. They look edgy and well worn.', 200, '2015-Ripped-Jeans-For-Women-1.jpg'),
(25, 'Blouse with Bow', 25, 'Polyester', 'Blouse in woven fabric. Wide, detachable grosgrain bow at neck and concealed buttons at front.DETAILS100% polyester. Machine wash warmImported', 450, 'blouses-manon-baptiste-blouse-with-bow-apricot-dark-blue_A13080_F4707.jpg'),
(26, 'Fitted Dress', 4, 'Polyester', 'Fitted, sleeveless, knee-length dress in slightly stretchy woven fabric. Concealed back zip. Lined.66% polyester, 32% rayon, 2% spandex. Machine wash warmImported', 390, 'hmprod (1).jpg'),
(27, 'Draped Jacket', 19, 'Polyester', 'Jacket in woven fabric with a shawl collar and draped front edge. Front pockets, removable tie belt at waist, and no buttons. Unlined.100% polyester. Machine wash warmImported', 580, 'hmprod (2).jpg'),
(28, 'Patterned Blouse', 10, 'Polyester', 'Long-sleeved blouse in airy woven fabric with a printed pattern, collar, and pearlescent buttons at front.\r\nDETAILS\r\n100% polyester. Machine wash warm\r\nImported', 299, 'hmprod (3).jpg'),
(29, 'Fine-Knit Sweater', 8, 'Rayon, Acrylic', 'Fine-knit, loose-fit sweater with dropped shoulders and long sleeves. Wide-cut neckline and rounded hem. Slightly longer at back.\r\nDETAILS\r\n50% rayon, 50% acrylic. Machine wash warm\r\nImported', 200, 'hmprod (4).jpg'),
(30, 'Shoulder Bag', 15, 'Handbag', 'Shoulder bag in imitation leather. Flap with magnetic closure, narrow shoulder strap with chain fastener, and inner pocket with zip. Lined. Size 2 x 6 1/4 x 10 1/2 in.\r\n100% polyurethane.\r\nImported', 299, 'hmprod (5).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
 ADD PRIMARY KEY (`cid`,`pid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`cid`,`pid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
