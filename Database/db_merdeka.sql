-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2021 at 02:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_merdeka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `kode`
--

CREATE TABLE `kode` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode`
--

INSERT INTO `kode` (`id`, `kode_transaksi`) VALUES
(1, 'TRX');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_tlp` int(13) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `no_tlp`, `alamat`, `username`, `password`, `status`) VALUES
(4, 'Heri', 2147483647, 'Jl. Raya Sukatani RT 12 RW 02 Kecamatan Sukatani Purwakarta', 'heri', 'heri', 2),
(5, 'Budiono', 2147483647, 'Jl Raya Sadang no 24 Sadang Purwakarta', 'budiono', '12345', 2),
(6, 'Amin', 2147483647, 'Jl. Ipik Gandamanah no 20 Munjul Purwakarta', 'amin', 'amin', 2),
(9, 'Ridwan', 2147483647, 'Desa Cipeundeuy, RT 001, RW 012, Cipeundeuy, Subang', 'ridwan', 'ridwan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sopir`
--

CREATE TABLE `sopir` (
  `id_sopir` int(11) NOT NULL,
  `nama_sopir` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sopir`
--

INSERT INTO `sopir` (`id_sopir`, `nama_sopir`, `alamat`, `no_tlp`) VALUES
(2, 'Joni R', 'Kadawung Kab Indramayu', '085554596321'),
(3, 'Lukman Sardi', 'Cijambe Rt 10 Rw 05 Desa Cijambe Kab Subang', '082223224225'),
(4, ' Budi Anduk', 'Jl Cicendo Bandung', '087745612345'),
(5, 'Dik ', 'Jl Raya Singadilaga', '087748953654');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(10) NOT NULL,
  `kota_asal` varchar(20) NOT NULL,
  `kota_tujuan` varchar(20) NOT NULL,
  `max_kapasitas` int(10) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `kota_asal`, `kota_tujuan`, `max_kapasitas`, `harga`) VALUES
(2, 'Purwakarta', 'Bekasi', 2000, 1000000),
(3, 'bandung', 'cianjur', 2000, 1500000),
(4, 'bandung', 'tasikmalaya', 2000, 2000000),
(6, 'bandung', 'sukabumi', 2000, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(100) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `id_sopir` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `dp` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_transaksi`, `id_pelanggan`, `id_tarif`, `id_sopir`, `tanggal`, `alamat_tujuan`, `dp`, `sisa`, `bukti_pembayaran`, `status_transaksi`) VALUES
(1, 'TRX0001', 4, 2, 2, '2021-10-23', 'jl Raya Sukaraja Sukabumi', 150000, 1350000, 'bukti.jpg', 3),
(3, 'TRX0003', 5, 4, 4, '2021-10-23', 'jl raya cikalong', 250000, 2250000, 'bukti.jpg', 3),
(10, 'TRX0010', 6, 3, 2, '2021-10-30', 'Jl Raya BUlak Kapal Bekasi Timur', 150000, 1350000, 'FPK202110065.JPG', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kode`
--
ALTER TABLE `kode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id_sopir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
