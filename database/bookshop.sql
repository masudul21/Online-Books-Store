-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 11:33 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@gmail.com', '123', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Story'),
(4, 'Children'),
(6, 'Novel'),
(7, 'Religion'),
(8, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(250) NOT NULL,
  `customer_id` int(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `reply` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `customer_id`, `message`, `reply`, `status`) VALUES
(10, 9, 'Hello ', 'Hi', 'Seen');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(250) NOT NULL,
  `name` varchar(230) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `city` varchar(230) NOT NULL,
  `address` varchar(230) NOT NULL,
  `date` date NOT NULL,
  `complete_date` date NOT NULL,
  `status` varchar(240) NOT NULL,
  `total` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `name`, `phone`, `city`, `address`, `date`, `complete_date`, `status`, `total`) VALUES
(1, 9, 'Nila', '01943100332', 'Dhaka', ' Uttara', '2019-08-15', '2019-08-19', 'Confirm', 450),
(2, 9, 'Nila', '01943100332', 'Dhaka', ' Uttara', '2019-08-16', '2019-08-22', 'Pending', 450),
(3, 9, 'Farzana', '01760003426', 'Dhaka', ' Uttara ', '2019-08-16', '2019-08-22', 'Pending', 900),
(4, 9, 'Nila', '01943100332', 'Dhaka', ' Gazipur', '2019-08-16', '2019-08-19', 'Confirm', 650),
(5, 9, 'Shampa', '01943100332', ' gaibandha', ' gaibandha', '2019-08-19', '2019-08-19', 'Confirm', 400),
(7, 9, 'Nila', '01943100332', 'Dhaka', 'uttara', '2019-08-22', '2019-08-22', 'Confirm', 2630);

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `oh_id` int(11) NOT NULL,
  `order_id` varchar(230) NOT NULL,
  `id` varchar(230) NOT NULL,
  `name` varchar(230) NOT NULL,
  `price` varchar(230) NOT NULL,
  `quantity` varchar(230) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`oh_id`, `order_id`, `id`, `name`, `price`, `quantity`, `date`) VALUES
(1, '1', '45', 'Debi', '450', '1', '2019-08-15'),
(2, '2', '45', 'Debi', '450', '1', '2019-08-16'),
(3, '3', '45', 'Debi', '450', '1', '2019-08-16'),
(4, '3', '47', 'Krishna Pakkho', '200', '1', '2019-08-16'),
(5, '3', '48', 'Arek Falgun', '250', '1', '2019-08-16'),
(6, '4', '45', 'Debi', '450', '1', '2019-08-16'),
(7, '4', '47', 'Krishna Pakkho', '200', '1', '2019-08-16'),
(8, '5', '47', 'Krishna Pakkho', '400', '2', '2019-08-19'),
(9, '6', '47', 'Krishna Pakkho', '200', '1', '2019-08-21'),
(10, '6', '46', 'Dipu Number 2', '300', '1', '2019-08-21'),
(11, '7', '55', 'Nondini', '2500', '5', '2019-08-22'),
(12, '7', '49', 'Hajar Bochor Dhore', '130', '1', '2019-08-22');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL,
  `price` int(250) NOT NULL,
  `writer` varchar(250) NOT NULL,
  `publisher` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `amount` int(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `tag` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `details`, `price`, `writer`, `publisher`, `category`, `amount`, `image`, `tag`) VALUES
(45, 'Debi', 'Aru and Muhib are the two young women of the current prism. The heart is filled with their genuine love and love. That is why they have come to each other very easily in the laws of nature.', 450, '3', 3, 'Story', 15, 'preview-debi-humayun-ahmed-created-by-bironjeet-1.jpg', ''),
(46, 'Dipu Number 2', 'When I went to the US to do a DHD in physics, I was all alone, not even a single person who spoke Bangla', 300, '5', 4, 'Children', 25, 'Untitled-41-81_38-crop-c0-5__0-5-510x510-70.jpg', ''),
(47, 'Krishna Pakkho', 'Aru and Muhib are the two young women of the current prism. The heart is filled with their genuine love and love. That is why they have come to each other very easily in the laws of nature.', 200, '3', 3, 'Story', 15, 'Book4743.jfif', ''),
(48, 'Arek Falgun', 'When I went to the US to do a DHD in physics, I was all alone, not even a single person who spoke Bangla', 250, '4', 5, 'Story', 15, '1466571557.jpg', ''),
(49, 'Hajar Bochor Dhore', 'In the opinion of the great great dragon, the road has gone through the middle of a wide paddy field. Magelai road.', 130, '4', 5, 'Novel', 19, 'preview-hajar-bochor-dhore-by-jahir-raihan-banglabookpdf-tk-1.jpg', ''),
(50, 'Bristir Thikana', 'Bristir thikana this book is novel book.bdsgdscbdsbvh', 200, '5', 4, 'Novel', 22, 'd6093aec74d0ccb7f61e729cd8cd6d58.jpg', ''),
(51, 'Sonkho Nil Karagrar', 'In the opinion of the great great dragon, the road has gone through the middle of a wide paddy field. Magelai road.', 230, '3', 4, 'Novel', 15, '6b05f02cc47372163f5c4220d259ac2c--free-download-book-jacket.jpg', ''),
(52, 'Islami Jibon Proddoti', 'This book about Islamic Life Style', 450, '4', 5, 'Religion', 30, 'images (2).jfif', ''),
(53, 'Arobi Sikhi', 'This book about Islamic Life Style', 300, '5', 4, 'Religion', 20, 'Learn Arabic in Bengali.jpg', ''),
(54, 'Sesh Bikeler Meye', 'When I went to the US to do a DHD in physics, I was all alone, not even a single person who spoke Bangla', 150, '4', 3, 'Novel', 15, 'Sesh Bikeler Meye by Zahir Raihan.jpg', ''),
(55, 'Nondini', 'Aru and Muhib are the two young women of the current prism. The heart is filled with their genuine love and love. That is why they have come to each other very easily in the laws of nature.', 500, '6', 6, 'Story', 7, '1464934437.jpg', ''),
(56, 'Himur Nil Joschna', 'Aru and Muhib are the two young women of the current prism. The heart is filled with their genuine love and love. That is why they have come to each other very easily in the laws of nature.', 250, '3', 6, 'Children', 22, '456677107.jpg', ''),
(57, 'Sudhu Tomarie Jonno', 'In the opinion of the great great dragon, the road has gone through the middle of a wide paddy field. Magelai road.', 143, '6', 6, 'Novel', 15, '41fVyMVAYnL._SX340_BO1,204,203,200_.jpg', ''),
(58, 'Boka Goyenda', 'boka goyenda sbdhhsdkjsdsdljv', 255, '6', 6, 'Children', 20, 'images (4).jfif', ''),
(59, 'Aj Kalker Valobashar Golpo', 'In the opinion of the great great dragon, the road has gone through the middle of a wide paddy field. Magelai road.', 300, '6', 4, 'Story', 15, 'download (4).jfif', '');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `address`, `contact`) VALUES
(3, 'Prathoma Prokashon', 'Dhaka', '01760003426'),
(4, 'Bangla Academy', 'Dhaka', '01600000000'),
(5, 'Shebha Prokashoni', 'Dhaka', '01600000000'),
(6, 'Somyo Prokason', 'Gazipur', '01760003426');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_fnm` varchar(50) NOT NULL,
  `u_unm` varchar(50) NOT NULL,
  `u_pwd` varchar(50) NOT NULL,
  `u_gender` varchar(50) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_contact` varchar(50) NOT NULL,
  `u_city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_fnm`, `u_unm`, `u_pwd`, `u_gender`, `u_email`, `u_contact`, `u_city`) VALUES
(9, 'Farzana Nila', 'nila', 'nila', 'Female', 'fnila19@gmail.com', '01760003426', 'Dhaka'),
(10, 'Sumaiya Islam', 'sumaiya', '123', 'Female', 'sumaiya@gmail.com', '01648337559', 'Dhaka'),
(11, 'Aysha Akter', 'aysha', '1234', 'Female', 'aysha@gmail.com', '01600000000', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `writer`
--

CREATE TABLE `writer` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `writer`
--

INSERT INTO `writer` (`id`, `name`, `address`, `contact`) VALUES
(3, 'Humayun Ahmed', 'Uttara', '01700000000'),
(4, 'Zahir Rayhan', 'Dhaka', '01900000000'),
(5, 'Jafor Iqbal', 'Dhaka', '01600000000'),
(6, 'Anisul Huq', 'Dhaka', '01900000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`oh_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `oh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `writer`
--
ALTER TABLE `writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
