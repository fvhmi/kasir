-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 08:19 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_swedish_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_swedish_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('4f8d535ee43684cfe57fbc8b2624c7a393b478ae', '::1', 1519888587, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393838383334353b69647c733a313a2234223b6e616d617c733a373a2270656c6179616e223b656d61696c7c733a373a227040312e636f6d223b6c6576656c7c733a313a2231223b706c6174666f726d7c733a393a2257696e646f77732037223b62726f777365727c733a32303a224368726f6d652036332e302e333233392e313332223b6c6f67696e7c623a313b),
('9ff79e8e6db02f80dd17035eced16af2017c8cea', '::1', 1519886384, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531393838363232353b);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `harga`, `status`) VALUES
(1, 'Es Teh', '4000', 'Ready'),
(4, 'Teh Hangat', '4000', 'Ready'),
(5, 'Jamur Crispylisious', '10000', 'Ready'),
(7, 'Tempe Bacem', '2000', 'Ready');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(100) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `uang_bayar` varchar(100) NOT NULL,
  `uang_kembali` varchar(100) NOT NULL,
  `id_kasir` int(10) NOT NULL,
  `id_pesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `total_harga`, `uang_bayar`, `uang_kembali`, `id_kasir`, `id_pesanan`) VALUES
(1, '8000', '10000', '2000', 2, 'ERP010318-001');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` varchar(100) NOT NULL,
  `no_meja` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_pelayan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `no_meja`, `status`, `id_pelayan`) VALUES
('ERP010318-001', 1, 'tidak aktif', 1),
('ERP010318-004', 2, 'tidak aktif', 2),
('ERP010318-005', 1, 'aktif', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_menu`
--

CREATE TABLE `pesanan_menu` (
  `id` int(100) NOT NULL,
  `kode_pesanan` varchar(100) NOT NULL,
  `kode_menu` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_menu`
--

INSERT INTO `pesanan_menu` (`id`, `kode_pesanan`, `kode_menu`) VALUES
(1, 'ERP010318-001', 1),
(2, 'ERP010318-001', 4),
(3, 'ERP010318-004', 1),
(4, 'ERP010318-004', 5),
(5, 'ERP010318-005', 4),
(6, 'ERP010318-005', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(3) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nama`, `level`, `status`) VALUES
(1, 'waiter@kasirapp.in', '$2y$10$sXvZ9ohgZKECIdPXKAHBJ.dMDxDsMRA2d5akWT91OAF//JfWojSGy', 'Waiter 1', '1', '1'),
(2, 'kasir@kasirapp.in', '$2y$10$wimT9zPd/h7lbnK6lrvCLuAKLYDFjWR6ZlnGHeyBlV9naIkC5M3VS', 'kasir 1', '2', '1'),
(3, 'nur@me.in', '$2y$10$POtyHbHZbplC3DMCcA/G8eYSECV8TmyIkJknQBSc1cKM7Pxe49Pnu', 'nur aini', '1', '1'),
(4, 'p@1.com', '$2y$10$BZ1h5qNjgo9JzBOK.au4he9Hx1cFAeTbYSturB/0IrGypLtPbvnha', 'pelayan', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_menu`
--
ALTER TABLE `pesanan_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pesanan_menu`
--
ALTER TABLE `pesanan_menu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
