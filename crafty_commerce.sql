-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 08:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crafty commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Text` text NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`ID`, `Title`, `Text`, `Image`) VALUES
(1, 'What is Crafty Commerce?', 'Crafty Commerce is a user friendly e-commerce site where one can find and \r\nbuy exquisite products in a fair price that will satisfy one\'s potential needs.', 'images/aboutusGrid1.jpg'),
(2, 'Why Crafty Commerce?', 'Because of the potential best deals a user can possibly get, and also the simplification of how one can easily choose and buy his favourite product of decent quality. ', 'images/aboutusGrid2.png'),
(3, 'What makes us different?', 'Firstly, you must try our product deals and obviously buy quality products from our site. Then, you will get a decent hint why crafty commerce is marginally better and different than other E-commerce websites.\r\nHopefully, Crafty Commerce won\'t dissapoint as a customer.', 'images/aboutusGrid3.jpg'),
(4, 'Why Crafty Commerce?', 'Because of the potential best deals a user can possibly get, and also the simplification of how one can easily choose and buy his favourite product of decent quality. ', 'images/aboutusGrid2.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `Availability` varchar(255) NOT NULL,
  `Exclusive` varchar(255) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Name`, `Image`, `Price`, `Category`, `Brand`, `Availability`, `Exclusive`, `Description`) VALUES
(1, 'Apple iPhone 12 Pro Max ', 'images/iphone12promax.png', '110990', 'Mobile', 'Apple', 'Yes', 'Yes', 'Apple iPhone 12 Pro Max was officially released on October 13, 2020.\r\n\r\nThe phone is powered by the new Apple A14 Bionic processor. The smartphone comes with a 6.7 inches Super Retina XDR OLED capacitive touchscreen, 2778 x 1284 pixels resolution and HDR display, True Tone and Wide color (P3) gamut.\r\n'),
(2, 'Manchester United Home Authentic Player Jersey 2018-19', 'images/manu20182019.jpg', '890', 'Clothing', 'Adidas', 'Yes', 'No', 'Identical to the game shirt worn by Manchester United superstars at Old Trafford, this Manchester United home jersey delivers every possible on-field advantage. Celebrating the club’s 140th anniversary, it features a bold design that draws on its railway roots for inspiration. Made of smooth, lightweight fabric that dries quickly and keeps you super cool, this premium jersey is built to perform at the highest level.\r\n'),
(3, 'A4Tech Bloody Q135 Illuminate Red Backlit Gaming Keyboard', 'images/a4techq135.jpg', '1725', 'Computer Devices', 'A4Tech', 'No', 'No', 'Model: Bloody Q135 Illuminate\r\n1000 Hz Report Rate, Multimedia Hot-Keys\r\nAdjustable Backlights, Game Mode\r\nAnti-Slippery Keyboard Lift\r\nScrew Enhanced Space-Bar'),
(4, 'MSI GeForce RTX 2080 Ti Gaming X Trio 11GB Graphics Card', 'images/rtx2080ti.jpg', '138500', 'Computer Devices', 'MSI', 'Yes', 'Yes', 'Model: MSI GeForce RTX 2080 Ti Gaming X Trio\r\nMemory 11GB GDDR6\r\nCore Clocks Boost: 1620 MHz\r\nNVIDIA G-SYNC and HDR\r\nInterface PCI Express x16 3.0'),
(5, 'CANON EOS 700D 18.0MP WITH 18-55MM KIT LENS FULL HD DSLR CAMERA', 'images/cannon700d.jpg', '34000', 'Camera', 'Cannon', 'No', 'Yes', 'Model: Canon EOS 700D\r\nCMOS (APS-C) sensor\r\nDIGIC 5 processor\r\n18 megapixel\r\n5 fps continuous shooting'),
(6, 'Lenovo HD200 Bluetooth Headphones', 'images/lenovohd200.jpg', '1990', 'Headphones', 'Lenovo', 'Yes', 'No', 'Battery capacity: 300 mAh\r\nPlaytime: 20 hours\r\nBluetooth Version: 5.0\r\nStand-by Time: 300 hours\r\nSpeaker Diameter: 40 mm\r\nSpeaker sensitivity: 105 dB\r\nFrequency Response Range: 20-20 kHz\r\nDistance: 10 Meter barrier-free'),
(7, 'Xiaomi Haylou Solar LS05-1 Smart Watch Black', 'images/smartwatch.jpg', '2499', 'Smart Watch', 'Xiaomi', 'Yes', 'No', 'Model: Haylou Solar LS05-1\r\n1.28 Inch Round TFT Screen\r\nReal-time Heart Rate Monitor\r\nIP68 Waterproof, Metal Body\r\nMultiple Sports Modes'),
(8, 'CK14K CarrKen Zipper Short Wallet', 'images/wallet.jpg', '500', 'Wallet', 'Carrken', 'Yes', 'No', 'Brand Name: CarrKen\r\nMain Material: PU (Artificial leather)\r\nItem Length: 12cm\r\nItem Height: 10cm\r\nItem Width: 1.5CM\r\nMaterial Composition: PU LEATHER (Artificial leather)'),
(9, 'AVITA Essential 14 Celeron N4000 14\" Full HD Laptop Matt Black Color', 'images/laptop.jpg', '24900', 'Laptop', 'Avita', 'Yes', 'Yes', 'Model: AVITA Essential 14\r\nIntel Celeron Processor N4000 (4M Cache, 1.10 GHz up to 2.60 GHz)\r\n4GB LPDDR4 RAM\r\n128GB SATA M.2 SSD\r\n14\" FHD (1920 x 1080) IPS Display');

-- --------------------------------------------------------

--
-- Table structure for table `teampage`
--

CREATE TABLE `teampage` (
  `ID` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Profession` varchar(255) NOT NULL,
  `Roll` varchar(255) NOT NULL,
  `Section` varchar(255) NOT NULL,
  `Lab_Group` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `NickName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teampage`
--

INSERT INTO `teampage` (`ID`, `Image`, `Name`, `Profession`, `Roll`, `Section`, `Lab_Group`, `fb`, `linkedin`, `insta`, `gmail`, `NickName`) VALUES
(1, 'images/tausif.jpg', 'Samin Ahsan Tausif', 'Web Developer', '18.01.04.053', 'B1', 'Group-04', 'https://www.facebook.com/samin.tausif', 'https://www.linkedin.com/in/samin-ahsan-tausif-70007b200/', 'https://www.instagram.com/ahsantausif10/', 'ahsantausif30@gmail.com', 'Tausif'),
(2, 'images/rahat.jpg', 'Rahat Chowdhury', 'Web Developer', '18.01.04.067', 'B1', 'Group-04', 'https://www.facebook.com/rht.rahat.5/', 'https://www.linkedin.com/in/rahat-chowdhury-65a041204/', 'https://www.instagram.com/rahat_chowdhury__/', 'rht345@gmail.com', 'Rahat'),
(3, 'images/tausif.jpg', 'Samin Ahsan Tausif', 'Web Developer', '18.01.04.053', 'B1', 'Group-04', 'https://www.facebook.com/samin.tausif', 'https://www.linkedin.com/in/samin-ahsan-tausif-70007b200/', 'https://www.instagram.com/ahsantausif10/', 'ahsantausif30@gmail.com', 'Tausif');

-- --------------------------------------------------------

--
-- Table structure for table `usercontact`
--

CREATE TABLE `usercontact` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercontact`
--

INSERT INTO `usercontact` (`ID`, `Email`, `Name`, `Message`) VALUES
(1, '180104067@aust.edu', 'Rahat', 'hello world'),
(3, '180104067@aust.edu', 'Tausif', 'You have a nice website!'),
(4, 'rht345@gmail.com', 'Rahat Chowdhury', 'Hello Guys'),
(5, 'rht345@gmail.com', 'Tonmoy', 'Its a Nice Website!'),
(6, 'monzur12345@gmail.com', 'Monzur', 'Nice Work');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Email`, `Name`, `Password`, `Phone`, `Image`) VALUES
(1, '180104067@aust.edu', 'Rahat Chowdhury', '827ccb0eea8a706c4c34a16891f84e7b', '1722122317', 'uploads/606bf463c73324.25559683.jpg'),
(2, '180104053@aust.edu', 'Samin Ahsan Tausif', 'caf1a3dfb505ffed0d024130f58c5cfa', '0174469774', 'uploads/6069f84c4593c2.28188257.jpg'),
(3, 'rht345@gmail.com', 'Rahat Chowdhury', '827ccb0eea8a706c4c34a16891f84e7b', '01816163673', 'uploads/606a1a7d025284.50308819.jpg'),
(4, 'tonhat@gmail.com', 'Tonmoy', '827ccb0eea8a706c4c34a16891f84e7b', '0174469774', 'uploads/606bdfae0c1fa2.33613750.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teampage`
--
ALTER TABLE `teampage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usercontact`
--
ALTER TABLE `usercontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teampage`
--
ALTER TABLE `teampage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usercontact`
--
ALTER TABLE `usercontact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


