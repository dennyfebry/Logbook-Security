-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2018 at 04:57 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loglog`
--

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `id_k` int(11) NOT NULL,
  `waktu_awal` time DEFAULT NULL,
  `waktu_akhir` time DEFAULT NULL,
  `kegiatan` varchar(255) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`id_k`, `waktu_awal`, `waktu_akhir`, `kegiatan`, `id`) VALUES
(17, '05:00:00', '06:00:00', 'Caaaasddasdas', 1),
(18, '02:00:00', '04:00:00', 'Minum', 2),
(19, '02:00:00', '04:00:00', 'Minum', 3),
(20, '05:00:00', '07:00:00', 'asdas', 4),
(21, '05:00:00', '07:00:00', 'asdas', 5),
(22, '05:00:00', '07:00:00', 'asdas', 6),
(23, '05:00:00', '07:00:00', 'asdas', 7),
(24, '05:00:00', '07:00:00', 'asdas', 8),
(25, '05:00:00', '07:00:00', 'asdas', 9),
(26, '05:00:00', '07:00:00', 'asdas', 10),
(27, '07:00:00', '09:00:00', 'fas', 11),
(28, '00:12:00', '00:30:00', 'Test', 12),
(29, '07:00:00', '09:00:00', 'ASAS', 1),
(31, '00:00:00', '13:00:00', 'Test', 15);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `shift` enum('Pagi','Malam') DEFAULT NULL,
  `inventaris` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `nama`, `tanggal`, `shift`, `inventaris`) VALUES
(1, 'Agung', '2018-08-05', 'Pagi', 'Remote LED, Monitor Agenda, Payung'),
(2, 'Bambang', '2018-08-06', 'Pagi', 'Monitor CCTV, Monitor Agenda, Sepatu Boots, Galon/Dispenser'),
(3, 'Caca', '2018-08-07', 'Pagi', 'Tempat Sampah, Vending Mesin, Pot Bunga'),
(4, 'Dadi', '2018-08-08', 'Pagi', 'Payung, Telephone, Kalender, Announcer'),
(5, 'Farule', '2018-08-09', 'Pagi', 'Remote LED'),
(6, 'Farul', '2018-08-10', 'Pagi', 'Remote LED'),
(7, 'Gugun', '2018-08-11', 'Pagi', 'Remote AC'),
(8, 'Hanto', '2018-08-12', 'Pagi', 'Remote TV'),
(9, 'Haris', '2018-08-13', 'Pagi', 'Remote LED'),
(10, 'Irfan', '2018-08-14', 'Pagi', 'Remote LED'),
(11, 'Kukuh', '2018-08-15', 'Pagi', 'Remote LED'),
(12, 'Luck', '2018-08-08', 'Pagi', 'Announcer, Tempat Sampah, Vending Mesin, Pot Bunga'),
(13, 'Maman', '2018-08-24', 'Pagi', 'Remote LED, Monitor Agenda, Sepatu Boots, Kalender'),
(14, 'Kinan', '2018-08-24', 'Malam', 'Kalender, Announcer, Tempat Sampah, Vending Mesin, Master Key, Meja Kursi'),
(15, 'Bilbo', '2018-08-13', 'Pagi', 'Remote LED, Remote AC, Monitor CCTV'),
(16, 'Test', '2018-08-05', 'Malam', 'Remote LED, Remote TV, Announcer, Tempat Sampah'),
(17, 'Coba', '2018-08-05', 'Pagi', 'Borgol, Payung, Telephone'),
(18, 'Sihab', '2018-08-06', 'Pagi', 'Kalender, Announcer, Tempat Sampah');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'User 1', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_k`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD CONSTRAINT `keterangan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `laporan` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
