-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 06:33 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galerifoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar_foto`
--

CREATE TABLE `komentar_foto` (
  `komentarID` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `komentar_foto`
--

INSERT INTO `komentar_foto` (`komentarID`, `image_id`, `admin_id`, `admin_name`, `isi_komentar`, `tanggal_komentar`) VALUES
(30, 93, 14, 'Alhamdulillah', 'mantap', '2024-04-24 02:42:34'),
(31, 92, 14, 'Alhamdulillah', 'mantap', '2024-04-24 02:43:11'),
(32, 93, 15, 'Athallah', 'keren', '2024-04-24 02:43:28'),
(33, 92, 15, 'Athallah', 'keren', '2024-04-24 02:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_bio` text NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_bio`, `admin_address`) VALUES
(14, 'Alhamdulillah', 'uhuy', '123', '', '', '', ''),
(15, 'Athallah', 'athallah_019', '123', '098678678678', 'akunbisniss716@gmail.com ', 'HIDUP SEPERTI LARY', 'JLN BABAKAN Siliwangi'),
(16, '5', '5', '5', '5', '5', '5', '5'),
(17, 'Mang Arif', 'mang arif', '202cb962ac59075b964b07152d234b70', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(14, 'Perjalanan'),
(15, 'Bawah Air'),
(16, 'Hewan'),
(17, 'Satwa Liar'),
(18, 'Makanan'),
(19, 'Olahraga'),
(20, 'Fashion'),
(21, 'Seni Rupa'),
(22, 'Dokumenter'),
(23, 'Arsitektur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `image_name` text NOT NULL,
  `image_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`image_id`, `category_id`, `category_name`, `admin_id`, `admin_name`, `image_name`, `image_description`, `image`, `image_status`, `date_created`) VALUES
(91, 15, 'Bawah Air', 14, 'Alhamdulillah', 'Pemandangan yang indah', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sagittis egestas orci, quis sollicitudin leo tincidunt sit amet. Quisque feugiat turpis augue, ac egestas libero scelerisque vitae. Donec ut velit mattis, accumsan elit eleifend, semper nibh. Mauris quis congue odio. Vivamus convallis dolor massa. Cras congue erat vel justo varius, rhoncus sollicitudin tortor laoreet. Curabitur finibus rutrum diam at elementum. Vivamus dictum enim neque, at euismod massa posuere ut. Praesent fringilla ex a dui iaculis consequat. Sed ut purus sem.', 'foto1713926114.jpg', 0, '2024-04-24 02:40:22'),
(92, 21, 'Seni Rupa', 14, 'Alhamdulillah', 'GIF', 'Contoh GIF', 'foto1713926138.gif', 1, '2024-04-24 02:36:25'),
(93, 19, 'Olahraga', 15, 'Athallah', 'Cristiano Ronaldo Main Sampai Usia 40 Tahun? Rencana Masa Depannya Terungkap', 'Praesent non commodo mi, ac dictum orci. Aenean convallis lacus at ipsum consectetur, ut pretium felis hendrerit. Sed tincidunt, justo id viverra interdum, eros lacus consectetur est, ut ultrices turpis sapien vel mi. Sed id libero odio. Morbi nec sem convallis sem luctus imperdiet. Donec hendrerit est orci, et tincidunt felis tincidunt eget. Donec ut metus nunc. Quisque eget quam sed ligula semper convallis. Maecenas interdum mauris vel tortor interdum, sit amet rutrum metus venenatis. Nunc ac pulvinar nibh, et eleifend mi. Etiam tortor turpis, accumsan non cursus dignissim, eleifend sit amet lacus. Aliquam nec finibus diam. Phasellus id lacus felis. Vivamus a tellus vulputate, gravida mauris ut, aliquam tellus. In pulvinar mi eu ex scelerisque finibus.', 'foto1713926375.jpeg', 1, '2024-04-24 02:39:35'),
(95, 15, 'Bawah Air', 17, 'Mang Arif', 'bismillahaaa', 'bismillah jadi', 'foto1713930279.gif', 0, '2024-04-24 03:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_like`
--

CREATE TABLE `tb_like` (
  `like_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `tanggal_like` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_like`
--

INSERT INTO `tb_like` (`like_id`, `image_id`, `admin_id`, `admin_name`, `tanggal_like`) VALUES
(277, 93, 15, 'Athallah', '2024-04-24 02:44:47'),
(278, 92, 15, 'Athallah', '2024-04-24 02:44:52'),
(279, 93, 14, 'Alhamdulillah', '2024-04-24 02:45:05'),
(280, 92, 14, 'Alhamdulillah', '2024-04-24 02:45:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD PRIMARY KEY (`komentarID`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `admin_name` (`admin_name`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `tb_like`
--
ALTER TABLE `tb_like`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `admin_name` (`admin_name`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  MODIFY `komentarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tb_like`
--
ALTER TABLE `tb_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar_foto`
--
ALTER TABLE `komentar_foto`
  ADD CONSTRAINT `komentar_foto_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `tb_image` (`image_id`),
  ADD CONSTRAINT `komentar_foto_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`);

--
-- Constraints for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`),
  ADD CONSTRAINT `tb_image_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`);

--
-- Constraints for table `tb_like`
--
ALTER TABLE `tb_like`
  ADD CONSTRAINT `tb_like_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `tb_image` (`image_id`),
  ADD CONSTRAINT `tb_like_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `tb_admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
