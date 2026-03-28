-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2025 at 03:01 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galerifotoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggalbuat` date NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggalbuat`, `userid`) VALUES
(13, 'Nissan', 'Nissan JDM adalah mobil Nissan yang diproduksi khusus untuk dijual di Jepang. JDM merupakan singkatan dari Japanese Domestic Market. ', '2025-02-06', 2),
(15, 'Toyota', 'Mobil sport ikonik Jepang yang diproduksi antara tahun 1993 dan 2002', '2025-02-06', 5),
(16, 'Lamborghini', 'Lamborghini adalah merek mobil mewah dan performa tinggi yang berasal dari Italia.', '2025-02-10', 2),
(17, 'Classic Car', 'Mengumpulkan tukang kulak', '2025-02-11', 11),
(19, 'Classic Car', 's', '2025-02-12', 13);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `fotoid` int NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(13, 'GTR R35 2077', 'Mobil Impian                              ', '2025-02-05', '2022383064-gtr35.jpg', 13, 2),
(15, 'Supra Mk4', 'Toyota Supra MK4 hadir dengan dua pilihan mesin. Mesin yang digendong oleh mobil sport ini adalah 2JZ-GE non turbo dan 2JZ-GTE turbo.', '2025-02-05', '536172941-mk4.jpg', 15, 5),
(17, 'GTR R34', 'Nissan Skyline R34', '2025-02-06', '192047786-NisanGTR34.jpg', 13, 2),
(18, 'Silvia S14', 'Nissan Silvia S14 ini dibekali dengan spesifikasi yang mumpuni untuk drifting', '2025-02-06', '645340206-SilvaNissan.jpg', 13, 2),
(19, 'Toyota 86', 'Toyota GT86 bermesin Honda K24 tersebut, mendapat skema warna dari perpaduan stiker hitam dan pink', '2025-02-06', '955555578-toyotagt86.jpg', 15, 5),
(20, 'Toyota Supraa 300 GT', 'The Toyota Supra 3000GT Concept celebrated its debut at the SEMA AUTO Show in Las Vegas ', '2025-02-06', '1531437619-Toyotasupraagt300.jpg', 15, 5),
(21, 'Lamborghini Aventador', ' Mobil sport yang selalu menjadi idaman para penggemar otomotif.', '2025-02-10', '428310553-Lamborg.jpeg', 16, 2),
(22, 'Datsun XX', 'Jadul', '2025-02-11', '2003716392-A.jpg', 17, 11),
(23, 'Lamborghini Revuelto', 'The 2025 Lamborghini Revuelto sticks with an iconic mid-mounted V-12 and adds three electric motors to the mix, producing an otherworldly 1001 horsepower                              ', '2025-02-13', '1612088652-lamborghinirevuelto.avif', 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int NOT NULL,
  `fotoid` int NOT NULL,
  `userid` int NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(1, 13, 5, 'Busett ganteng banget kayak yang punya', '2025-02-05'),
(3, 13, 2, 'woww busett ngerii', '2025-02-05'),
(4, 15, 2, 'Sangarr Euyy', '2025-02-05'),
(8, 13, 2, 'Jual Ginjal dapet gak yaa?', '2025-02-06'),
(9, 15, 2, 'Ganteng Parahh', '2025-02-09'),
(10, 19, 2, 'Siap Race Wars 2027??', '2025-02-09'),
(12, 18, 10, 'Kaciw-kaciw..siap ngeDrift ini mahh', '2025-02-09'),
(13, 17, 5, '🥶🥶', '2025-02-10'),
(14, 13, 5, 'GINJALL🥶🥶🥶??', '2025-02-10'),
(15, 20, 2, 'GOAT🥶🥶', '2025-02-10'),
(16, 21, 2, 'Ganteng kayak Nanda', '2025-02-11'),
(17, 13, 11, 'P', '2025-02-11'),
(18, 13, 11, 'K', '2025-02-11'),
(19, 20, 11, 'Mantap', '2025-02-11'),
(20, 23, 5, 'Rawrrr', '2025-02-11'),
(21, 19, 5, 'Sangarr Euyy', '2025-02-11'),
(22, 15, 2, 'Warna Hitam kayak BAdoh MENCRET', '2025-02-21'),
(23, 21, 2, 'Kalah sama supra ini mah?', '2025-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int NOT NULL,
  `fotoid` int NOT NULL,
  `userid` int NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(24, 15, 5, '2025-02-05'),
(27, 13, 5, '2025-02-06'),
(37, 16, 2, '2025-02-06'),
(40, 15, 2, '2025-02-06'),
(47, 14, 2, '2025-02-06'),
(48, 14, 5, '2025-02-06'),
(49, 16, 5, '2025-02-06'),
(51, 13, 2, '2025-02-06'),
(52, 17, 5, '2025-02-06'),
(53, 18, 5, '2025-02-06'),
(54, 19, 2, '2025-02-06'),
(55, 18, 2, '2025-02-06'),
(56, 13, 9, '2025-02-09'),
(57, 15, 9, '2025-02-09'),
(58, 17, 9, '2025-02-09'),
(59, 18, 9, '2025-02-09'),
(60, 19, 9, '2025-02-09'),
(61, 20, 9, '2025-02-09'),
(62, 18, 10, '2025-02-09'),
(63, 20, 2, '2025-02-10'),
(67, 21, 2, '2025-02-11'),
(68, 13, 11, '2025-02-11'),
(69, 22, 2, '2025-02-11'),
(70, 23, 5, '2025-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `nohp` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `nohp`, `alamat`, `role`) VALUES
(2, 'kk', 'dc468c70fb574ebd07287b38d0d0676d', 'kk@gmail.com', 'kk', '', 'pringjaya', 'user'),
(4, 'widodo', '202cb962ac59075b964b07152d234b70', 'widodo@gmail.com', 'Widodo', '', 'Pringsewu', 'user'),
(5, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa@gmail.com', 'aa Cucuh', '', 'Pringsewu Jawa Tengah', 'user'),
(10, 'foxster', '73776867ef058b6cef9f202e4e9ce033', 'foxster@gmail.com', 'foxster', '0897546312347', 'Bandung, Jl. Sukawarna II', 'user'),
(11, 'pakiii', '202cb962ac59075b964b07152d234b70', 'paki@we', 'Faki 2', '12', 'Pringsewu', 'user'),
(13, 'tamu', '202cb962ac59075b964b07152d234b70', 'tamu@tamu.com', 'Tamu', '123', 'Pringsewu', 'user'),
(14, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', '09999999999', 'Lampung', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
